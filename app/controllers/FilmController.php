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
        if ($film) {
            require_once __DIR__ . '/../views/films/show.php';
        } else {
            header('Location: index.php');
        }
    }
}
