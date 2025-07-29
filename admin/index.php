<?php
session_start();

if (!isset($_SESSION['user']) || $_SESSION['user']['role'] !== 'admin') {
    header('Location: ../index.php');
    exit;
}

$pg = $_GET['pg'] ?? 'dashboard';

switch ($pg) {
    case 'dashboard':
        include 'views/dashboard.php';
        break;
    case 'products':
        include 'views/products.php';
        break;
    default:
        echo '404 Not Found';
}
