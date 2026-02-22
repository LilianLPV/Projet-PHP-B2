<?php

require_once __DIR__ . '/database.php';
class User {
    private $pdo;

    public function __construct() {
        $database = new Database();
        $this->pdo = $database->getConnection();
    }

    public function register($username, $password) {
        $sql = "INSERT INTO user (username, password) VALUES (:username, :password)";
        $stmt = $this->pdo->prepare($sql);

        return $stmt->execute([
            ':username' => $username,
            ':password' => $password
        ]);
    }

     public function findByFullName($username) {
        $sql = "SELECT * FROM user WHERE username = :username";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([':username' => $username]);

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
?>