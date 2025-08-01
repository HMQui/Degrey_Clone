<?php
require_once 'DBconnect.php';

class UserModel
{
    private $db;

    public function __construct()
    {
        $this->db = new DB();
    }

    public function getUsers($page = 1, $limit = 10, $filters = [])
    {
        $offset = ($page - 1) * $limit;

        $sql = "SELECT * FROM users WHERE 1";
        $params = [];

        if (!empty($filters['userId'])) {
            $sql .= " AND id = ?";
            $params[] = $filters['userId'];
        }

        if (!empty($filters['full_name'])) {
            $sql .= " AND full_name LIKE ?";
            $params[] = '%' . $filters['full_name'] . '%';
        }

        $sql .= " ORDER BY id DESC LIMIT $limit OFFSET $offset";

        return $this->db->queryWithParams($sql, $params);
    }

    public function getTotalUsers($filters = [])
    {
        $sql = "SELECT COUNT(*) FROM users WHERE 1";
        $params = [];

        if (!empty($filters['id'])) {
            $sql .= " AND id = ?";
            $params[] = $filters['id'];
        }

        if (!empty($filters['full_name'])) {
            $sql .= " AND full_name LIKE ?";
            $params[] = '%' . $filters['full_name'] . '%';
        }

        return $this->db->fetchColumn($sql, $params);
    }

    public function getUserById($id)
    {
        $sql = "SELECT * FROM users WHERE id = ?";
        return $this->db->queryOneWithParams($sql, [$id]);
    }

    public function createUser($email, $password, $full_name, $role = 'customer')
    {
        $sql = "INSERT INTO users (email, password, full_name, role, created_at)
                VALUES (:email, :password, :full_name, :role, NOW())";
        return $this->db->execute($sql, [
            ':email' => $email,
            ':password' => password_hash($password, PASSWORD_DEFAULT),
            ':full_name' => $full_name,
            ':role' => $role
        ]);
    }

    public function updateUser($id, $data)
    {
        $fields = [];
        $params = [':id' => $id];

        if (isset($data['email'])) {
            $fields[] = "email = :email";
            $params[':email'] = $data['email'];
        }
        if (isset($data['password'])) {
            $fields[] = "password = :password";
            $params[':password'] = password_hash($data['password'], PASSWORD_DEFAULT);
        }
        if (isset($data['full_name'])) {
            $fields[] = "full_name = :full_name";
            $params[':full_name'] = $data['full_name'];
        }
        if (isset($data['role'])) {
            $fields[] = "role = :role";
            $params[':role'] = $data['role'];
        }

        if (empty($fields)) return false;

        $sql = "UPDATE users SET " . implode(", ", $fields) . " WHERE id = :id";
        return $this->db->execute($sql, $params);
    }

    public function deleteUser($userId)
    {
        $sql = "DELETE FROM users WHERE id = ?";
        return $this->db->execute($sql, [$userId]);
    }
}
