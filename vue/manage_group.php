<main>
    <h1>Gestion du groupe <?= $group_data[0]['group_name'] ?></h1>

    <section>
        <h2>Ajouter des utilisateurs :</h2>
        <form action="" method="post">
            <select name="user_id">
                <?php foreach($company_users as $company_user): ?>
                    <option value="<?= $company_user['user_id'] ?>"><?= $company_user['user_name'] ?> <?= $company_user['user_lastname'] ?></option>
                <?php endforeach; ?>
            </select>
            <input type="text" name="add_user" value="add" readonly hidden required>
            
            <button type="submit">Valider</button>
        </form>
    </section>

    <section>
        <h2>Liste des utilisateurs du groupe :</h2>
        <?php foreach($group_data as $group_data_result): ?>
            <div>
                <p><?= $group_data_result['user_name'] ?> <?= $group_data_result['user_lastname'] ?></p>
                <form action="" method="post">
                    <input type="text" name="user_id" value="<?= $group_data_result['user_id'] ?>" readonly hidden required>
                    <input type="text" name="delete_user" value="delete" readonly hidden required>
                    <button type="submit">Supprimer</button>
                </form>
            </div>
        <?php endforeach; ?>
    </section>

    <section>
        <h2>Modifier le groupe :</h2>

        <form action="" method="post">
            <input type="text" name="group_name" maxlength="50" value="<?= $group_data[0]['group_name'] ?>" placeholder="Nom du groupe">

            <button type="submit">Valider</button>
        </form>
    </section>
</main>