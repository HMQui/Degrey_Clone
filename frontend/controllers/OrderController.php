<?php
include_once 'models/OrderModel.php';
include_once 'models/ProductModel.php';
include_once 'models/CartModel.php';
class OrderController
{
    public function index()
    {
        $orderModel = new OrderModel();

        $orders = [];
        if (!isset($_SESSION['user'])) {
            include 'views/checkOrders.php';
            return;
        }
        $userId = $_SESSION['user']['id'];

        $orders = $orderModel->getOrdersByUser($userId);

        foreach ($orders as &$order) {
            $items = $orderModel->getFullInfoOrderItemsByOrderId($order['id']);
            $order['items'] = $items;
        }
        unset($order);


        include 'views/checkOrders.php';
    }

    public function createOrder($address, $phoneNumber, $note)
    {
        $orderModel = new OrderModel();
        $productModel = new ProductModel();

        $userId = $_SESSION['user']['id'];
        $cartItems = $_SESSION['cart'];
        $totalPrice = 0;
        $paramsItem = [];

        foreach ($cartItems as $item) {
            $variantId = $item['productVariantId'];
            $quantity = $item['quantity'];

            $product = $productModel->getProductByVariantId($item['productVariantId']);
            $price = $product['price'];
            $discountPercent = $product['discount_percent'] ?? 0;

            $finalPrice = $price * (1 - $discountPercent / 100);
            $totalPrice += $quantity * $finalPrice;

            $paramsItem[] = [
                'productVariantId' => $variantId,
                'quantity' => $quantity,
                'priceAtOrder' => $finalPrice
            ];
        }

        $orderModel->createOrder(
            $userId,
            $totalPrice,
            $address,
            $phoneNumber,
            $note,
            $paramsItem
        );

        $_SESSION['cart'] = [];

        header('Location: index.php?pg=cart');
    }

    public function changeStatusOrder($id, $status)
    {
        $orderModel = new OrderModel();

        $orderModel->updateOrderStatus($id, $status);

        header('Location: index.php?pg=check-orders');
    }
}
