<?php

return [
    'tpl_folder'       => resource_path('views/'),
    'cache_folder'     => storage_path('framework/views/'),
    'tpl_file_format'  => '.tpl',
    'default_tpl_file' => 'index',
    'assets_paths'     => [
        'public'         => 'public',
        'images'         => 'public/assets/images',
        'css'            => 'public/assets/css',
        'themes'         => 'public/assets/themes',
        'js'             => 'public/assets/js',
        'libs'           => 'public/libs',
        'bower'          => 'public/libs/bower',
    ]
];
