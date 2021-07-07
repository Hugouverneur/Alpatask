<?php

$groups = new Groups();
$group_data = $groups->getGroupData($_GET['group_id']);

$users = new Users();
$company_users = $users->getCompanyUsers($group_data[0]['company_id']);

$users_groups = new UsersGroups();

// Ajout d'un utilisateur dans le groupe
if(isset($_POST['user_id']) && $_POST['add_user']) {
    $users_groups->addNewUserGroup(0, $_GET['group_id'], $_POST['user_id']);

    ?><script>
        alert('Utilisateur ajouté au groupe.');
        window.location = "index.php?page=detail_group&group_id=<?= $_GET['group_id'] ?>";
    </script><?php
}

// Suppression d'un utilisateur du groupe
if(isset($_POST['user_id']) && isset($_POST['delete_user'])) {
    $users_groups->delUserFromGroup($_POST['user_id']);

    ?><script>
        alert('Utilisateur supprimé du groupe.');
        window.location = "index.php?page=detail_group&group_id=<?= $_GET['group_id'] ?>";
    </script><?php
}

// Modification des données du groupe
if(isset($_POST['group_name'])) {
    $groups->initFormPost();
    $groups->updateGroup($_GET['group_id']);

    ?><script>
        alert('Groupe modifié.');
        window.location = "index.php?page=detail_group&group_id=<?= $_GET['group_id'] ?>";
    </script><?php
}


include './layouts/header.php';
include './layouts/structure.php';

?>