<?php
class AuthController {
    public function SignOut() {
        if (isset($_SESSION['user'])) {
            unset($_SESSION['user']);
        }

        header('Location: index.php?pg=home');
        exit;
    }
}