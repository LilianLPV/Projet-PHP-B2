<?php
class Film {
        private $pdo;

        public function __construct() {
            require __DIR__ . "/database.php";
            $this->pdo = $pdo;
        }

        public function getOneFilm() {
            $sql = "SELECT * FROM Film ORDER BY id_film DESC LIMIT 1";
            $stmt = $this->pdo->query($sql);
            return $stmt->fetch(PDO::FETCH_ASSOC);
        }
        public function getAll(){
            $sql = "SELECT * FROM Film ORDER BY id_film DESC";
            $stmt = $this->pdo->query($sql);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
}