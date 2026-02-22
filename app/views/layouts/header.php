<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/header.css">
    <script src="/Projet-PHP-B2/public/js/menuburger.js" defer></script>
    <title>CinéMax</title>
</head>
<body>

<header class="main-header" id="header">
    <nav class="header-nav">
        <div class="nav-left">
            <div class="logos-container">
                <a href="index.php?action=home">
                    <img src="assets/logosite.png" class="filmlogo" alt="logo">
                </a>
            </div>
            <div class="film-link">
                <a href="index.php?action=home">Film</a>
            </div>
        </div>

        <div class="profile-container">
            <button class="burger-toggle" aria-label="Ouvrir le menu" id="burgerBtn">
                <img src="assets/logoconnexion.png" class="photodeprofil" alt="Lien connexion">
            </button>

            <nav class="nav-menu" id="navMenu">
                <ul>
                    <?php if (isset($_SESSION['id_user'])): ?>

                        <li class="login-item">
                            <a href="index.php?action=profile" style="color: white;">
                                Mon profil (<?= htmlspecialchars($_SESSION['username']) ?>)
                            </a>
                        </li>

                        <li><a href="index.php?action=mes_reservations">Mes réservations</a></li>
                        <li><hr></li>
                        <li><a href="index.php?action=logout">Déconnexion</a></li>

                    <?php else: ?>

                        <li class="login-item">
                            <a href="index.php?action=login">Me connecter</a>
                        </li>
                        <li><a href="index.php?action=register">Créer mon compte</a></li>

                    <?php endif; ?>
                </ul>
            </nav>
        </div>
    </nav>
</header>