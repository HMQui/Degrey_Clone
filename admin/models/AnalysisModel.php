<?php
require_once 'DBconnect.php';

class AnalysisModel
{
    private $db;

    public function __construct()
    {
        $this->db = new DB();
    }

    public function getTopSellingProducts($limit = 10)
    {
        $sql = "
        SELECT pv.product_id, SUM(oi.quantity) as total_quantity
        FROM order_items oi
        JOIN product_variants pv ON oi.product_variant_id = pv.id
        GROUP BY pv.product_id
        ORDER BY total_quantity DESC
        LIMIT $limit
    ";
        return $this->db->query($sql);
    }

    public function getSlowSellingProducts($limit = 10)
    {
        $sql = "
        SELECT pv.product_id, SUM(oi.quantity) as total_quantity
        FROM order_items oi
        JOIN product_variants pv ON oi.product_variant_id = pv.id
        GROUP BY pv.product_id
        ORDER BY total_quantity ASC
        LIMIT $limit
    ";
        return $this->db->query($sql);
    }

    public function getTopCustomer($limit = 10)
    {
        $sql = "
            SELECT o.user_id, SUM(oi.quantity) AS total_quantity
            FROM order_items oi
            JOIN orders o ON oi.order_id = o.id
            GROUP BY o.user_id
            ORDER BY total_quantity DESC
            LIMIT $limit
        ";
        return $this->db->query($sql);
    }
}
