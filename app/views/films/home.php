<?php
// On inclut ton header existant
require_once __DIR__ . '/../layouts/header.php';
?>
l
<link rel="stylesheet" href="../public/css/home.css">

<?php if ($heroMovie): // On vérifie qu'il y a bien un film ?>
    <section class="hero-section" style="background-image: linear-gradient(to bottom, rgba(0,0,0,0.3), #000), url('assets/<?= htmlspecialchars($heroMovie['affiche']) ?>');">
        <div class="hero-content">
            <span class="badge-nouveau">Nouveauté</span>
            <h1><?= htmlspecialchars($heroMovie['name']) ?></h1>
            <p class="hero-infos">Durée :1h30 min</p>
            <a href="film.php?id=<?= $heroMovie['id_film'] ?>" class="btn-hero">Réserver ma place</a>
        </div>
    </section>
<?php endif; ?>


<section class="container-films">
    <h2>À l'affiche aussi</h2>
    <div class="grid">
        <?php foreach ($allFilms as $film): ?>

            <?php if ($heroMovie && $film['id_film'] == $heroMovie['id_film']) { continue; } ?>

            <article class="card">
                <a href="film.php?id=<?= $film['id_film'] ?>">
                    <div class="card-img">
                        <img src="assets/<?= htmlspecialchars($film['affiche']) ?>" alt="<?= htmlspecialchars($film['name']) ?>">
                    </div>
                    <div class="card-body">
                        <h3><?= htmlspecialchars($film['name']) ?></h3>
                        <span class="btn-reserver-small">Voir</span>
                    </div>
                </a>
            </article>

        <?php endforeach; ?>
    </div>
</section>