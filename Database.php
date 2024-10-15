<?php
class Database {
    private $host = "localhost"; // Database host
    private $db_name = "u121643321_nada_aboelenin"; // Database name
    private $username = "u121643321_nada_aboelenin"; // Database username
    private $password = "8ztZvsHtFr!A6t7"; // Database password
    public $conn;
    
    public function getConnection() {
        $this->conn = null;

        try {
            $this->conn = new mysqli($this->host, $this->username, $this->password, $this->db_name);
            if ($this->conn->connect_error) {
                die("Connection failed: " . $this->conn->connect_error);
            }
        } catch (Exception $e) {
            echo "Connection error: " . $e->getMessage();
        }

        return $this->conn;
    }
}
?>
