<?php 
    $groupid = $_GET['groupid'];
    $userid = $_SESSION['user_id'];


    if($groupid != "") {
        $link = "&userid=$userid&groupid=$groupid";
    } else {
        $link = "&userid=$userid";
    }
?>

<main>
    <h1>Créer une tache</h1>
    <form action="index.php?page=createtask<?=$link?>" method="POST">
        <input type="text" name="description" placeholder="Description de la tache">
        <select name="difficulty" id="">
            <option value="1">Facile</option>
            <option value="2">Moyenne</option>
            <option value="3">Difficile</option>
        </select>
        <select name="severity" id="">
            <option value="1">Normal</option>
            <option value="2">Important</option>
            <option value="3">Urgent</option>
        </select>
        <?php 
            if($groupid != "") {
        ?>
            <input type="hidden" value="<?=$_GET['groupid']?>" name="groupid">
        <?php 
            } else {
        ?> 
            <input type="hidden" value="<?=$_GET['userid']?>" name="userid">
        <?php
            }
        ?>
        <button type="submit">Créer la tache</button>
    </form>
</main>

