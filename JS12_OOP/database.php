<?php
class database
{
    private $host = "localhost";
    private $port = "5433";
    private $username = "postgres";
    private $password = "220306";
    private $database = "prakwebdb";
    public $conn;

    public function __construct()
    {
        $connection_string = "
            host=$this->host 
            port=$this->port 
            dbname=$this->database 
            user=$this->username 
            password=$this->password
        ";

        $this->conn = pg_connect($connection_string);

        if (!$this->conn) {
            die("Connection failed: " . pg_last_error());
        }
    }
}
?>
