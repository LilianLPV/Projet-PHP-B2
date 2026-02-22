<?php require_once __DIR__ . '/../layouts/header.php'; ?>

<link rel="stylesheet" href="../public/css/myreservation.css">

    <div class="container-res">
        <h2 style="border-bottom: 2px solid #e5a71a; padding-bottom: 10px; margin-bottom: 40px; font-size: 2rem;">Mes Billets</h2>

        <?php if (empty($reservations)): ?>
            <p style="text-align: center; color: #888; margin-top: 100px; font-style: italic;">Aucune réservation pour le moment...</p>
        <?php else: ?>
            <?php foreach ($reservations as $res): ?>
                <div class="ticket">
                    <?php
                    $imageNom = $res['affiche'] ?? $res['image'] ?? 'default.jpg';
                    ?>
                    <img src="assets/<?= htmlspecialchars($imageNom) ?>" class="ticket-img" alt="Affiche du film">

                    <div class="ticket-info">
                        <h3><?= htmlspecialchars($res['name'] ?? 'Film Inconnu') ?></h3>

                        <div class="ticket-details">
                            <p><strong>🍿 Cinéma :</strong> <?= htmlspecialchars($res['cinema'] ?? 'Non précisé') ?></p>
                            <p><strong>💺 Siège :</strong> <span class="seat-badge"><?= htmlspecialchars($res['fk_seat']) ?></span></p>
                            <p><strong>📅 Date :</strong> <?= date('d/m/Y', strtotime($res['horaires'])) ?></p>
                            <p><strong>⏰ Heure :</strong> <?= date('H:i', strtotime($res['horaires'])) ?></p>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>

