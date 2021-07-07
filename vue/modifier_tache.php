<?php

$taskid = $_GET['task_id'];

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
    <h1>Modifier les taches</h1>
    <form action="index.php?page=modifier_tache&group_id=<?=$groupid?>&task_id=<?=$taskid?>" method="POST">
        <input value="<?=$tacheinfo[0]['task_description']?>" disabled>
        <input type="text" name="description" value="<?=$tacheinfo[0]['task_description']?>">
        <input value="<?=difficulty($tacheinfo[0]['task_difficulty'])?>" disabled>
        <select name="difficulty" id="">
            <option value="1">Facile</option>
            <option value="2">Moyenne</option>
            <option value="3">Difficile</option>
        </select>
        <input value="<?=severity($tacheinfo[0]['task_severity'])?>" disabled>
        <select name="severity" id="">
            <option value="1">Normal</option>
            <option value="2">Important</option>
            <option value="3">Urgent</option>
        </select>
        <input type="hidden" name="modify" value="modify">
        <button type="submit">Valider</button>
    </form>
</main>