<?php

// Récupère les identifiants de connexion saisie par l'utilisateur.
$connexion = new Connexions();
$connexion->UserLogin($_POST['login'], $_POST['password']);



include './layouts/header.php';
include './layouts/structure.php';
?>