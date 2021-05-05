<?php

class IndexController
{
    public function view()
    {
        $postList = null;

        return require 'views/index.view.php';

    }
}
