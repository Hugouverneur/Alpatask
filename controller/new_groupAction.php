<?php

if(isset($_POST['group_name'])) {
    $groups = new Groups();
    $_POST['company_id'] = $_SESSION['company_id'];
    $groups->initFormPost();
    $added_group_id = $groups->addNewGroup();
    
    $user_groups = new UsersGroups();
    $user_groups->addNewUserGroup(TRUE, $added_group_id, $_SESSION['user_id']);

    ?><script>
        alert('Groupe créé !')
        window.location = "index.php?page=my_groups&user_id=<?= $_GET['user_id'] ?>";
    </script><?php
}

include './layouts/header.php';
include './layouts/structure.php';

?>