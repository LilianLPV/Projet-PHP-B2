<?php
// app/views/films/show.php
require_once __DIR__ . '/../layouts/header.php';
?>

    <style>
        .film-detail-container {
            background-color: black;
            max-width: 1000px;
            margin: 50px auto;
            display: flex;
            gap: 40px;
            color: white;
            padding: 20px;
        }
        .film-detail-img img {
            width: 300px;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0,0,0,0.5);
        }
        .film-infos h1 {
            font-size: 3rem;
            margin-bottom: 20px;
            color: #e5a71a;
        }
        .description {
            line-height: 1.6;
            margin-bottom: 30px;
            color: #ccc;
        }
        .btn-final {
            background-color: #e5a71a;
            color: black;
            padding: 15px 30px;
            text-decoration: none;
            font-weight: bold;
            border-radius: 50px;
            display: inline-block;
        }
        .btn-final:hover { background-color: white; }
    </style>

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

