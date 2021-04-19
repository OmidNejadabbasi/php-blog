<?php
require 'Model/Author.php';

class Post
{
    protected $fileName;
    protected $lastModified;
    protected $title;
    protected Author $author;

    public function __construct($fileName, $lastModified, $title, Author $author)
    {
        $this->fileName = $fileName;
        $this->lastModified = $lastModified;
        $this->title = $title;
        $this->author = $author;

    }

    public function getFileName()
    {
        return $this->fileName;
    }

    public function setFileName($fileName)
    {
        $this->fileName = $fileName;

        return $this;
    }

    public function getLastModified()
    {
        return $this->lastModified;
    }

    public function setLastModified($lastModified)
    {
        $this->lastModified = $lastModified;

        return $this;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }


    public function getAuthor()
    {
        return $this->author;
    }

    public function setAuthor($author)
    {
        $this->author = $author;

        return $this;
    }
}
