<?php

$pdo = new PDO("mysql:host=localhost;dbname=blog");

use PDO;

class PostsTable {

    protected PDO $pdo;
    protected static $tableName = "posts";
    protected static bool $tableCreated = false;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }
    public function insertPost(Post $post) {
        $this->ensureTableExists();
        $tn = $this->tableName;

        $statement = $this->pdo->prepare("INSERT INTO $tn (title, abstract, last_modified, content, author_id)
                    VALUES(:title, :abstract, :last_modified, :content, :author_id)");

        $statement->bindParam(":title", $post->getTitle());
        $statement->bindParam(":abstract", $post->getAbstract());
        $statement->bindParam(":last_modified", $post->getLastModified()==null?"DATE(NOW())":$post->getLastModified());
        $statement->bindParam(":content", $post->getContent());
        $statement->bindParam(":author_id", 0); // default user

        $statement->execute();
    }

    private function ensureTableExists() {
        if (!self::$tableCreated){
            $tn = $this->tableName;
            $this->pdo->exec("CREATE TABLE IF NOT EXISTS $tn(
            post_id INT AUTO_INCREMENT PRIMARY KEY,
            title VARCHAR(255) NOT NULL,
            abstract TEXT, 
            last_modified DATE,
            content TEXT NOT NULL,
            author_id INT NOT NULL,
            CONSTRAINT author_fk
            FOREIGN KEY (author_id)
            REFERENCES authors(author_id)
            ON UPDATE CASCADE
            ON DELETE NO ACTION
            );");
            self::$tableCreated = true;
        }

    }

}

class AuthorsTable {

    protected PDO $pdo;
    protected static $tableName = "authors";
    protected static bool $tableCreated = false;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

}

