<main>
    <h1>Groupe <?= $group_data[0]['group_name'] ?></h1>
    <p>De <?= $group_owner['user_name'] ?> <?= $group_owner['user_lastname'] ?></p>

    <?= ($_SESSION['user_id'] === $group_owner['user_id'])? 
        '<a href="index.php?page=manage_group&group_id='. $_GET['group_id'] .'">Gérer le groupe</a>'
    : '' ?>

    <a href="index.php?page=create_task&group_id=<?= $_GET['group_id'] ?>">Ajouter un tâche</a>
</main>