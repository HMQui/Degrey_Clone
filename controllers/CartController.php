<?php
require_once 'models/CartModel.php';
require_once 'models/ProductModel.php';

class CartController
{
    public function index()
    {
        include 'views/cart.php';
    }

    public function addToCart($data)
    {
        $cartModel = new CartModel();

        $userId = '';
        if (isset($_SESSION['user'])) {
            $userId = $_SESSION['user']['id'];
        } else return;

        $cartModel->addOrUpdateItem($userId, $data['productVariantId'], $data['quantity']);
    }

    public function getCart()
    {
        $cartModel = new CartModel();
        $productModel = new ProductModel();
        header('Content-Type: application/json');

        if (!isset($_SESSION['user'])) {
            echo json_encode([
                'quantity' => 0,
                'items' => []
            ]);
            return;
        }

        $userId = $_SESSION['user']['id'];
        $cart = $cartModel->getCartByUserId($userId);

        if (!$cart) {
            echo json_encode([
                'quantity' => 0,
                'items' => []
            ]);
            return;
        }

        $cartItems = $cartModel->getCartItems($cart['id']);
        $quantity = 0;

        foreach ($cartItems as &$item) {
            $quantity += $item['quantity'];

            $product = $productModel->getProductByVariantId($item['product_variant_id']);
            $item['product'] = $product;
        }

        echo json_encode([
            'quantity' => $quantity,
            'items' => $cartItems
        ]);
    }

    public function updateCartItem($data)
    {
        $cartModel = new CartModel();

        $cartModel->updateItemQuantity($data['id'], $data['quantity']);
    }

    public function deleteCartItem($data)
    {
        $cartModel = new CartModel();

        $cartModel->removeItem($data['id']);
    }
}
