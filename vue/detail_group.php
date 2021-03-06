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
    <h1>Groupe <?= $group_data[0]['group_name'] ?></h1>
    <p>De <?= $group_owner['user_name'] ?> <?= $group_owner['user_lastname'] ?></p>

    <div style="display:flex; flex-direction:column;">
        <?= ($_SESSION['user_id'] === $group_owner['user_id'])? 
            '<a href="index.php?page=manage_group&group_id='. $_GET['group_id'] .'">Gérer le groupe</a>'
        : '' ?>
    
        <a href="index.php?page=create_task&group_id=<?= $_GET['group_id'] ?>">Ajouter un tâche</a>
    </div>

    <div class="content_bloc">
    <?php if(empty($tasklist)): ?>
        <h2>Pas de taches affectées à l'équipe</h2>
    <?php else: ?>
        <h4>Tâches en cours</h4>
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
                        <td><a href="index.php?page=modifier_tache&group_id=<?=$groupid?>&task_id=<?=$task['task_id']?>">Modifier</a></td>
                        <td>
                            <form action="index.php?page=detail_group&group_id=<?=$groupid?>" method="POST">
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

    <div class="conten_bloc">
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

    <div class="content_bloc">
        <?php if($groupid != ""): ?>
        <h4>Classement du groupe</h2>
        <table id="table_podium">
            <thead>
                <tr>
                    <th colspan="1">Nom</th>
                    <th colspan="1">Prénom</th>
                    <th colspan="1">Role</th>
                    <th colspan="1">Score</th>
                </tr>
            </thead>
            <tbody>
                <?php $count = 0; foreach($classement as $position): $count += 1?>
                        <td class="a<?=$count?>"><?= $position['user_name']?></td>
                        <td class="a<?=$count?>"><?= $position['user_lastname']?></td>
                        <td class="a<?=$count?>"><?= $position['group_user_score']?></td>
                        <td class="a<?=$count?>"><?= $position['user_role_description']?></td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
        <?php endif ?>
    </div>
</main>