<?php
session_start();
include_once 'controllers/HomeController.php';
include_once 'controllers/ProductController.php';
include_once 'controllers/StaticPageController.php';
include_once 'controllers/OrderController.php';
include_once 'controllers/CartController.php';
include_once 'controllers/AuthController.php';

$pg = $_GET['pg'] ?? 'home';

switch ($pg) {
    case 'home':
        $homeController = new HomeController();
        $homeController->index();
        break;

    case 'products':
        $productController = new ProductController();

        if (isset($_GET['id']) && is_numeric($_GET['id'])) {
            $productController->detail($_GET['id']);
        } else {
            $params = $_GET;
            unset($params['pg']);
            $productController->list($params);
        }
        break;
    case 'search-products':
        $keyword = $_GET['keyword'] ?? '';
        $controller = new ProductController();
        $controller->search($keyword);
        break;
    case 'stores':
        $staticPageController = new StaticPageController();
        $staticPageController->stores();
        break;
    case 'about-us':
        $staticPageController = new StaticPageController();
        $staticPageController->about();
        break;
    case 'check-orders':
        $orderController = new OrderController();
        $orderController->index();
        break;
    case 'create-order':
        $data = $_POST;
        $orderController = new OrderController();
        $orderController->createOrder($data);
        break;
    case 'cart':
        $cartController = new CartController();
        $cartController->index();
        break;
    case 'add-to-cart':
        $data = $_POST;
        $cartController = new CartController();
        $cartController->addToCart($data);
        break;
    case 'get-cart':
        $cartController = new CartController();
        $cartController->getCart();
        break;
    case 'update-cart-item':
        $data = $_POST;
        $cartController = new CartController();
        $cartController->updateCartItem($data);
        break;
    case 'delete-cart-item':
        $data = $_POST;
        $cartController = new CartController();
        $cartController->deleteCartItem($data);
        break;
    case 'sign-in':
        $authController = new AuthController();
        $authController->Login();
        break;
    case 'login-submit':
        $data = $_POST;
        $authController = new AuthController();
        $authController->LoginSubmit($data);
        break;
    case 'sign-up':
        $authController = new AuthController();
        $authController->SignUp();
        break;
    case 'sign-up-submit':
        $data = $_POST;
        $authController = new AuthController();
        $authController->SignUpSubmit($data);
        break;
    case 'sign-out':
        $authController = new AuthController();
        $authController->SignOut();
        break;
    case 'forgot-password':
        $authController = new AuthController();
        $authController->ForgotPassword();
        break;

    default:
        include 'views/page-not-found.php';
        break;
}
