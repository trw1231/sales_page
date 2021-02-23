<?php
class Database
{
    private $host     = "127.0.0.1";
    private $db_name  = "salepage";
    private $username = "salepage";
    private $password = "salepage_password";
    public $conn;

    public function dbConnection()
    {
        $this->conn = null;
        try
        {
            $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->username, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        } catch (PDOException $exception) {
            echo "Connection error: " . $exception->getMessage();
        }

        return $this->conn;
    }
}
