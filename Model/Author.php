<?php

class Author
{
    protected $authorId;
    protected $name;
    

    public function __construct($name)
    {
        $this->name = $name;
    }
}