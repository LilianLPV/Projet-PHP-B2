<?php
require_once __DIR__ . '/../layouts/header.php';
?>

<link rel="stylesheet" href="../public/css/home.css">
<body>
<?php if ($homeMovie): ?>
<section class="new-films">

    <div class="new-content"
         style="background: linear-gradient(to bottom, #151515 0%, transparent 20%, transparent 80%, #151515 100%),
                 url('assets/<?= htmlspecialchars($homeMovie['affiche']) ?>') center/cover no-repeat;">        <div class="groupe">
        <h1 class="title-new"><?=htmlspecialchars($homeMovie['name'])?></h1>

        <a href="film.php?id=<?=$homeMovie['id_film']?>" class="btn-new"><img class="btn-reserver" src="assets/ticket-reservation.png" alt="ticket de réservation"> Réserver maintenant !</a>
        </div>
 </div>
</section>
<?php endif; ?>


<section class="container-films">
    <h2 class="title-info">À l'affiche aussi !</h2>
    <div class="grid">
        <?php foreach ($allFilms as $film): ?>

            <?php if ($homeMovie && $film['id_film'] == $homeMovie['id_film']) { continue; } ?>

            <article class="card">
                <a href="film.php?id=<?= $film['id_film'] ?>">
                    <div class="card-img">
                        <img src="assets/<?= htmlspecialchars($film['affiche']) ?>" alt="<?= htmlspecialchars($film['name']) ?>">
                    </div>
                    <div class="card-body">
                        <h3><?= htmlspecialchars($film['name']) ?></h3>
                        <span class="btn-reserver-small"><img class="btn-reserver" src="assets/ticket-reservation.png" alt="ticket de réservation">Réserver !</span>
                    </div>
                </a>
            </article>

        <?php endforeach; ?>
    </div>
</section>
</body>