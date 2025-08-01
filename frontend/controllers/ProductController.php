<?php
require_once 'models/ProductModel.php';

class ProductController
{


    public function list($params = [])
    {
        $productModel = new ProductModel();

        $page = isset($params['page']) ? (int)$params['page'] : 1;
        unset($params['page']);
        unset($params['pg']);

        $limit = 20 * $page;
        $offset = ($page - 1) * $limit;

        $products = $productModel->getProductsByFilter($params, $limit);
        $totalProducts = $productModel->countProductsByFilter($params);

        $totalPages = ceil($totalProducts / $limit);
        $hasMore = $page < $totalPages;

        include 'views/productsDiscovery.php';
    }

    public function detail($id)
    {
        $productModel = new ProductModel();

        $product = $productModel->getProductById($id);
        $quantiyFollowSize = $productModel->getQuantityFollowSize($id);

        $relativeProducts = $productModel->getProductsByFilter(['category' => $product['category']], 6);
        include 'views/productDetail.php';
    }

    public function search($keyword)
    {
        $productModel = new ProductModel();

        $products = $productModel->searchByKeyword($keyword);

        if (empty($products)) {
            echo '<p class="text-gray-500 mt-4">Không tìm thấy sản phẩm nào phù hợp.</p>';
            return;
        }

        foreach ($products as $product) {
            $images = explode(',', $product['images']);
            $image1 = $images[0] ?? 'default.jpg';

            echo '
        <a href="index.php?pg=products&id=' . $product['id'] . '" class="flex justify-between items-center py-4 border-b border-dashed hover:bg-gray-50 transition-all">
            <div class="flex-1 pr-4">
                <p class="text-sm font-medium text-gray-800">' . htmlspecialchars($product['name']) . '</p>
                <p class="text-base font-bold text-black mt-1">' . number_format($product['price']) . 'đ</p>
            </div>
            <div class="w-20 h-20 flex-shrink-0">
                <img src="../public/assets/images/products/' . $image1 . '" alt="' . htmlspecialchars($product['name']) . '" class="w-full h-full object-contain" />
            </div>
        </a>';
        }
    }
}
