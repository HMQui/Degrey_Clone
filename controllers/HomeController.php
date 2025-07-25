<?php
require_once 'models/ProductModel.php';

class HomeController
{
    public function index()
    {
        $productModel = new ProductModel();

        $femaleProducts = $productModel->getProductsByFilter(['gender' => 'female'], 6);
        $maleProducts = $productModel->getProductsByFilter(['gender' => 'male'], 6);
        $backpackProducts = $productModel->getProductsByFilter(['category' => 'backpack'], 6);
        $handbagProducts = $productModel->getProductsByFilter(['category' => 'handbag'], 6);
        $capProducts = $productModel->getProductsByFilter(['category' => 'cap'], 6);
        $shoesSandalProducts = $productModel->getProductsByFilter(['category' => 'shoes_sandal'], 6);

        include 'views/home.php';
    }
}
