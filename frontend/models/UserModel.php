<?php
require_once 'DBconnect.php';

class UserModel
{
    private $db;

    public function __construct()
    {
        $this->db = new DB();
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

    public function deleteUser($id)
    {
        $sql = "DELETE FROM users WHERE id = :id";
        return $this->db->execute($sql, [':id' => $id]);
    }

    public function getAllUsers()
    {
        $sql = "SELECT * FROM users ORDER BY created_at DESC";
        return $this->db->query($sql);
    }

    public function getUserById($id)
    {
        $sql = "SELECT * FROM users WHERE id = :id";
        return $this->db->queryOneWithParams($sql, [':id' => $id]);
    }

    public function getUserByEmail($email)
    {
        $sql = "SELECT * FROM users WHERE email = :email";
        return $this->db->queryOneWithParams($sql, [':email' => $email]);
    }

    public function authenticate($email, $password)
    {
        $user = $this->getUserByEmail($email);
        if ($user && password_verify($password, $user['password'])) {
            return $user;
        }
        return false;
    }
}
