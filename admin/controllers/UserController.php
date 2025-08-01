<?php
require_once 'models/UserModel.php';

class UserController
{
    public function index($params)
    {
        $userModel = new UserModel();

        $page = $params['page'] ?? 1;
        $full_name = $params['full_name'] ?? '';
        $userId = $params['userId'] ?? '';
        $category = $params['category'] ?? '';

        $users = $userModel->getUsers($page, 10, ['full_name' => $full_name, 'userId' => $userId]);
        $totalUsers = $userModel->getTotalUsers(['full_name' => $full_name, 'userId' => $userId]);

        include_once 'views/users.php';
    }

    public function addUser($newUser)
    {
        $userModel = new UserModel();

        $userModel->createUser($newUser['email'], $newUser['password'], $newUser['full_name'], $newUser['role']);

        header('Location: index.php?pg=users');
    }

    public function updateUser($data)
    {
        $userModel = new UserModel();

        if (isset($data['password']) && trim($data['password']) === '') {
            unset($data['password']);
        }

        $userModel->updateUser($data['id'], $data);

        header('Location: index.php?pg=users');
    }

    public function deleteUser($userId)
    {
        $userModel = new UserModel();

        $userModel->deleteUser($userId);

        header('Location: index.php?pg=users');
    }
}
