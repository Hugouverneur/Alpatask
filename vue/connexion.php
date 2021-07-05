<main class="form_main">
    <div class="formulaires">
        <h1>Se Connecter</h1>
        <form id="form" action="index.php?page=connexion" method="POST">
            <p>E-mail : </p>
            <input type="email" name="login"><br>
            <p>Mot de pass : </p>
            <input type="password" name="password"><br>

            <button type="submit">Valider</button>

        </form>

        <p class="error_message"><?=$connexion->alert?></p>

    </div>
    
</main>