<?php
class Film
{
    private $pdo;

    public function __construct()
    {
        require __DIR__ . "/database.php";
        $this->pdo = $pdo;
    }

    public function getOneFilm()
    {
        $sql = "SELECT * FROM Film ORDER BY id_film DESC LIMIT 1";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    public function getAll()
    {
        $sql = "SELECT * FROM film";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getFilmById($id)
    {
        $sql = "SELECT * FROM film WHERE id_film = :id";

        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([':id' => $id]);

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}