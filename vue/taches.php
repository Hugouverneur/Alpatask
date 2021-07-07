<?php 
    $groupid = $_GET['group_id'];
    $userid = $_SESSION['user_id'];

    if($groupid != "") {
        $link = "&user_id=$userid&group_id=$groupid";
        $title = "Taches de groupe";
    } else {
        $link = "&user_id=$userid";
        $title = "Mes Taches";
    }

    function taskStatus($status) {
        switch($status) {
            case 0:
                return "En cours...";
            case 1:
                return "Terminée !" ;
        }
    }
?>
<h1><?=$title?></h1>
<a href="index.php?page=create_task<?=$link?>">Créer une tâche</a>

<table>
    <thead>
        <tr>
            <th colspan="1" style="border: 1px solid; border-color: black">Description</th>
            <th colspan="1" style="border: 1px solid; border-color: black">Difficulté</th>
            <th colspan="1" style="border: 1px solid; border-color: black">Importance</th>
            <th colspan="1" style="border: 1px solid; border-color: black">Status</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($tasklist as $task): ?>
            <tr>
                <td style="border: 1px solid; border-color: black"><?= $task['task_description']?></td>
                <td style="border: 1px solid; border-color: black"><?= $task['task_difficulty']?></td>
                <td style="border: 1px solid; border-color: black"><?= $task['task_severity']?></td>
                <td style="border: 1px solid; border-color: black"><?= taskStatus($task['task_status'])?></td>
                <td style="border: 1px solid; border-color: black"><a href="">Modifier</a></td>
                <td style="border: 1px solid; border-color: black"><a href="">Finir</a></td>
            </tr>
        <?php endforeach ?> 
    </tbody>
</table>