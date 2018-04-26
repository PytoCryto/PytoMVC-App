<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Session Lifetime
    |--------------------------------------------------------------------------
    |
    | How much should the session last? Default 20 minutes. Any argument that strtotime can parse is valid.
    |
    */
    'lifetime' => '120 minutes',
    /*
    |--------------------------------------------------------------------------
    | Auto Refresh
    |--------------------------------------------------------------------------
    |
    | If you want session to be refresh when user activity is made (interaction with server).
    |
    */
    'autorefresh' => false,
    /*
    |--------------------------------------------------------------------------
    | Session Cookie Name
    |--------------------------------------------------------------------------
    |
    | Name for the session cookie. Defaults to pytomvc_session (instead of PHP's PHPSESSID).
    |
    */
    'name' => 'pytomvc_session',
    /*
    |--------------------------------------------------------------------------
    | Session Cookie Path
    |--------------------------------------------------------------------------
    |
    | The session cookie path determines the path for which the cookie will
    | be regarded as available. Typically, this will be the root path of
    | your application but you are free to change this when necessary.
    |
    */
    'path' => '/',
    /*
    |--------------------------------------------------------------------------
    | Session Cookie Domain
    |--------------------------------------------------------------------------
    |
    | Here you may change the domain of the cookie used to identify a session
    | in your application. This will determine which domains the cookie is
    | available to in your application. A sensible default has been set.
    |
    */
    'domain' => null,
    /*
    |--------------------------------------------------------------------------
    | HTTPS Only Cookies
    |--------------------------------------------------------------------------
    |
    | By setting this option to true, session cookies will only be sent back
    | to the server if the browser has a HTTPS connection. This will keep
    | the cookie from being sent to you if it can not be done securely.
    |
    */
    'secure' => false,
    /*
    |--------------------------------------------------------------------------
    | HTTP Access Only
    |--------------------------------------------------------------------------
    |
    | Setting this value to true will prevent JavaScript from accessing the
    | value of the cookie and the cookie will only be accessible through
    | the HTTP protocol. You are free to modify this option if needed.
    |
    */
    'httponly' => true,
    /*
    |--------------------------------------------------------------------------
    | Probability
    |--------------------------------------------------------------------------
    */
    'gc_probability' => 1,
    'gc_divisor'     => 100,
    /*
    |--------------------------------------------------------------------------
    | Flash messages @see https://github.com/PytoCryto/PytoFlashMessage
    |--------------------------------------------------------------------------
    */
    'flash' => [
        'session_alias' => 'flash_messages',

        'container' => '<div id="messages">%s</div>',

        'wrapper' => '
        <div class="{message.baseClass} {message.class} alert-custom {message.fadeClass}">
            {button} {message.title} {message.contents}
        </div>
        ',

        'button' => '
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>',

        'title'  => '<h4 class="alert-title">%s</h4>',

        'baseClass' => 'alert',

        'dismissableClass' => 'alert-dismissible',

        'types' => [
            'success' => 'alert-success',
            'info'    => 'alert-info',
            'error'   => 'alert-danger',
            'warning' => 'alert-warning',
        ],

        'titles' => [
            'success' => 'Success',
            'info'    => 'Info',
            'error'   => 'Error',
            'warning' => 'Warning',
        ],

        'sticky' => false,

        'fadeOut' => true,

        'withTitles' => true,
    ]
];
