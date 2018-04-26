<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\AuthModel;
use PytoMVC\System\Http\Request;

class AuthController extends AppController
{
    public function index()
    {
        return view('login', 'Sign in');
    }

    public function logout()
    {
        Auth::logout();
        
        $this->flash->success(trans('auth.logged_out'));
        
        return $this->redirectToLogin();
    }

    public function login(Request $request)
    {
        if ((new AuthModel)->tryAuthenticate($request)) {
            $message = trans('auth.welcome', ['name' => Auth::user()->username]);

            return $this->redirectToDashboard()->withSuccess($message);
        }

        return $this->redirectToLogin()
                    ->withInput()
                    ->withErrors(trans('auth.failed'));
    }
}
