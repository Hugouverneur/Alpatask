<main class="form_main">
    <div class="formulaires">
        <h1>Se Connecter</h1>
        <form id="form" action="index.php?page=connexion" method="POST">
            <p>E-mail : </p>
            <input type="email" name="login" required>
            <p>*Mot de passe : </p>
            <input type="password" name="password" required>

            <button type="submit">Valider</button>

        </form>

        <p class="error_message"><?=$connexion->alert?></p>
        <a href="index.php?page=inscription">Pas de compte. Inscrivez-vous !</a>

    </div>
    
</main>