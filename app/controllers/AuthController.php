<?php
require_once __DIR__ . '/../models/User.php';

class AuthController {

    public function register() {
        require_once __DIR__ . '/../views/auth/register.php';
    }

    public function login() {
        require_once __DIR__ . '/../views/auth/login.php';
    }


    public function register_submit() {
        $username = $_POST["username"];
        $password = $_POST["password"];
        $repeat_password = $_POST["repeat_password"];

        if ($password !== $repeat_password) {
            echo "Les mots de passe ne correspondent pas !";
            return false;
        }

        $userModel = new User();

        if ($userModel->findByFullName($username)) {
            echo "Ce nom d'utilisateur est déjà pris.";
            return false;
        }

        $passwordHash = password_hash($password, PASSWORD_DEFAULT);

        if ($userModel->register($username, $passwordHash)) {
            header('Location: index.php?action=login');
            exit();
        } else {
            echo "Erreur lors de l'inscription.";
        }
    }

    public function login_submit() {
        $username = $_POST["username"];
        $password = $_POST["password"];

        $userModel = new User();

         $user = $userModel->findByFullName($username);

         if ($user && password_verify($password, $user['password'])) {

             $_SESSION['id_user'] = $user['id_user'];
            $_SESSION['username'] = $user['username'];

             header('Location: index.php?action=home');
            exit();
        } else {
            echo "Nom d'utilisateur ou mot de passe incorrect !";
        }
    }

    public function logout() {
        session_destroy();
        header('Location: index.php?action=home');
        exit();
    }
}
?>