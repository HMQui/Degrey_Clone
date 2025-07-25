<?php
require_once 'DBconnect.php';

class ProductModel
{
    private $db;

    public function __construct()
    {
        $this->db = new DB();
    }

    public function getAllProducts()
    {
        $sql = "SELECT * FROM products";
        return $this->db->query($sql);
    }

    public function getProductById($id)
    {
        $sql = "SELECT * FROM products WHERE id = :id";
        return $this->db->queryOneWithParams($sql, ['id' => $id]);
    }

    public function getQuantityFollowSize($productId)
    {
        $sql = "SELECT * FROM product_variants WHERE product_id = :product_id";

        return $this->db->queryWithParams($sql, ['product_id' => $productId]);
    }


    public function getProductsByFilter($filters = [], $limit = null, $offset = null)
    {
        $sql = "SELECT * FROM products";
        $params = [];
        $conditions = [];
        $orderBy = "";

        foreach ($filters as $key => $value) {
            if ($key === 'gender') {
                if ($value === 'male' || $value === 'female') {
                    $conditions[] = "(gender = :gender OR gender = 'both')";
                    $params[':gender'] = $value;
                }
            } else if ($key === 'price_min') {
                $conditions[] = "price >= :price_min";
                $params[':price_min'] = $value;
            } else if ($key === 'price_max') {
                $conditions[] = "price <= :price_max";
                $params[':price_max'] = $value;
            } else if ($key === 'order') {
                $parts = explode('-', $value);
                if (count($parts) === 2) {
                    $field = $parts[0];
                    $direction = strtoupper($parts[1]);
                    if (in_array($field, ['name', 'price', 'id', 'created_at']) && in_array($direction, ['ASC', 'DESC'])) {
                        $orderBy = " ORDER BY $field $direction";
                    }
                }
            } else {
                $conditions[] = "$key = :$key";
                $params[":$key"] = $value;
            }
        }

        if (!empty($conditions)) {
            $sql .= " WHERE " . implode(" AND ", $conditions);
        }

        if (!empty($orderBy)) {
            $sql .= $orderBy;
        }

        if ($limit !== null) {
            $limit = (int)$limit;
            $sql .= " LIMIT $limit";

            if ($offset !== null) {
                $offset = (int)$offset;
                $sql .= " OFFSET $offset";
            }
        }

        return $this->db->queryWithParams($sql, $params);
    }

    public function searchByKeyword($keyword)
    {
        $sql = "SELECT * FROM products WHERE name LIKE :kw LIMIT 6";
        return $this->db->queryWithParams($sql, ['kw' => '%' . $keyword . '%']);
    }

    public function countProductsByFilter($filters = [])
    {
        $sql = "SELECT COUNT(*) as total FROM products";
        $params = [];
        $conditions = [];

        foreach ($filters as $key => $value) {
            if ($key === 'order') {
                continue;
            }

            if ($key === 'gender') {
                if ($value === 'male' || $value === 'female') {
                    $conditions[] = "(gender = :gender OR gender = 'both')";
                    $params[':gender'] = $value;
                }
            } elseif ($key === 'price_min') {
                $conditions[] = "price >= :price_min";
                $params[':price_min'] = $value;
            } elseif ($key === 'price_max') {
                $conditions[] = "price <= :price_max";
                $params[':price_max'] = $value;
            } else {
                $conditions[] = "$key = :$key";
                $params[":$key"] = $value;
            }
        }

        if (!empty($conditions)) {
            $sql .= " WHERE " . implode(" AND ", $conditions);
        }

        $result = $this->db->queryWithParams($sql, $params);
        return $result[0]['total'] ?? 0;
    }

    public function insertProduct($data)
    {
        $sql = "INSERT INTO products (name, price, quantity, image)
                VALUES (:name, :price, :quantity, :image)";
        return $this->db->execute($sql, $data);
    }

    public function updateProduct($id, $data)
    {
        $data['id'] = $id;
        $sql = "UPDATE products 
                SET name = :name, price = :price, quantity = :quantity, image = :image 
                WHERE id = :id";
        return $this->db->execute($sql, $data);
    }

    public function deleteProduct($id)
    {
        $sql = "DELETE FROM products WHERE id = :id";
        return $this->db->execute($sql, ['id' => $id]);
    }
}
