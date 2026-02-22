<?php

require_once __DIR__ . '/database.php';

class Film {
    private $pdo;

    public function __construct() {
        $database = new Database();
        $this->pdo = $database->getConnection();
    }

    public function getOneFilm() {
        $sql = "SELECT * FROM film ORDER BY id_film DESC LIMIT 1";
        $stmt = $this->pdo->query($sql);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    public function getSeancesByFilm($id_film) {
        $sql = "SELECT * FROM seance WHERE fk_film = :id_film ORDER BY horaires ASC";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([':id_film' => $id_film]);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
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
    public function reserverPlaces($id_user, $id_seance, $places) {
        $sql = "INSERT INTO reservation (fk_user, fk_seance, fk_seat, price) VALUES (:id_user, :id_seance, :fk_seat, :price)";
        $stmt = $this->pdo->prepare($sql);
        $prix_place = 12.50;

        // On tente d'enregistrer les places...
        try {
            foreach ($places as $place) {
                $stmt->execute([
                    ':id_user' => $id_user,
                    ':id_seance' => $id_seance,
                    ':fk_seat' => $place,
                    ':price' => $prix_place
                ]);
            }
            return true;

        } catch (PDOException $e) {
            if ($e->getCode() == 23000) {
                return false;
            }
            throw $e;
        }
    }
    public function getReservedSeats($id_seance) {
        $sql = "SELECT fk_seat FROM reservation WHERE fk_seance = :id_seance";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([':id_seance' => $id_seance]);

        return $stmt->fetchAll(PDO::FETCH_COLUMN);
    }
}
?>