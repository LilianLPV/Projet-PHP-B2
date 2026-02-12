<?php

require_once __DIR__ . '/../models/Film.php';

class FilmController {

    public function index() {

        $filmModel = new Film();
        $homeMovie = $filmModel->getOneFilm();
        $allFilms = $filmModel->getAll();

        require_once __DIR__ . '/../views/films/home.php';
    }
}