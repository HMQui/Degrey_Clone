<?php
require_once 'DBconnect.php';

class ProductModel
{
    private $db;

    public function __construct()
    {
        $this->db = new DB();
    }

    public function getProductById($id)
    {
        $sql = "SELECT * FROM products WHERE id = :id";
        return $this->db->queryOneWithParams($sql, ['id' => $id]);
    }

    public function getAllProducts($filters = [], $page = 1, $limit = 10)
    {
        $offset = ($page - 1) * $limit;
        $params = [];
        $conditions = [];

        if (!empty($filters['gender']) && $filters['gender'] !== 'all') {
            $conditions[] = 'p.gender = ?';
            $params[] = $filters['gender'];
        }

        if (!empty($filters['name'])) {
            $conditions[] = 'p.name LIKE ?';
            $params[] = '%' . $filters['name'] . '%';
        }

        if (!empty($filters['category'])) {
            $conditions[] = 'p.category = ?';
            $params[] = $filters['category'];
        }

        $where = '';
        if (!empty($conditions)) {
            $where = 'WHERE ' . implode(' AND ', $conditions);
        }

        $sql = "SELECT p.*, c.name AS category_name 
            FROM products p 
            JOIN categories c ON p.category = c.id
            $where 
            ORDER BY p.created_at ASC 
            LIMIT $limit OFFSET $offset";

        return $this->db->queryWithParams($sql, $params);
    }

    public function countAllProducts($filters = [])
    {
        $params = [];
        $conditions = [];

        if (!empty($filters['gender']) && $filters['gender'] !== 'all') {
            $conditions[] = 'p.gender = ?';
            $params[] = $filters['gender'];
        }

        if (!empty($filters['name'])) {
            $conditions[] = 'p.name LIKE ?';
            $params[] = '%' . $filters['name'] . '%';
        }

        if (!empty($filters['category'])) {
            $conditions[] = 'p.category = ?';
            $params[] = $filters['category'];
        }

        $where = '';
        if (!empty($conditions)) {
            $where = 'WHERE ' . implode(' AND ', $conditions);
        }

        $sql = "SELECT COUNT(*) AS total 
            FROM products p 
            JOIN categories c ON p.category = c.id 
            $where";

        $result = $this->db->queryWithParams($sql, $params);
        return $result[0]['total'] ?? 0;
    }

    public function getVariantsByProductId($productId)
    {
        $sql = "SELECT * FROM product_variants WHERE product_id = ?";
        return $this->db->queryWithParams($sql, [$productId]);
    }

    public function addProduct($data)
    {
        $sql = "INSERT INTO products (name, price, discount_percent, material, pattern, category, created_at, color, images, gender)
                VALUES (:name, :price, :discount_percent, :material, :pattern, :category, NOW(), :color, :images, :gender)";

        $params = [
            ':name' => $data['name'],
            ':price' => $data['price'],
            ':discount_percent' => $data['discount_percent'] ?? 0,
            ':material' => $data['material'] ?? '',
            ':pattern' => $data['pattern'] ?? '',
            ':category' => $data['category_id'],
            ':color' => $data['color'] ?? '',
            ':images' => $data['images'],
            ':gender' => $data['gender'] ?? 'null',
        ];

        $this->db->execute($sql, $params);
        $productId = $this->db->lastInsertId();

        $variantSQL = "INSERT INTO product_variants (product_id, size, quantity) VALUES (:product_id, :size, :quantity)";

        if (isset($data['quantity_of_size_s'])) {
            $sizes = ['s', 'm', 'l'];
            foreach ($sizes as $size) {
                $quantity = $data["quantity_of_size_" . strtolower($size)] ?? 0;
                $this->db->execute($variantSQL, [
                    ':product_id' => $productId,
                    ':size' => $size,
                    ':quantity' => $quantity
                ]);
            }
        } elseif (isset($data['freesize_name'])) {
            $this->db->execute($variantSQL, [
                ':product_id' => $productId,
                ':size' => $data['freesize_name'],
                ':quantity' => $data['freesize_quantity']
            ]);
        }

        return $productId;
    }

    public function updateProduct($data)
    {
        $fields = [];
        $params = [];

        if (isset($data['name'])) {
            $fields[] = "name = :name";
            $params[':name'] = $data['name'];
        }
        if (isset($data['price'])) {
            $fields[] = "price = :price";
            $params[':price'] = $data['price'];
        }
        if (isset($data['discount_percent'])) {
            $fields[] = "discount_percent = :discount_percent";
            $params[':discount_percent'] = $data['discount_percent'];
        }
        if (isset($data['material'])) {
            $fields[] = "material = :material";
            $params[':material'] = $data['material'];
        }
        if (isset($data['pattern'])) {
            $fields[] = "pattern = :pattern";
            $params[':pattern'] = $data['pattern'];
        }
        if (isset($data['category_id'])) {
            $fields[] = "category = :category";
            $params[':category'] = $data['category_id'];
        }
        if (isset($data['color'])) {
            $fields[] = "color = :color";
            $params[':color'] = $data['color'];
        }
        if (isset($data['image1']) && isset($data['image2'])) {
            $fields[] = "images = :images";
            $params[':images'] = implode(',', [$data['image1'], $data['image2']]);
        }
        if (isset($data['gender'])) {
            $fields[] = "gender = :gender";
            $params[':gender'] = $data['gender'];
        }

        $params[':product_id'] = $data['productId'];

        $sql = "UPDATE products SET " . implode(', ', $fields) . " WHERE id = :product_id";

        if (!empty($fields)) {
            $sql = "UPDATE products SET " . implode(', ', $fields) . " WHERE id = :product_id";
            $this->db->execute($sql, $params);
        }

        if (
            isset($data['quantity_of_size_s']) ||
            isset($data['quantity_of_size_m']) ||
            isset($data['quantity_of_size_l']) ||
            (isset($data['freesize_name']) && isset($data['freesize_quantity']))
        ) {
            $updateQtySQL = "UPDATE product_variants SET quantity = :quantity WHERE product_id = :product_id AND size = :size";

            $sizes = ['s', 'm', 'l'];
            foreach ($sizes as $size) {
                if (isset($data["quantity_of_size_" . $size])) {
                    $this->db->execute($updateQtySQL, [
                        ':product_id' => $data['productId'],
                        ':size' => $size,
                        ':quantity' => $data["quantity_of_size_" . $size]
                    ]);
                }
            }
        }

        if (isset($data['freesize_name']) || isset($data['freesize_quantity'])) {
            $sql = 'UPDATE product_variants SET ';
            $params = [];
            $updates = [];

            if (isset($data['freesize_name'])) {
                $updates[] = 'size = :size';
                $params[':size'] = $data['freesize_name'];
            }

            if (isset($data['freesize_quantity'])) {
                $updates[] = 'quantity = :quantity';
                $params[':quantity'] = $data['freesize_quantity'];
            }

            $sql .= implode(', ', $updates);
            $sql .= ' WHERE product_id = :product_id';
            $params[':product_id'] = $data['productId'];

            $this->db->execute($sql, $params);
        }


        return true;
    }

    public function deleteProduct($id)
    {
        $sql = "
        DELETE FROM product_variants WHERE product_id = :id;
        DELETE FROM products WHERE id = :id
        ";
        return $this->db->execute($sql, ['id' => $id]);
    }
}
