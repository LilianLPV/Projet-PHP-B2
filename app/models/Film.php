<?php

// 1. On utilise require_once TOUT EN HAUT (ça règle ton erreur de page cassée)
require_once __DIR__ . '/database.php';

class Film {
    private $pdo;

    public function __construct() {
        // 2. On instancie la nouvelle classe Database (comme on a fait pour User)
        $database = new Database();
        $this->pdo = $database->getConnection();
    }

    public function getOneFilm() {
        $sql = "SELECT * FROM film ORDER BY id_film DESC LIMIT 1";
        $stmt = $this->pdo->query($sql);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function getAll(){
        $sql = "SELECT * FROM film";
        $stmt = $this->pdo->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getFilmById($id) {
        $sql = "SELECT * FROM film WHERE id_film = :id";

        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([':id' => $id]);

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
?>