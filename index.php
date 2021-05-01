<?php


require 'vendor/autoload.php';

$router = new Router;

// routing not working

require $router->direct(trim($_SERVER['REQUEST_URI'], '/'));

?>
