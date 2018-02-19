<?php

function config($key = '')
{
    $config = [
        'name' => 'a Simple PHP Website - Exercise 01',
        'nav_menu' => [
            '' => 'Home',
            'about-us' => 'About',
            'contact' => 'Contact',
        ],
        'template_path' => 'templates',
        'content_path' => 'pages',
        'pretty_uri' => true,
        'version' => 'v2.0',
    ];
    return isset($config[$key]) ? $config[$key] : null;
}