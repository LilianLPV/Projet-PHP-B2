<link rel="stylesheet" href="../public/css/register.css">
<body>

<div class="container-register">
    <form class="register" action="index.php?action=register_submit" method="POST">
        <h2 style="color:white; text-align:center; margin-top:0;">Inscription</h2>

        <div class="form-group">
            <input type="text" name="username" placeholder="Nom complet" required>
        </div>
        <div class="form-group">
            <input type="password" name="password" placeholder="Mot de passe" required>
        </div>

        <div class="form-group">
            <input type="password" name="repeat_password" placeholder="Répéter le mot de passe" required>
        </div>

        <div class="form-group">
            <input type="submit" value="S'inscrire" name="Submit">
        </div>
    </form>
</div>

</body>
