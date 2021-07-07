<?php

$groupid = $_GET['group_id'];
$userid = $_SESSION['user_id'];

if($_SESSION['is_valid'] == TRUE) {
    if(isset($_POST['description'])) {
        $mytasks = new Tasks();
        $mytasks->initTaskCreation();
        $mytasks->createTask();

        if($groupid != "") {
            $link = "group_id=$groupid";
            header("location:?index&page=detail_group&$link");

        } else {
            $link = "user_id=$userid";
            header("location:?index&page=taches&$link");
        }

    }

    include './layouts/header.php';
    include './layouts/structure.php';
} else {
    include './layouts/404.php';
}

?>