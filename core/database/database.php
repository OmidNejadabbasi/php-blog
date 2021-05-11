<?php
use PDO;



// Singleton to connect db.
class ConnectDb
{
    // Hold the class instance.
    private static $instance = null;
    private $conn;

    private $host = 'localhost';
    private $user = 'root';
    private $pass = '';
    private $name = 'blog';

    // The db connection is established in the private constructor.
    private function __construct()
    {
        $this->conn = new PDO("mysql:host={$this->host};
      dbname={$this->name}", $this->user, $this->pass,
            array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));
    }

    public static function getInstance()
    {
        if (!self::$instance) {
            self::$instance = new ConnectDb();
        }

        return self::$instance;
    }

    public function getConnection()
    {
        return $this->conn;
    }
}


class PostsTable
{

    private static $instance = null;

    protected PDO $pdoObject;
    protected static $tableName = "posts";

    final private function __construct($pdoObject)
    {
        $this->pdoObject = $pdoObject;
    }

    public static function getInstance()
    {
        if (!isset(self::$instance)) {
            self::$instance = new PostsTable(ConnectDb::getInstance()->getConnection());
            self::$instance->ensureTableExists();
        }
        return self::$instance;
    }

    public function insertPost(Post $post)
    {
        $tn = $this->tableName;

        $statement = $this->pdoObject->prepare("INSERT INTO $tn (title, abstract, last_modified, content, author_id)
                    VALUES(:title, :abstract, :last_modified, :content, :author_id)");

        $statement->bindParam(":title", $post->getTitle());
        $statement->bindParam(":abstract", $post->getAbstract());
        $statement->bindParam(":last_modified", $post->getLastModified() == null ? "DATE(NOW())" : $post->getLastModified());
        $statement->bindParam(":content", $post->getContent());
        $statement->bindParam(":author_id", 0); // default user

        $statement->execute();
    }

    private function ensureTableExists()
    {

        $tn = $this->tableName;
        $this->pdoObject->exec("CREATE TABLE IF NOT EXISTS $tn(
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

    }

}

class AuthorsTable
{

    protected $pdoObject;
    protected static $tableName = "authors";
    protected static $tableCreated = false;

    public function __construct($pdoObject)
    {
        $this->pdoObject = $pdoObject;
    }

}
