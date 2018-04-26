<?php

namespace App\Traits;

/**
 * @note:
 * You can remove all methods in this trait, they're only here for the benchmarking during development.
 */
trait AppBenchmarkTrait
{
    /**
     * Run the application and send the response
     * 
     * @param  \Closure      $next 
     * @param  \Request|null $request
     * @return \PytoMVC\System\Http\Response
     */
    public function run(\Closure $next, $request = null)
    {
        if (! $this->config->get('app.debug')) {
            return parent::run($next);
        }

        if (! $this->isJson($response = parent::run($next, $request))) {
            benchmark($this->getStartTime());
        }

        return $response;
    }

    /**
     * Check if the request expects json or if the given response is json
     * 
     * @param  \PytoMVC\System\Http\Response $response
     * @return bool
     */
    protected function isJson($response)
    {
        return $this->isRequestViaApi()
            || $this['request']->expectsJson()
            || $response->headers->get('Content-Type') == 'application/json'
            || $this->isValidJson($response);
    }

    /**
     * Attempt to decode the response to json
     * 
     * @param  \PytoMVC\System\Http\Response $response
     * @return bool|null
     */
    protected function isValidJson($response)
    {
        if ($this['request']->getMethod() == 'GET' && $this['request']->getRequestFormat() == 'html') {
            json_decode($response->getContent());

            return json_last_error() == JSON_ERROR_NONE;
        }
    }
}
