<?php

session_start();
require_once __DIR__ . '/../app/models/database.php';
require_once __DIR__ . '/../app/models/Film.php';
require_once __DIR__ . '/../app/controllers/FilmController.php';
require_once __DIR__ . '/../app/controllers/AuthController.php';

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

    default:
        $controller->index();
        break;
}