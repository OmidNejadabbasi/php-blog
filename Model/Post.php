<?php
require 'Model/Author.php';

class Post
{
    protected $postId;
    protected $content;
    protected $lastModified;
    protected $title;
    protected $abstract;
    protected $authorId;

    public function __construct($content, $lastModified, $title, $abstract, $authorId)
    {
        $this->content = $content;
        $this->lastModified = $lastModified;
        $this->title = $title;
        $this->authorId = $authorId;
        $this->abstract = $abstract;
    }

    public function getContent()
    {
        return $this->content;
    }

    public function setContent($content)
    {
        $this->content = $content;

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

    public function getAbstract()
    {
        return $this->abstract;
    }

    public function setAbstract($abstract)
    {
        $this->abstract = $abstract;
    }

    public function getAuthorId()
    {
        return $this->authorId;
    }

    public function setAuthorId($authorId)
    {
        $this->author = $authorId;

        return $this;
    }
}
