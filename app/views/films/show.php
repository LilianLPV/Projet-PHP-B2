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

            <div style="margin-top: 30px; background: rgba(255,255,255,0.05); padding: 20px; border-radius: 10px;">
                <h3 style="color: #e5a71a; margin-top: 0;">Séances disponibles :</h3>

                <div style="display: flex; gap: 15px; flex-wrap: wrap;">
                    <?php if (!empty($seances)): ?>
                        <?php foreach ($seances as $seance): ?>
                            <a href="index.php?action=choisir_place&id_seance=<?= $seance['id_seance'] ?>" class="btn-final" style="padding: 10px 20px; font-size: 0.9rem;">
                                <?= date('d/m/Y à H:i', strtotime($seance['horaires'])) ?>
                                <br>
                                <small style="font-weight: normal;"><?= htmlspecialchars($seance['cinema']) ?></small>
                            </a>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <p style="color: #ccc;">Aucune séance programmée pour le moment.</p>
                    <?php endif; ?>
                </div>
            </div>
        </div>

    </div>

