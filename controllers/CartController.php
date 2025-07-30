<?php
require_once 'models/CartModel.php';
require_once 'models/ProductModel.php';

class CartController
{
    public function index()
    {
        $productModel = new ProductModel();
        $cartItems = [];
        $totalQuantity = 0;

        if (!isset($_SESSION['cart']) || empty($_SESSION['cart'])) {
            include 'views/cart.php';
            return;
        }
        foreach ($_SESSION['cart'] as $productVariantId => $item) {
            $totalQuantity += $item['quantity'];

            $product = $productModel->getProductByVariantId($productVariantId);

            $cartItems[] = [
                'product_variant_id' => $productVariantId,
                'quantity' => $item['quantity'],
                'product' => $product
            ];
        }
        include 'views/cart.php';
    }

    public function addToCart($productVariantId, $productId)
    {
        if (!isset($_SESSION['cart'])) {
            $_SESSION['cart'] = [];
        }
        if (isset($_SESSION['cart'][$productVariantId])) {
            $_SESSION['cart'][$productVariantId]['quantity'] += 1;
        } else {
            $_SESSION['cart'][$productVariantId] = [
                'productVariantId' => $productVariantId,
                'quantity' => 1
            ];
        }

        header('Location: index.php?pg=products&id=' . $productId);
    }

    public function updateCartItem($productVariantId, $quantity, $action)
    {
        if (!isset($_SESSION['cart']) || !isset($_SESSION['cart'][$productVariantId])) {
            return;
        }

        if ($action === 'remove') {
            unset($_SESSION['cart'][$productVariantId]);
        } else {
            if ($quantity > 0) {
                $_SESSION['cart'][$productVariantId]['quantity'] = $quantity;
            } else {
                unset($_SESSION['cart'][$productVariantId]);
            }
        }

        header('Location: index.php?pg=cart');
    }
}
