<?php

class CreatePostController
{
    public function view()
    {
        return require 'views/create-post.view.php';
    }

    public function savePost() {
        
        $title = $_POST['title'];
        $absract = $_POST['abstract'];
        $content = $_POST['content'];

        $lastModified = new DateTime();
        $lastModified = $lastModified->format('Y-m-d');
        $authorId = 0; // TODO authentication system


        $post = new Post($content, $lastModified, $title, $absract, $authorId);
        
        PostsTable::getInstance()->insertPost($post);

        header("Location: /");
    }

}
