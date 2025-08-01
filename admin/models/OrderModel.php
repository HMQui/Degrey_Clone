<?php
require_once 'DBconnect.php';

class OrderModel
{
    private $db;

    public function __construct()
    {
        $this->db = new DB();
    }

    public function getFullInfoOrderItemsByOrderId($orderId)
    {
        $sql = "
        SELECT oi.order_id, oi.product_variant_id, oi.price_at_order, oi.quantity, pv.size, p.*
        FROM orders o
        INNER JOIN order_items oi ON o.id = oi.order_id
        INNER JOIN product_variants pv ON oi.product_variant_id = pv.id
        INNER JOIN products p ON p.id = pv.product_id
        WHERE oi.order_id = :order_id 
        ORDER BY o.created_at DESC
    ";
        return $this->db->queryWithParams($sql, [':order_id' => $orderId]);
    }

    public function getOrdersByFilter($filters = [], $limit = 10, $page = 1)
    {
        $sql = "SELECT * FROM orders WHERE 1=1";
        $params = [];

        if (!empty($filters['user_id'])) {
            $sql .= " AND user_id = :user_id";
            $params[':user_id'] = $filters['user_id'];
        }

        if (!empty($filters['order_id'])) {
            $sql .= " AND id = :order_id";
            $params[':order_id'] = $filters['order_id'];
        }

        if (!empty($filters['status'])) {
            $sql .= " AND status = :status";
            $params[':status'] = $filters['status'];
        }

        $offset = ($page - 1) * $limit;

        $sql .= " ORDER BY created_at DESC LIMIT " . (int)$limit . " OFFSET " . (int)$offset;

        return $this->db->queryWithParams($sql, $params);
    }


    public function countOrdersByFilter($filters = [])
    {
        $sql = "SELECT COUNT(*) as total FROM orders WHERE 1=1";
        $params = [];

        if (!empty($filters['user_id'])) {
            $sql .= " AND user_id = :user_id";
            $params[':user_id'] = $filters['user_id'];
        }

        if (!empty($filters['order_id'])) {
            $sql .= " AND id = :order_id";
            $params[':order_id'] = $filters['order_id'];
        }

        $result = $this->db->queryWithParams($sql, $params);
        return $result[0]['total'] ?? 0;
    }

    public function updateOrderStatus($orderId, $status)
    {
        $sql = "UPDATE orders SET status = :status WHERE id = :id";
        return $this->db->execute($sql, [':status' => $status, ':id' => $orderId]);
    }

    public function updateOrderInfo($orderId, $address, $phone_number, $note, $status)
    {
        $sql = "UPDATE orders SET address = :address, phone_number = :phone_number, note = :note, status = :status WHERE id = :id";
        $params = [
            ':id'           => $orderId,
            ':address'      => $address,
            ':phone_number' => $phone_number,
            ':note'         => $note,
            ':status' => $status
        ];
        return $this->db->execute($sql, $params);
    }

    public function deleteOrder($orderId)
    {
        $this->db->execute("DELETE FROM order_items WHERE order_id = :order_id", [':order_id' => $orderId]);
        return $this->db->execute("DELETE FROM orders WHERE id = :id", [':id' => $orderId]);
    }
}
