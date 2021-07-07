<?php

$users_groups = new UsersGroups();
$my_groups = $users_groups->getUserGroups($_SESSION['user_id']);


include './layouts/header.php';
include './layouts/structure.php';

?>