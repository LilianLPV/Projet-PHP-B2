<link rel="stylesheet" href="../public/css/login.css">

<body>
<div class="container-login">
    <form class="login" action="index.php?action=login_submit" method="POST">
        <h2 style="color:white; text-align:center; margin-top:0;">Connexion</h2>

        <div class="form-group">
            <input type="text" name="username" placeholder="Nom d'utilisateur" required>
        </div>
        <div class="form-group">
            <input type="password" name="password" placeholder="Mot de passe" required>
        </div>
        <div class="form-group" style="color: white; text-align: left; margin-bottom: 15px;">
            <input type="checkbox" name="remember_me" id="remember_me">
            <label for="remember_me">Se souvenir de moi</label>
        </div>
        <div class="form-group">
            <input type="submit" value="Connexion" name="Submit">
        </div>
    </form>
</div>

</body>
