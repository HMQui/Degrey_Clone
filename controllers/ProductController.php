<?php
class ProductController
{
    public function list($params = [])
    {
         include 'views/productsDiscovery.php';
    }

    public function detail($id)
    {
        include 'views/productDetail.php';   
    }
}
