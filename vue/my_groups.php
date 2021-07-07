<main>
    <h1>Mes groupes</h1>
    <div class="my_groups_list">
        <?php foreach($my_groups as $my_group): ?>
            <a href="index.php?page=detail_group&group_id=<?= $my_group['group_id'] ?>" class="goup_bloc">
                <p><?= $my_group['group_name'] ?></p>
                <p><?= $my_group['company_name'] ?></p>
            </a>
        <?php endforeach; ?>
    </div>

    <a href="index.php?page=new_group">Créer un nouveau groupe</a>
</main>