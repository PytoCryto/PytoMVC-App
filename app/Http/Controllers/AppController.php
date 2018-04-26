<?php

namespace App\Http\Controllers;

//use Auth;

class AppController extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function beforeAction()
    {
        //if (Auth::check()) {
        //    //
        //}
    }

    public function beforeRender()
    {
        if (app()->isRequestViaApi()) {
            // we don't need to assign any view values
            // when using the API because there's no view rendered.
        } else {
            $this->assignDefaults();
        }
    }
}
