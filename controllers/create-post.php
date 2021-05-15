<?php

class CreatePostController
{
    public function view()
    {
        return require 'views/create-post.view.php';
    }

    public function savePost()
    {

        $title = $_POST['title'];
        $absract = $_POST['abstract'];
        $content = $_POST['content'];

        $lastModified = new DateTime();
        $lastModified = $lastModified->format('Y-m-d');
        $authorId = 0; // TODO authentication system

        $ext = pathinfo($_FILES['poster-image']['name'], PATHINFO_EXTENSION);
        $posterFileName = 'img-' . str_replace('\s+', '-', $title) . $ext;
        $target = 'uploads/';
        move_uploaded_file($$_FILES['poster-image']['tmp_name'], $target . $posterFileName);

        $post = new Post($content, $lastModified, $title, $absract, $authorId, $posterFileName, $posterFileName);

        PostsTable::getInstance()->insertPost($post);

        header("Location: /");
        die();
    }

}
