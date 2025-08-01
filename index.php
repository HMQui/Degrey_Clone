<?php
session_start();

if (isset($_SESSION['user']) || $_SESSION['user']['role'] == 'customer') {
    header('Location: frontend/index.php');
}
else {
    header('Location: admin/index.php');
}