<?php
session_start();
include_once 'controllers/ProductController.php';
include_once 'controllers/UserController.php';
include_once 'controllers/CategoryController.php';
include_once 'controllers/OrderController.php';
include_once 'controllers/AnalysisController.php';
include_once 'controllers/AuthController.php';

if (!isset($_SESSION['user']) || $_SESSION['user']['role'] !== 'admin') {
    header('Location: ../frontend/index.php');
    exit;
}

$pg = $_GET['pg'] ?? 'dashboard';

switch ($pg) {
    case 'dashboard':
        include 'views/dashboard.html';
        break;
    case 'products':
        $productController = new ProductController();
        $params = $_GET;
        $productController->index($params);
        break;
    case 'add-product':
        $productController = new ProductController();
        $newProduct = $_POST;
        $productController->AddProduct($newProduct);
        break;
    case 'edit-product':
        $productController = new ProductController();
        $data = $_POST;
        $productController->EditProduct($data);
        break;
    case 'delete-product':
        $productController = new ProductController();
        $productId = $_POST['productId'];
        $productController->deleteProduct($productId);
        break;
    case 'users':
        $userController = new UserController();
        $params = $_GET;
        $userController->index($params);
        break;
    case 'add-user':
        $userController = new UserController();
        $data = $_POST;
        $userController->addUser($data);
        break;
    case 'edit-user':
        $userController = new UserController();
        $data = $_POST;
        $userController->updateUser($data);
        break;
    case 'delete-user':
        $userController = new UserController();
        $userId = $_POST['userId'];
        $userController->deleteUser($userId);
        break;
    case 'categories':
        $categoryController = new CategoryController();
        $categoryController->index();
        break;
    case 'add-category':
        $categoryController = new CategoryController();
        $data = $_POST;
        $categoryController->addCategory($data);
        break;
    case 'edit-category':
        $categoryController = new CategoryController();
        $data = $_POST;
        $categoryController->updateCategory($data);
        break;
    case 'delete-category':
        $categoryController = new CategoryController();
        $id = $_POST['id'];
        $categoryController->deleteCategory($id);
        break;
    case 'orders':
        $orderController = new OrderController();
        $params = $_GET;
        $orderController->index($params);
        break;
    case 'edit-order':
        $orderController = new OrderController();
        $data = $_POST;
        $orderController->updateOrder($data);
        break;
    case 'analysis':
        $analysisController = new AnalysisController();
        $analysisController->index();
        break;
    case 'sign-out':
        $authController = new AuthController();
        $authController->SignOut();
        break;
    default:
        echo '404 Not Found';
}
