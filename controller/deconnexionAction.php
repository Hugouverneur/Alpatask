<?php

// Supprime les variables de session et ferme la session.
$deconnexion = new Connexions();
$deconnexion->deleteSession();



include './layouts/header.php';
include './layouts/structure.php';
?>