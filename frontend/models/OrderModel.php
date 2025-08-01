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


    public function createOrder($userId, $totalPrice, $address = '', $phone_number = '', $note = '', $items = [], $status = 'pending')
    {
        $sql = "INSERT INTO orders (user_id, total_price, status, address, phone_number, note, created_at)
            VALUES (:user_id, :total_price, :status, :address, :phone_number, :note, NOW())";
        $params = [
            ':user_id'       => $userId,
            ':total_price'   => $totalPrice,
            ':status'        => $status,
            ':address'       => $address,
            ':phone_number'  => $phone_number,
            ':note'          => $note
        ];

        $this->db->execute($sql, $params);

        $orderId = $this->db->lastInsertId();

        $sqlItem = "INSERT INTO order_items (order_id, product_variant_id, quantity, price_at_order)
                VALUES (:order_id, :product_variant_id, :quantity, :price_at_order)";

        foreach ($items as $item) {
            $paramsItem = [
                ':order_id'            => $orderId,
                ':product_variant_id'  => $item['productVariantId'],
                ':quantity'            => $item['quantity'],
                ':price_at_order'      => $item['priceAtOrder']
            ];
            $this->db->execute($sqlItem, $paramsItem);
        }

        return $orderId;
    }

    public function getOrdersByUser($userId)
    {
        $sql = "SELECT * FROM orders WHERE user_id = :user_id ORDER BY created_at DESC";
        return $this->db->queryWithParams($sql, [':user_id' => $userId]);
    }

    public function getOrderById($orderId)
    {
        $sql = "SELECT * FROM orders WHERE id = :id";
        return $this->db->queryOneWithParams($sql, [':id' => $orderId]);
    }

    public function getOrderItems($orderId)
    {
        $sql = "SELECT * FROM order_items WHERE order_id = :order_id";
        return $this->db->queryWithParams($sql, [':order_id' => $orderId]);
    }

    public function updateOrderStatus($orderId, $status)
    {
        $sql = "UPDATE orders SET status = :status WHERE id = :id";
        return $this->db->execute($sql, [':status' => $status, ':id' => $orderId]);
    }

    public function updateOrderInfo($orderId, $address, $phone_number, $note)
    {
        $sql = "UPDATE orders SET address = :address, phone_number = :phone_number, note = :note WHERE id = :id";
        $params = [
            ':id'           => $orderId,
            ':address'      => $address,
            ':phone_number' => $phone_number,
            ':note'         => $note
        ];
        return $this->db->execute($sql, $params);
    }

    public function deleteOrder($orderId)
    {
        $this->db->execute("DELETE FROM order_items WHERE order_id = :order_id", [':order_id' => $orderId]);
        return $this->db->execute("DELETE FROM orders WHERE id = :id", [':id' => $orderId]);
    }
}
