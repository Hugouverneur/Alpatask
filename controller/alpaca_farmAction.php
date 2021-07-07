<?php

$users_groups = new UsersGroups();
$user_data = $users_groups->getUserScore($_SESSION['user_id']);

$nbr_alpaga = floor(intval($user_data['total_score'])/10); // 1 alpaga pour 10 taches

include './layouts/header.php';
include './layouts/structure.php';

?>