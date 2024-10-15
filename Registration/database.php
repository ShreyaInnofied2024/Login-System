<?php
class Database {
    private $serverName;
    private $userName;
    private $password;
    private $dbName;
    private $conn;

    public function __construct($serverName = "localhost", $userName = "root", $password = "password", $dbName = "Users") {
        $this->serverName = $serverName;
        $this->userName = $userName;
        $this->password = $password;
        $this->dbName = $dbName;
    }

    public function connect() {
        try {
            $this->conn = new PDO("mysql:host={$this->serverName};dbname={$this->dbName}", $this->userName, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }

    public function get_connection() {
        return $this->conn;
    }

    public function __destruct()
    {
        $this->conn = null; 
    }
}
function connection($query){
    $db=new Database();
    $db->connect();
    $conn=$db->get_connection();
    $sql = $query;
    $stmt = $conn->prepare($sql);
    return $stmt;
    }

function execute($stmt){
    return $stmt->execute();
}