<?php
// app/models/database.php

// 1. On cherche le chemin absolu du .env
$envPath = realpath(__DIR__ . '/../../.env');

if (!$envPath || !file_exists($envPath)) {
    die("❌ ERREUR : Le fichier .env est introuvable ! PHP a cherché ici : " . __DIR__ . '/../../.env');
}

$env = parse_ini_file($envPath);

if (!$env) {
    die("❌ ERREUR : Le fichier .env existe mais il est vide ou mal formaté.");
}

try {
    // On utilise les variables du .env
    $dsn = "mysql:host=" . ($env['DB_HOST'] ?? 'localhost') . ";dbname=" . ($env['DB_NAME'] ?? '') . ";charset=utf8;port=" . ($env['DB_PORT'] ?? '3306');
    $pdo = new PDO($dsn, $env['DB_USER'] ?? 'root', $env['DB_PASSWORD'] ?? '');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Si on arrive ici, c'est que ça marche !
} catch (Exception $e) {
    // Si l'erreur [2054] persiste, on affiche ce message spécial
    if (strpos($e->getMessage(), '2054') !== false) {
        echo "<h3>⚠️ Erreur de Connexion persistante (Plugin Auth)</h3>";
        echo "Ta base de données refuse la connexion sécurisée. <br>";
        echo "<strong>Solution :</strong> Retourne dans phpMyAdmin et exécute : <br>";
        echo "<code>ALTER USER '" . ($env['DB_USER'] ?? 'root') . "'@'localhost' IDENTIFIED BY '" . ($env['DB_PASSWORD'] ?? '') . "';</code>";
    }
    die("<br><br>Erreur détaillée : " . $e->getMessage());
}