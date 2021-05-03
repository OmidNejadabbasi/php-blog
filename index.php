<?php

require 'vendor/autoload.php';

function url () {
    return trim(
        parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/');
}

function requestMethod(){
    return $_SERVER['REQUEST_METHOD'];
}

Router::load('routes.php')->direct(url(), requestMethod());
