<?php

require_once __DIR__ . '/../models/Film.php';

class FilmController {

    public function index() {
        $filmModel = new Film();
        $allFilms = $filmModel->getAll();

        $homeMovie = null;
        if (!empty($allFilms)) {
            $homeMovie = $allFilms[0];
        }

        require_once __DIR__ . '/../views/films/home.php';
    }

    public function show($id) {
        $filmModel = new Film();
        $film = $filmModel->getFilmById($id);

        $seances = $filmModel->getSeancesByFilm($id);

        if ($film) {
            require_once __DIR__ . '/../views/films/show.php';
        } else {
            echo "Film introuvable";
        }
    }
    public function choisir_place() {
        if (!isset($_SESSION['id_user'])) {
            header('Location: index.php?action=login');
            exit();
        }

        // 2. On récupère l'ID de la séance
        if (!isset($_GET['id_seance'])) {
            header('Location: index.php?action=home');
            exit();
        }

        $id_seance = $_GET['id_seance'];

        // NOUVEAU : On récupère les places déjà réservées depuis la BDD
        $filmModel = new Film();
        $reservedSeats = $filmModel->getReservedSeats($id_seance); // Ex: ['A3', 'A4']

        require_once __DIR__ . '/../views/reservations/seats.php';    }
    public function valider_reservation() {
        if (!isset($_SESSION['id_user'])) {
            header('Location: index.php?action=login');
            exit();
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id_seance = $_POST['id_seance'] ?? null;
            $places = $_POST['places'] ?? [];
            if ($id_seance && !empty($places)) {

                $filmModel = new Film();
                $success = $filmModel->reserverPlaces($_SESSION['id_user'], $id_seance, $places);

                if ($success) {
                    header('Location: index.php?action=mes_reservations&success=1');
                    exit();
                } else {
                    header("Location: index.php?action=choisir_place&id_seance=$id_seance&error=deja_pris");
                    exit();
                }

            } else {
                echo "<h2 style='color: white; text-align: center;'>Erreur : Vous n'avez sélectionné aucune place. <a href='index.php?action=choisir_place&id_seance=$id_seance' style='color:#e5a71a;'>Retour</a></h2>";
            }
        }
    }
}
