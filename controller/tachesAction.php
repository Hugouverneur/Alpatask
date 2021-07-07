<?php

$userid = $_SESSION['user_id'];
$groupid = $_GET['group_id'];

if($_SESSION['is_valid'] == TRUE) {
    $mytasks = new Tasks();

    if($groupid != "") {
        $tasklist = $mytasks->getGroupTasksList($groupid);
    } else {
        $tasklist = $mytasks->getUserTasksList($userid);
    }
    
    include './layouts/header.php';
    include './layouts/structure.php';
} else {
    include './layouts/404.php';
}

?>