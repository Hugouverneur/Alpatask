<?php

$userid = $_SESSION['user_id'];
$groupid = $_GET['group_id'];

if($_SESSION['is_valid'] == TRUE) {
    $mytasks = new Tasks();

    if($groupid != "") {
        $tasklist = $mytasks->getGroupTasksListInProgress($groupid);
    } else {
        $tasklist = $mytasks->getUserTasksListInProgress($userid);
        $taskcompleted = $mytasks->getUserTasksListCompleted($userid);
    }

    if(isset($_POST['task_id'])) {
        $taskid = $_POST['task_id'];
        $mytasks->endTask($taskid);

        header("location:index.php?page=taches&user_id=$userid");
    }
    
    include './layouts/header.php';
    include './layouts/structure.php';
} else {
    include './layouts/404.php';
}

?>