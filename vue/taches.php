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
                return "Terminée" ;
        }
    }

    function difficulty($status) {
        switch($status) {
            case 1:
                return "Facile";
            case 2:
                return "Moyenne" ;
            case 3:
                return "Difficile";
        }
    }
    
    function severity($status) {
        switch($status) {
            case 1:
                return "Normale";
            case 2:
                return "Important" ;
            case 3:
                return "Urgent";
        }
    }
?>

<main>


    <h1><?=$title?></h1>
    <a href="index.php?page=create_task<?=$link?>">Créer une tâche</a>
    <div class="content_bloc">
        <?php if(empty($tasklist)): ?>
            <h2>Aucune tâches en cours</h2>
            <?php else: ?>
            <h4>Taches en cours</h4>
            <table>
                <thead>
                    <tr>
                        <th colspan="1">Description</th>
                        <th colspan="1">Difficulté</th>
                        <th colspan="1">Importance</th>
                        <th colspan="1">Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($tasklist as $task): ?>
                        <tr>
                            <td><?= $task['task_description']?></td>
                            <td><?= difficulty($task['task_difficulty'])?></td>
                            <td><?= severity($task['task_severity'])?></td>
                            <td><?= taskStatus($task['task_status'])?></td>
                            <td><a href="index.php?page=modifier_tache&user_id=<?=$userid?>&task_id=<?=$task['task_id']?>">Modifier</a></td>
                            <td>
                                <form action="index.php?page=taches&user_id=<?=$userid?>" method="POST">
                                    <input type="hidden" name="task_id" value="<?=$task['task_id']?>">
                                    <button type="submit">Terminer</button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach ?> 
                </tbody>
            </table>
        <?php endif ?>
    </div>
    
    <div class="content_bloc" id="accordion">
        <?php if(empty($taskcompleted)): ?>
            <h2>Aucune tâches terminées</h2>
            <?php else: ?>
            <h4>Taches terminées</h4>
            <table>
                <thead>
                    <tr>
                        <th colspan="1">Description</th>
                        <th colspan="1">Difficulté</th>
                        <th colspan="1">Importance</th>
                        <th colspan="1">Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($taskcompleted as $task): ?>
                        <tr>
                            <td><?= $task['task_description']?></td>
                            <td><?= difficulty($task['task_difficulty'])?></td>
                            <td><?= severity($task['task_severity'])?></td>
                            <td><?= taskStatus($task['task_status'])?></td>
                        </tr>
                    <?php endforeach ?> 
                </tbody>
            </table>
        <?php endif ?>
    </div>
</main>