<?php

require_once __DIR__ . '/../layouts/header.php';
?>

<link rel="stylesheet" href="../public/css/show.css">

    <div class="film-detail-container">

        <div class="film-detail-img">
            <img src="assets/<?= htmlspecialchars($film['affiche']) ?>" alt="<?= htmlspecialchars($film['name']) ?>">
        </div>

        <div class="film-infos">
            <h1><?= htmlspecialchars($film['name']) ?></h1>

            <p><strong>Acteurs :</strong> <?= htmlspecialchars($film['actors'])?></p>
            <p><strong>Date :</strong> <?= htmlspecialchars($film['date'])?></p>

            <p class="description">
                <?= htmlspecialchars($film['description']) ?>
            </p>

            <a href="index.php?action=reservation&id=<?= $film['id_film'] ?>" class="btn-final">
                Confirmer la réservation
            </a>
        </div>

    </div>

