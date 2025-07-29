<?php
include_once 'models/OrderModel.php';
include_once 'models/ProductModel.php';
include_once 'models/CartModel.php';
class OrderController
{
    public function index()
    {
        include 'views/checkOrders.php';
    }

    public function createOrder($data)
    {
        $orderModel = new OrderModel();
        $prooductModel = new ProductModel();
        $cartModel = new CartModel();

        $userId = $_SESSION['user']['id'] ?? null;
        if (!$userId) {
            echo json_encode(['success' => false, 'message' => 'Người dùng chưa đăng nhập']);
            return;
        }

        $cartItems = json_decode($data['cartItems'], true);
        $totalPrice = 0;
        $paramsItem = [];

        foreach ($cartItems as $item) {
            $variantId = $item['product_variant_id'];
            $quantity = $item['quantity'];

            $product = $item['product'];
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
            $data['address'],
            $data['phone_number'],
            $data['note'],
            $paramsItem
        );

        foreach ($paramsItem as $i) {
            $prooductModel->updateProductVariantQuantity($i['productVariantId'], 0 - $i['quantity']);
        }

        $cartModel->deleteCartByUserId($userId);

        header('Content-Type: application/json');
        echo json_encode(['success' => true, 'message' => 'Đặt hàng thành công']);
    }
}
