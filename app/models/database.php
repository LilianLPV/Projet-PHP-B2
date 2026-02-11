<?php

$env = parse_ini_file(__DIR__ . '/../../.env');
try {
    $dsn = "mysql:host=" . $env['DB_HOST'] . ";port=" . $env['DB_PORT'] . ";dbname=" . $env['DB_NAME'] . ";charset=utf8mb4";

    $pdo = new PDO($dsn, $env['DB_USER'], $env['DB_PASSWORD']);

    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo "<h3>Erreur réelle :</h3>";
    die($e->getMessage());
}