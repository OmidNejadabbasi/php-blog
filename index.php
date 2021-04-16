<?php


require 'core/bootstrap.php';

$router = new Router;

require 'routes.php';


require $router->direct(trim($_SERVER['REQUEST_URI'], '/'));

?>
