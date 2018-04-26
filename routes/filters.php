<?php
/*
|--------------------------------------------------------------------------
| Web filters or middleware if you wanna call them that :)
|--------------------------------------------------------------------------
*/

use PytoMVC\System\Auth\Auth;
use PytoMVC\System\Http\Request;

/**
 * check.activity filter
 * 
 * This filter checks if the user has been inactive for x amount of
 * minutes (configured in config/app.php => 'session_expire')
 * and logs them out if they're inactive that long.
 * It also updates the last activity timestamp on each request to keep track of the time.
 */
function checkActivityRouterFilter(Request $request)
{
    if (Auth::check()) {
        if (($expireTime = config('app.session_expire')) === 0) {
            return;
        }

        $session = $request->getSession();

        return $session->expire($expireTime)
                        ->updateActivityTime()
                        ->whenInactive(function (/* $session */) {
                            Auth::logout();
                            return redirect(config('app.login_url'))->withWarning(trans('auth.inactive'));
                        });
    }
}

$router->filter('check.activity', 'checkActivityRouterFilter');

/**
 * csrf filter
 * 
 * This filter validates the csrf token sent with the request and redirects
 * the user to the previous location if the validation fails or generates a 400 response.
 */
function csrfRouterFilter(Request $request)
{
    $token = ($isAjax = $request->ajax())
        ? $request->header('X-CSRF-Token')
        : $request->input('_token');

    if (! app('csrf')->validate($token)) {
        if ($isAjax) {
            return response('Bad request', 400);
        }

        return redirect()->back()->withWarning('[CSRF] Something went wrong. Please try again.');
    }
}

$router->filter('csrf', 'csrfRouterFilter');

/**
 * ipguard filter
 */
function ipguardRouterFilter(Request $request)
{
    $current = $request->clientIp();
    $session = $request->getSession();

    if (! $session->has('ipInfo') || $session->get('currentIp') != $current) {
        $session->set('currentIp', $current);

        if (function_exists('getIpInformation')) {
            $session->set('ipInfo', getIpInformation($current));
        }
    }
}

$router->filter('ipguard', 'ipguardRouterFilter');

/**
 * guest filter
 */
function guestRouterFilter(Request $request)
{
    if (Auth::check()) {
        return $request->ajax()
            ? response('Logout required', 403)
            : redirect(config('app.dashboard_url'))->withError(trans('auth.only_guest'));
    }
}

$router->filter('guest', 'guestRouterFilter');

/**
 * auth filter
 */
function authRouterFilter(Request $request)
{
    if (! Auth::check()) {
        return $request->ajax()
            ? response('Login required', 401)
            : redirect(config('app.login_url'))->withError(trans('auth.only_auth'));
    }
}

$router->filter('auth', 'authRouterFilter');
