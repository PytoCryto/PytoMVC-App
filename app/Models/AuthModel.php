<?php

namespace App\Models;

use Closure;
//use App\Models\User;
use PytoMVC\System\Http\Request;
use PytoMVC\System\Auth\AuthModel as BaseAuth;

class AuthModel extends BaseAuth
{
    /**
     * Form validation rules
     *
     * @var array
     */
    protected $rules =  [
        'username' => 'required',
        'password' => 'required',
    ];

    /**
     * The default column for authentication
     * 
     * @return string
     */
    //public function username()
    //{
    //    return 'username';
    //}

    /**
     * The default field for the captcha
     * 
     * @return string
     */
    //public function captcha()
    //{
    //    return 'g-recaptcha-response';
    //}

    /**
     * Get the desired rule(s) for the captcha field
     * 
     * @return string
     */
    //protected function getCaptchaRule()
    //{
    //    return 'as:Security check|required|recaptcha';
    //}

    /**
     * Try to authenticate the user
     * 
     * @param  \PytoMVC\System\Http\Request $request 
     * @param  \Closure|null                    $next 
     * @return bool
     */
    public function tryAuthenticate(Request $request, Closure $next = null)
    {
        $this->beforeLogin($request);

        if ($this->captchaEnabled()) {
            $this->registerCaptchaRule();
        }

        $validator = app('validator')->make($data = $request->all(), $this->rules);

        if ($validator->passes()) {
            $user = $this->resolveCurrentUserModel()
                        ->where($this->username(), $data['username'])
                        ->first();

            if ($user && app('hash')->check($data['password'], $user->password)) {
                $session = $request->getSession();

                $session->regenerate();
                $session->updateActivityTime();
                $session->set('logged_in', true)
                        ->set('currentIp', $request->clientIp());

                $this->saveSessionData($request, $user->attributes);

                $this->afterLogin($request, $user);

                return true;
            }
        }

        return false;
    }

    protected function beforeLogin($request)
    {
        //
    }

    protected function afterLogin($request, $user)
    {
        //
    }
}
