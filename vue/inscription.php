<main>
    <h1>Inscription</h1>

    <form action="" method="POST">
        <label for="user_name">
            *Prénom :
            <input type="text" name="user_name" maxlength="75" required>
        </label>

        <label for="user_lastname">
            *Nom :
            <input type="text" name="user_lastname" maxlength="75" required>
        </label>

        <label for="user_role_description" maxlength="50">
            Rôle :
            <input type="text" name="user_role_description">
        </label>

        <label for="company_name" maxlength="100">
            *Société :
            <input type="text" name="company_name" required>
        </label>

        <label for="user_email" maxlength="170">
            *E-mail :
            <input type="text" name="user_email" required>
        </label>

        <label for="user_password" maxlength="20">
            *Mot-de-passe :
            <input type="password" name="user_password" required>
        </label>

        <button type="submit">Valider</button>
    </form>

</main>