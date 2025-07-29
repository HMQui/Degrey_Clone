<?php
require_once 'DBconnect.php';

class CartModel
{
    private $db;

    public function __construct()
    {
        $this->db = new DB();
    }

    public function createCart($userId)
    {
        $sql = "INSERT INTO carts (user_id, created_at) VALUES (?, NOW())";
        $this->db->execute($sql, [$userId]);
        return $this->db->lastInsertId();
    }

    public function getCartByUserId($userId)
    {
        $sql = "SELECT * FROM carts WHERE user_id = ?";
        return $this->db->queryOneWithParams($sql, [$userId]);
    }

    public function getCartItems($cartId)
    {
        $sql = "SELECT * FROM cart_items WHERE cart_id = ?";
        return $this->db->queryWithParams($sql, [$cartId]);
    }

    public function addOrUpdateItem($userId, $productVariantId, $quantity)
    {
        $sql = "SELECT * FROM carts WHERE user_id = ? ORDER BY created_at DESC LIMIT 1";
        $cart = $this->db->queryOneWithParams($sql, [$userId]);

        if (!$cart) {
            $sql = "INSERT INTO carts (user_id, created_at) VALUES (?, NOW())";
            $this->db->execute($sql, [$userId]);
            $cartId = $this->db->lastInsertId();
        } else {
            $cartId = $cart['id'];
        }

        $sql = "SELECT * FROM cart_items WHERE cart_id = ? AND product_variant_id = ?";
        $item = $this->db->queryOneWithParams($sql, [$cartId, $productVariantId]);

        if ($item) {
            $newQty = $item['quantity'] + $quantity;
            $sql = "UPDATE cart_items SET quantity = ? WHERE id = ?";
            return $this->db->execute($sql, [$newQty, $item['id']]);
        } else {
            $sql = "INSERT INTO cart_items (cart_id, product_variant_id, quantity) VALUES (?, ?, ?)";
            return $this->db->execute($sql, [$cartId, $productVariantId, $quantity]);
        }
    }

    public function updateItemQuantity($itemId, $quantity)
    {
        $sql = "UPDATE cart_items SET quantity = ? WHERE id = ?";
        return $this->db->execute($sql, [$quantity, $itemId]);
    }

    public function removeItem($itemId)
    {
        $sql = "DELETE FROM cart_items WHERE id = ?";
        return $this->db->execute($sql, [$itemId]);
    }

    public function clearCart($cartId)
    {
        $sql = "DELETE FROM cart_items WHERE cart_id = ?";
        return $this->db->execute($sql, [$cartId]);
    }

    public function countItemsInCart($cartId)
    {
        $sql = "SELECT COUNT(*) as total FROM cart_items WHERE cart_id = ?";
        $result = $this->db->queryOneWithParams($sql, [$cartId]);
        return $result['total'] ?? 0;
    }

    public function deleteCartByUserId($userId)
    {
        $sql = "SELECT id FROM carts WHERE user_id = ?";
        $carts = $this->db->queryWithParams($sql, [$userId]);

        if (empty($carts)) {
            return false;
        }

        foreach ($carts as $cart) {
            $sql = "DELETE FROM cart_items WHERE cart_id = ?";
            $this->db->execute($sql, [$cart['id']]);
        }

        $sql = "DELETE FROM carts WHERE user_id = ?";
        return $this->db->execute($sql, [$userId]);
    }
}
