<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/header.css">
    <script src="/Projet-PHP-B2/public/js/menuburger.js" defer></script>
    <title>CinéMax - Accueil</title>
</head>
<body>
<header class="main-header" id="header">
    <nav class="header-nav">
        <div class="nav-left">
            <div class="logos-container">
                <a href="/Projet-PHP-B2/public">
                    <img src="assets/logosite.png" class="filmlogo" alt="logo site web cinéma">
                </a>
            </div>
            <div class="film-link">
                <a href="/film">Film</a>
            </div>
        </div>

        <div class="profile-container">
            <button class="burger-toggle" aria-label="Ouvrir le menu" id="burgerBtn">
                <img src="assets/logoconnexion.png" class="photodeprofil" alt="Lien connexion">
            </button>

            <nav class="nav-menu" id="navMenu">
                <ul>
                    <li class="login-item">
                        <a href="/projet-php-b2/views/auth/login.php">Me connecter</a>
                    </li>
                    <li><a href="/register">Créer mon compte</a></li>
                    <li><hr></li> <li><a href="/deconnexion">Déconnexion</a></li>
                </ul>
            </nav>
        </div>
    </nav>
</header>