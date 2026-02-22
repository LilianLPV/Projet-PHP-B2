<?php require_once __DIR__ . '/../layouts/header.php'; ?>

<link rel="stylesheet" href="../public/css/profile.css">
<body>
    <div class="container-profile">

        <form class="profile-form" action="index.php?action=update_profile" method="POST">
            <h2>Mon Profil</h2>

            <div class="form-group">
                <label>Nouveau pseudo :</label>
                <input type="text" name="username" value="<?= htmlspecialchars($_SESSION['username']) ?>" required>
            </div>

            <div class="form-group">
                <label>Nouveau mot de passe (laisser vide pour ne pas changer) :</label>
                <input type="password" name="password" placeholder="Nouveau mot de passe...">
            </div>

            <div class="form-group">
                <input type="submit" class="btn-save" value="Enregistrer les modifications">
            </div>
        </form>

        <div class="danger-zone">
            <h3>Zone de danger</h3>
            <a href="index.php?action=delete_account"
               class="btn-delete"
               onclick="return confirm('Êtes-vous sûr de vouloir supprimer définitivement votre compte ? Cette action est irréversible.');">
                Supprimer mon compte
            </a>
        </div>

    </div>

</body>