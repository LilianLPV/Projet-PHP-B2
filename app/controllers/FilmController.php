<?php

require_once __DIR__ . '/../models/Film.php';

// app/controllers/FilmController.php

class FilmController {

    // Affiche l'accueil
    public function index() {
        $filmModel = new Film();
        $allFilms = $filmModel->getAll(); // Ta méthode qui récupère tout

        $homeMovie = null;
        if (!empty($allFilms)) {
            $homeMovie = $allFilms[0]; // Ou une logique aléatoire
        }

        // On charge la vue en lui passant les variables
        require_once __DIR__ . '/../views/films/home.php';
    }

    // Affiche un seul film
    public function show($id) {
        $filmModel = new Film();
        $film = $filmModel->getFilmById($id); // La méthode qu'on a créée avant

        if ($film) {
            require_once __DIR__ . '/../views/films/show.php';
        } else {
            // Film introuvable -> retour accueil
            header('Location: index.php');
        }
    }
}
