<header>
    <nav>

        <div class="left_menu">
            <a href="index.php?page=home">Home</a>
            <a href="index.php?page=profile&user_id=<?= $_SESSION['user_id'] ?>">Mon profile</a>
            <a href="">Mes équipes</a>
        </div>

        <div class="right_menu">
            <?php if($_SESSION['is_valid'] == true): ?>
                <a href="index.php?page=deconnexion">Deconnexion</a>
            <?php else: ?>
                <a href="index.php?page=connexion">Connexion</a>
            <?php endif; ?>

        </div>
        
    </nav>
</header>