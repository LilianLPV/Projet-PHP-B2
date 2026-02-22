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

            if (isset($_POST['remember_me'])) {
                $token = bin2hex(random_bytes(32));

                $userModel->updateRememberToken($user['id_user'], $token);

                setcookie('remember_me', $token, time() + (86400 * 30), "/");
            }

            header('Location: index.php?action=home');
            exit();
        } else {
            echo "Nom d'utilisateur ou mot de passe incorrect !";
        }
    }

        public function logout() {
            session_destroy();

            if (isset($_COOKIE['remember_me'])) {
                setcookie('remember_me', '', time() - 3600, "/");
            }

            header('Location: index.php?action=home');
            exit();
        }
    public function profile() {
        if (!isset($_SESSION['id_user'])) {
            header('Location: index.php?action=login');
            exit();
        }
        require_once __DIR__ . '/../views/auth/profile.php';
    }

    public function update_profile() {
        if (!isset($_SESSION['id_user'])) return;

        $new_username = $_POST['username'];
        $new_password = $_POST['password'];
        $userModel = new User();

        $existingUser = $userModel->findByFullName($new_username);
        if ($existingUser && $existingUser['id_user'] != $_SESSION['id_user']) {
            echo "Ce pseudo est déjà pris par un autre utilisateur.";
            return;
        }

        $passwordHash = !empty($new_password) ? password_hash($new_password, PASSWORD_DEFAULT) : null;

        // On met à jour la base de données
        if ($userModel->updateProfile($_SESSION['id_user'], $new_username, $passwordHash)) {
            $_SESSION['username'] = $new_username;
            header('Location: index.php?action=profile');
            exit();
        } else {
            echo "Erreur lors de la modification.";
        }
    }

    public function delete_account() {
        if (!isset($_SESSION['id_user'])) return;

        $userModel = new User();

        $userModel->deleteAccount($_SESSION['id_user']);

        session_destroy();
        if (isset($_COOKIE['remember_me'])) {
            setcookie('remember_me', '', time() - 3600, "/");
        }

        header('Location: index.php?action=home');
        exit();
    }
}
?>