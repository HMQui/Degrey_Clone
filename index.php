<?php
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
    case 'cart':
        $cartController = new CartController();
        $cartController->index();
        break;
    case 'sign-in':
        $authController = new AuthController();
        $authController->Login();
        break;
    case 'sign-up':
        $authController = new AuthController();
        $authController->SignUp();
        break;
    case 'forgot-password':
        $authController = new AuthController();
        $authController->ForgotPassword();
        break;

    default:
        include 'views/page-not-found.php';
        break;
}
