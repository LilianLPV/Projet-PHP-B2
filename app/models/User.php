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

    public function updateRememberToken($id_user, $token) {
        $sql = "UPDATE user SET remember_token = :token WHERE id_user = :id_user";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([
            ':token' => $token,
            ':id_user' => $id_user
        ]);
    }

    public function findByRememberToken($token) {
        $sql = "SELECT * FROM user WHERE remember_token = :token";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([':token' => $token]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    public function updateProfile($id, $username, $passwordHash = null) {
        if ($passwordHash) {
            $sql = "UPDATE user SET username = :username, password = :password WHERE id_user = :id";
            $stmt = $this->pdo->prepare($sql);
            return $stmt->execute([
                ':username' => $username,
                ':password' => $passwordHash,
                ':id' => $id
            ]);
        } else {
            $sql = "UPDATE user SET username = :username WHERE id_user = :id";
            $stmt = $this->pdo->prepare($sql);
            return $stmt->execute([
                ':username' => $username,
                ':id' => $id
            ]);
        }
    }

    public function deleteAccount($id) {
        $sql = "DELETE FROM user WHERE id_user = :id";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([':id' => $id]);
    }
}
?>