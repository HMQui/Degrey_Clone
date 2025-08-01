<?php
require_once 'models/CategoryModel.php';
require_once 'models/ProductModel.php';

class ProductController
{
    public function index($params)
    {
        $categoryModel = new CategoryModel();
        $productModel = new ProductModel();

        $page = $params['page'] ?? 1;
        $name = $params['name'] ?? '';
        $gender = $params['gender'] ?? '';
        $category = $params['category'] ?? '';

        $categories = $categoryModel->getAll();
        $products = $productModel->getAllProducts(['name' => $name, 'gender' => $gender, 'category' => $category], $page, 10);
        $totalProducts = $productModel->countAllProducts(['name' => $name, 'gender' => $gender, 'category' => $category]);
        foreach ($products as &$product) {
            $product['variants'] = $productModel->getVariantsByProductId($product['id']);
        }
        unset($product);
        include_once 'views/products.php';
    }

    public function AddProduct($newProduct)
    {
        $productModel = new ProductModel();

        $uploadDir = __DIR__ . '/../../public/assets/images/products/';
        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0777, true);
        }

        $images = $_FILES['images'];

        if (!empty($images['name'][0]) && count($images['name']) === 2) {
            $uploadedNames = [];

            for ($i = 0; $i < 2; $i++) {
                $tmpName = $images['tmp_name'][$i];
                $originalName = basename($images['name'][$i]);
                $extension = pathinfo($originalName, PATHINFO_EXTENSION);
                $newFileName = uniqid('img_', true) . '.' . $extension;
                $destination = $uploadDir . $newFileName;

                if (move_uploaded_file($tmpName, $destination)) {
                    $uploadedNames[] = $newFileName;
                }
            }

            if (count($uploadedNames) === 2) {
                $newProduct['image1'] = $uploadedNames[0];
                $newProduct['image2'] = $uploadedNames[1];

                $newProduct['images'] = implode(',', $uploadedNames);

                $productId = $productModel->addProduct($newProduct);

                if ($productId) {
                    header('Location: index.php?pg=products');
                    exit;
                } else {
                    echo "Lỗi khi lưu sản phẩm vào cơ sở dữ liệu.";
                }
            } else {
                echo "Không thể tải lên cả hai hình ảnh.";
            }
        } else {
            echo "Vui lòng chọn đúng 2 hình ảnh.";
        }
    }

    public function EditProduct($data)
    {
        $productModel = new ProductModel();
        $uploadDir = __DIR__ . '/../../public/assets/images/products/';

        $images = $_FILES['images'] ?? null;
        $hasNewImages = $images && !empty($images['name'][0]) && count($images['name']) === 2;

        if ($hasNewImages) {
            $oldProduct = $productModel->getProductById($data['productId']);
            if ($oldProduct) {
                $oldImages = explode(',', $oldProduct['images']);

                foreach ($oldImages as $imgName) {
                    $oldImagePath = $uploadDir . $imgName;
                    if (file_exists($oldImagePath)) {
                        unlink($oldImagePath);
                    }
                }
            }

            $uploadedNames = [];
            for ($i = 0; $i < 2; $i++) {
                $tmpName = $images['tmp_name'][$i];
                $originalName = basename($images['name'][$i]);
                $extension = pathinfo($originalName, PATHINFO_EXTENSION);
                $newFileName = uniqid('img_', true) . '.' . $extension;
                $destination = $uploadDir . $newFileName;

                if (move_uploaded_file($tmpName, $destination)) {
                    $uploadedNames[] = $newFileName;
                }
            }

            if (count($uploadedNames) === 2) {
                $data['image1'] = $uploadedNames[0];
                $data['image2'] = $uploadedNames[1];
            } else {
                echo "Không thể tải lên cả hai hình ảnh mới.";
                return;
            }
        }

        $success = $productModel->updateProduct($data);
        if ($success) {
            header('Location: index.php?pg=products');
            exit;
        } else {
            echo "Lỗi khi cập nhật sản phẩm.";
        }
    }

    public function deleteProduct($productId)
    {
        $productModel = new ProductModel();
        $uploadDir = __DIR__ . '/../../public/assets/images/products/';

        $oldProduct = $productModel->getProductById($productId);
        if ($oldProduct) {
            $oldImages = explode(',', $oldProduct['images']);

            foreach ($oldImages as $imgName) {
                $imgName = trim($imgName);

                if (!empty($imgName)) {
                    $oldImagePath = $uploadDir . $imgName;
                    
                    if (file_exists($oldImagePath)) {
                        unlink($oldImagePath);
                    }
                }
            }

            $productModel->deleteProduct($productId);
        }

        header('Location: index.php?pg=products');
    }
}
