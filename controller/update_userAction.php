<?php

// Récupération des données pour préremplir les champs
$users = new Users();
$user_data = $users->getUserData($_GET['user_id']);

if(isset($_POST['user_name'])) {
    $users = new Users();

    $users->initFormPost();
    $users->updateUser($_GET['user_id']);

    ?><script>
        alert('Utilisateur modifié !')
        window.location = "index.php?page=profile&user_id=<?= $_GET['user_id'] ?>";
    </script><?php

}

include './layouts/header.php';
include './layouts/structure.php';

?>