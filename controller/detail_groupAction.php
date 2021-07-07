<?php

$userid = $_SESSION['user_id'];
$groupid = $_GET['group_id'];

if($_SESSION['is_valid'] == TRUE) {
    $groups = new Groups();
    $group_data = $groups->getGroupData($_GET['group_id']);
    $group_owner = $groups->getGroupOwner($_GET['group_id']);

    $mytasks = new Tasks();
    $tasklist = $mytasks->getGroupTasksListInProgress($groupid);
    $taskcompleted = $mytasks->getGroupTasksListCompleted($groupid);

    $userclassement = new UsersGroups();
    $company = $_SESSION['company'];
    $userid = $_SESSION['user_id'];
    $groupid = $_GET['group_id'];

    $groups = $userclassement->getGroupMemberOf($userid);

    if($_GET['group_id'] != ""){
        $classement = $userclassement->getRankForGroup($groupid);
    }
    
    if(isset($_POST['task_id'])) {
        $taskid = $_POST['task_id'];
        $mytasks->endTask($taskid);

        $taskinfos = $mytasks->getTaskInfos($taskid);
        $taskpoint = $taskinfos[0]['task_difficulty'];
        $taskdifficulty = $taskinfos['task_difficulty'];

        $usersgroups = new UsersGroups();
        $getscoreinfo = $usersgroups->getScoreInfos($userid, $taskdifficulty, $groupid);
        $currentscore = $getscoreinfo['group_user_score'];
        $usersgroups->updateScoreInfos($userid, $currentscore, $taskpoint);
    }

    include './layouts/header.php';
    include './layouts/structure.php';
}

?>