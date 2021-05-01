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

    }

    private function ensureTableExists() {
        if (!self::$tableCreated){
            $tn = $this->tableName;
            $this->pdo->exec("CREATE TABLE IF NOT EXISTS $tn(
            post_id INT AUTO_INCREMENT PRIMARY KEY,
            title VARCHAR(255) NOT NULL,
            abstract TEXT, 
            last_modified DATE,
            post_file_name TEXT,
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

