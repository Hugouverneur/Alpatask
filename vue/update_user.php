<main>
    <h1>Modifier utilisateur</h1>

    <form action="" method="POST">
        <label for="user_name">
            *Prénom :
            <input type="text" name="user_name" maxlength="75" value="<?= $user_data['user_name'] ?>" required>
        </label>

        <label for="user_lastname">
            *Nom :
            <input type="text" name="user_lastname" maxlength="75" value="<?= $user_data['user_lastname'] ?>" required>
        </label>

        <label for="user_role_description" maxlength="50">
            Rôle :
            <input type="text" name="user_role_description" value="<?= $user_data['user_role_description'] ?>">
        </label>

        <button type="submit">Valider</button>
    </form>

</main>