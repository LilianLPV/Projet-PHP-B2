<?php
require_once __DIR__ . '/database.php';

class Reservation {
    private $pdo;

    public function __construct() {
        $database = new Database();
        $this->pdo = $database->getConnection();
    }

    public function getUserReservations($id_user) {
        $sql = "SELECT r.*, s.*, f.* FROM reservation r
            JOIN seance s ON r.fk_seance = s.id_seance
            JOIN film f ON s.fk_film = f.id_film
            WHERE r.fk_user = :id_user
            ORDER BY s.horaires DESC";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([':id_user' => $id_user]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function reserverPlaces($id_user, $id_seance, $places) {
        $sql = "INSERT INTO reservation (fk_user, fk_seance, fk_seat, price) VALUES (:id_user, :id_seance, :fk_seat, :price)";
        $stmt = $this->pdo->prepare($sql);
        $prix_place = 12.50;

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
            if ($e->getCode() == 23000) return false;
            throw $e;
        }
    }
}