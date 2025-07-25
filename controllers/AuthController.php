<?php
class AuthController
{
    public function Login()
    {
        include 'views/sign-in.php';
    }

    public function SignUp()
    {
        include 'views/sign-up.php';
    }

    public function ForgotPassword()
    {
        include 'views/forgot-password.php';
    }
}
