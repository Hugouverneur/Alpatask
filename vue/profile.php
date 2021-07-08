<main>
    <h1>Mon profile</h1>
    <p><?= $user_data['user_name'] ?> <?= $user_data['user_lastname'] ?></p>
    <p><?= $user_data['user_email'] ?></p>
    <p><?= $user_data['user_role_description'] ?></p>
    <p><?= $user_data['user_score'] ?></p>

    <a href="index.php?page=update_user&user_id=<?= $_GET['user_id'] ?>">Modifier</a>



</main>