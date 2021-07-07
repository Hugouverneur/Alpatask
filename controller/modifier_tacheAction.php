<?php

$taskid = $_GET['task_id'];
$groupid = $_GET['group_id'];

if($_SESSION['is_valid'] == TRUE) {
    $mytasks = new Tasks();
    if(isset($_POST['modify'])){
        $mytasks->initTaskModification();
        $mytasks->modifyTask($taskid);

        if($groupid != ""){
            header("location:?page=detail_group&group_id=$groupid");
        } else {
            header("location:?page=taches");
        }
        
    } else {
        $tacheinfo = $mytasks->getTaskInfos($taskid);
    }
    
    include './layouts/header.php';
    include './layouts/structure.php';
}

?>