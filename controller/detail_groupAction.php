<?php

$groups = new Groups();
$group_data = $groups->getGroupData($_GET['group_id']);
$group_owner = $groups->getGroupOwner($_GET['group_id']);


include './layouts/header.php';
include './layouts/structure.php';

?>