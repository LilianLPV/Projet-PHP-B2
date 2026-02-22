<?php
require_once __DIR__ . '/../models/Reservation.php';

class ReservationController {


    public function index() {
        if (!isset($_SESSION['id_user'])) {
            header('Location: index.php?action=login');
            exit();
        }

        $resModel = new Reservation();
        $reservations = $resModel->getUserReservations($_SESSION['id_user']);

        // ON CHANGE ICI : On met le nom EXACT de ton fichier
        require_once __DIR__ . '/../views/reservations/myreservation.php';
    }

    public function valider() {
        if (!isset($_SESSION['id_user'])) {
            header('Location: index.php?action=login');
            exit();
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id_seance = $_POST['id_seance'];
            $places = $_POST['places'] ?? [];

            if (!empty($places)) {
                $resModel = new Reservation();
                $success = $resModel->reserverPlaces($_SESSION['id_user'], $id_seance, $places);

                if ($success) {
                    header('Location: index.php?action=mes_reservations&success=1');
                } else {
                    header("Location: index.php?action=choisir_place&id_seance=$id_seance&error=deja_pris");
                }
                exit();
            }
        }
    }
}