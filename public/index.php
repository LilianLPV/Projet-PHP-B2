<?php


require_once __DIR__ . '/../app/models/database.php';
require_once __DIR__ . '/../app/models/Film.php';
require_once __DIR__ . '/../app/controllers/FilmController.php';


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


    default:
        $controller->index();
        break;
}