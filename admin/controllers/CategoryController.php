<?php
require_once 'models/CategoryModel.php';

class CategoryController
{
    public function index()
    {
        $categoryModel = new CategoryModel();

        $categories = $categoryModel->getAll();

        include_once('views/categories.php');
    }

    public function addCategory($data)
    {
        $categoryModel = new CategoryModel();

        $categoryModel->addCategory($data);

        header('Location: index.php?pg=categories');
    }

    public function updateCategory($data)
    {
        $categoryModel = new CategoryModel();

        $categoryModel->updateCategory($data);

        header('Location: index.php?pg=categories');
    }

    public function deleteCategory($id)
    {
        $categoryModel = new CategoryModel();

        $categoryModel->deleteCategory($id);

        header('Location: index.php?pg=categories');
    }
}
