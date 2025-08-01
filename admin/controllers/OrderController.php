<?php
include_once 'models/OrderModel.php';

class OrderController
{
    public function index($params)
    {
        $orderModel = new OrderModel();

        $page = $params['page'] ?? 1;
        $orderId = $params['order_id'] ?? '';
        $userId = $params['user_id'] ?? '';
        $status = $params['status'] ?? '';

        $orders = $orderModel->getOrdersByFilter(['order_id' => $orderId, 'user_id' => $userId, 'status' => $status], 10, $page);
        $totalOrders = $orderModel->countOrdersByFilter(['order_id' => $orderId, 'user_id' => $userId, 'status' => $status]);

        foreach ($orders as &$order) {
            $items = $orderModel->getFullInfoOrderItemsByOrderId($order['id']);
            $order['items'] = $items;
        }
        unset($order);

        include 'views/orders.php';
    }

    public function updateOrder($data)
    {
        $orderModel = new OrderModel();

        $orderModel->updateOrderInfo($data['id'], $data['address'], $data['phone_number'], $data['note'], $data['status']);

        header('Location: index.php?pg=orders');
    }
}
