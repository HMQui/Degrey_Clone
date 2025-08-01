<?php
require_once 'DBconnect.php';

class CategoryModel
{
    private $db;

    public function __construct()
    {
        $this->db = new DB();
    }

    public function getAll()
    {
        $sql = 'SELECT * FROM categories';
        return $this->db->query($sql);
    }

    public function addCategory($data)
    {
        $sql = "INSERT INTO categories (id, name, quantity_of_size) VALUES (:id, :name, :quantity_of_size)";

        return $this->db->execute($sql, [
            ':id' => $data['id'],
            ':name' => $data['name'],
            ':quantity_of_size' => $data['quantity_of_size']
        ]);
    }

    public function updateCategory($data)
    {
        $sql = "UPDATE categories 
            SET name = :name, quantity_of_size = :quantity_of_size 
            WHERE id = :id";

        return $this->db->execute($sql, [
            ':id' => $data['id'],
            ':name' => $data['name'],
            ':quantity_of_size' => $data['quantity_of_size']
        ]);
    }

    public function deleteCategory($id)
    {
        $sql = "DELETE FROM categories WHERE id = :id";

        return $this->db->execute($sql, [
            ':id' => $id,
        ]);
    }
}
