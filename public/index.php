<?php

session_start();
require_once __DIR__ . '/../app/models/database.php';
require_once __DIR__ . '/../app/models/Film.php';
require_once __DIR__ . '/../app/controllers/FilmController.php';
require_once __DIR__ . '/../app/controllers/AuthController.php';
require_once __DIR__ . '/../app/controllers/ReservationController.php';

if (!isset($_SESSION['id_user']) && isset($_COOKIE['remember_me'])) {
    $userModel = new User();
    $user = $userModel->findByRememberToken($_COOKIE['remember_me']);

    if ($user) {
        $_SESSION['id_user'] = $user['id_user'];
        $_SESSION['username'] = $user['username'];
    } else {
        setcookie('remember_me', '', time() - 3600, "/");
    }
}

$action = $_GET['action'] ?? 'home';
$controller = new FilmController();

switch ($action) {
    case 'home':
        $controller->index();
        break;

    case 'show':
        if (isset($_GET['id'])) {
            $controller->show($_GET['id']);
        } else {
            $controller->index();
        }
        break;
    case 'register':
        $authController = new AuthController();
        $authController->register();
        break;
    case 'register_submit':
        $authController = new AuthController();
        $authController->register_submit();
        break;
     case 'login':
        $authController = new AuthController();
        $authController->login();
         break;
    case 'login_submit':
        $authController = new AuthController();
        $authController->login_submit();
        break;

    case 'logout':
        $authController = new AuthController();
        $authController->logout();
        break;
    case 'profile':
        $authController = new AuthController();
        $authController->profile();
        break;
    case 'update_profile':
        $authController = new AuthController();
        $authController->update_profile();
        break;
    case 'delete_account':
        $authController = new AuthController();
        $authController->delete_account();
        break;
    case 'choisir_place':
        $controller = new FilmController();
        $controller->choisir_place();
        break;
    case 'valider_reservation':
        $controller = new FilmController();
        $controller->valider_reservation();
        break;
    case 'mes_reservations':
        $controller = new ReservationController();
        $controller->index();
        break;

    case 'valider_reservation':
        $controller = new ReservationController();
        $controller->valider();
        break;

    default:
        $controller->index();
        break;
}