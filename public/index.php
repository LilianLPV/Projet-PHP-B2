<?php require "../app/views/layouts/header.php"; ?>

<?php

require_once("../app/models/database.php");

$sql = "SELECT * FROM Film";
$query = $pdo->query($sql);

$films = $query->fetchAll();

foreach ($films as $film) {
    echo "Film : " . $film['name'] . "<br>";
}

?>