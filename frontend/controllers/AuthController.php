<?php
require_once 'models/UserModel.php';
class AuthController
{
    public function Login()
    {
        if (isset($_SESSION['user'])) {
            header('Location: ../index.php?pg=home');
        }
        $helpText = '';
        if (isset($_SESSION['helpText'])) {
            $helpText = $_SESSION['helpText'];
            unset($_SESSION['helpText']);
        }

        include 'views/sign-in.php';
    }

    public function SignUp()
    {
        if (isset($_SESSION['user'])) {
            header('Location: ../index.php?pg=home');
        }
        include 'views/sign-up.php';
    }

    public function ForgotPassword()
    {
        if (isset($_SESSION['user'])) {
            header('Location: index.php?pg=home');
        }
        include 'views/forgot-password.php';
    }

    public function LoginSubmit($data)
    {
        $userModel = new UserModel();

        $isUser = $userModel->authenticate($data['email'], $data['password']);

        if ($isUser) {
            $_SESSION['user'] = $userModel->getUserByEmail($data['email']);

            if ($_SESSION['user']['role'] == 'customer') {
                header('Location: index.php?pg=home');
            } else {
                header('Location: ../admin/index.php?pg=products');
            }
            exit;
        }

        $_SESSION['helpText'] = 'Email hoặc mật khẩu không đúng!';
        header('Location: index.php?pg=sign-in');
        exit;
    }

    public function SignUpSubmit($data)
    {
        $userModel = new UserModel();
        $userModel->createUser($data['email'], $data['password'], $data['full_name']);
        header('Location: index.php?pg=sign-in');
    }

    public function SignOut()
    {
        if (isset($_SESSION['user'])) {
            unset($_SESSION['user']);
        }

        header('Location: index.php?pg=home');
        exit;
    }
}
