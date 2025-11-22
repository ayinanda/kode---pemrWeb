<?php 

class Database {
    private $host = 'localhost';
    private $db_name = 'db_kampus'; 
    private $username = 'postgres';                
    private $password = '220306';              
    private $port = '5433';
    public $conn;

    public function getConnection() { 
        $this->conn = null; 
        
        try { 
            $dsn = "pgsql:host=" . $this->host . ";port=" . $this->port . ";dbname=" . $this->db_name; 
            
            $this->conn = new PDO($dsn, $this->username, $this->password); 
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
            $this->conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC); // Tambahan agar fetch lebih rapi
            
        } catch(PDOException $exception) { 
            echo "Connection error: " . $exception->getMessage(); 
        } 
        
        return $this->conn; 
    } 
}


$database = new Database();
$pdo = $database->getConnection();

?>