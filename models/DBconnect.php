<?php
class DB
{
    private $host = 'localhost:3307';
    private $dbname = 'degrey';
    private $username = 'root';
    private $password = '';
    private $conn;

    public function __construct()
    {
        try {
            $dsn = "mysql:host=$this->host;dbname=$this->dbname;charset=utf8mb4";
            $this->conn = new PDO($dsn, $this->username, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die("Kết nối thất bại: " . $e->getMessage());
        }
    }

    // SELECT all
    public function query($sql)
    {
        $stmt = $this->conn->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // SELECT one
    public function queryOne($sql)
    {
        $stmt = $this->conn->query($sql);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // SELECT all with params
    public function queryWithParams($sql, $params = [])
    {
        $stmt = $this->conn->prepare($sql);
        $stmt->execute($params);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // SELECT one with params
    public function queryOneWithParams($sql, $params = [])
    {
        $stmt = $this->conn->prepare($sql);
        $stmt->execute($params);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // INSERT/UPDATE/DELETE
    public function execute($sql, $params = [])
    {
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute($params);
    }

    public function lastInsertId()
    {
        return $this->conn->lastInsertId();
    }
}
