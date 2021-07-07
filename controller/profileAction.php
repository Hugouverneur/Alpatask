<?php

$users = new Users();
$user_data = $users->getUserData($_GET['user_id']);

include './layouts/header.php';
include './layouts/structure.php';

?>