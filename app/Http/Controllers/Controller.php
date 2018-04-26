<?php

namespace App\Http\Controllers;

use BadMethodCallException;
use PytoMVC\Core\Controller as BaseController;
use PytoMVC\System\Validation\ValidatesRequests;
use PytoMVC\System\Support\Str;

class Controller extends BaseController
{
    use ValidatesRequests;

    public function __construct()
    {
        $this->registerComponents();
    }

    public function beforeAction()
    {
        //
    }

    public function beforeRender()
    {
        //
    }

    protected function registerComponents()
    {
        $this->flash = app('session')->getFlash();
    }

    public function redirectTo($location)
    {
        $locations = [
            'index'     => config('app.url'),
            'login'     => config('app.login_url'),
            'dashboard' => config('app.dashboard_url')
        ];

        if (isset($locations[$location])) {
            return redirect($locations[$location]);
        }

        throw new BadMethodCallException("Invalid redirectTo location ($location)! Valid locations are: "
            . join(', ', array_keys($locations)
        ));
    }

    /**
     * Dynamically redirect to a configured location
     *
     * @param  string $method
     * @param  array  $args
     * @return \PytoMVC\System\Http\RedirectResponse
     *
     * @throws \BadMethodCallException
     */
    public function __call($method, $args)
    {
        if (! Str::startsWith($method, 'redirectTo')) {
            throw new BadMethodCallException("Method [$method] does not exist in controller (". get_class($this) . ").");
        }

        return $this->redirectTo(
            Str::snake(substr($method, 10))
        );
    }

    public function redirectToRoute($route, array $parameters = [])
    {
        return redirect()->route($route, $parameters);
    }

    public function redirectBack()
    {
        return redirect()->back();
    }

    public function flash($type, ...$message)
    {
        return $this->flash->$type(...$message);
    }

    /**
     * Set a title
     * 
     * @param  string $title 
     * @return \PytoMVC\Core\View
     */
    public function setTitle($title, $separator = ' - ')
    {
        $oldTitle = $this->getView()->get('title');
        $newTitle = $title . $separator . $oldTitle;

        return $this->assign('title', $newTitle);
    }

    public function renderWithTitle($view, $title, $data = [], $code = 200)
    {
        $this->setTitle($title);

        return $this->render($view, $data, $code);
    }
}
