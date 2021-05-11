<?php



$router->get('', 'IndexController');
$router->get('about', 'AboutController');
$router->get('create-post', 'CreatePostController');

// post routes
$router->post('save-post', 'CreatePostController::savePost');