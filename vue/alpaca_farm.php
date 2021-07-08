<main>
    <h1>Ferme d'alpaga</h1>

    <section>
        <h2>Mes stats :</h2>

        <div id="stats_zone">
            <div class="stat_bloc">
                <p>✔</p>
                <p><?= $user_data['total_score'] ?></p>
            </div>
            <div class="stat_bloc">
                <img src="./img/alpaga24px.png" alt="alpaga">
                <p><?= $nbr_alpaga ?></p>
            </div>
        </div>

        <?= ($nbr_alpaga < 1)? '<p>Terminez des tâches pour remporter des alpagas.</p>' : '' ?>
    </section>
    
    <div class="farm_zone">
        <?php for($i=1; $i<=$nbr_alpaga; $i++): ?>
            <?php if($i%10 == 0):?>
                <img class="alpaga_img" src="./img/alpaga64pxgold.png" alt="alpaga">
            <?php else:?>
                <img class="alpaga_img" src="./img/alpaga64px.png" alt="alpaga">
            <?php endif ?>
        <?php endfor; ?>
    </div>
</main>