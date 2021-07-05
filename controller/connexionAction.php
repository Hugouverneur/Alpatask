<?php

// Récupère les identifiants de connexion saisie par l'utilisateur.
$connexion = new Connexions();
$connexion_login = $_POST['login'];
$connexion_password = $_POST['password'];
$connexion->UserLogin($connexion_login, $connexion_password);



include './layouts/header.php';
include './layouts/structure.php';
?>