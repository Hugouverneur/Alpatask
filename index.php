<?php

session_start();


// insertion du fichier config
include_once('conf.inc.php');
// Fonction d'appel automatique des classes
require_once('autoload.php');
// Connexion à la DB
$Db = new DbTools();
if($Db -> Connection){
    //echo 'Connexion OK';
}

// recuperation de variables de l'URL
$page = $_GET['page'];
$type = $_GET['action'];

$page = ($page == '')? 'home' : $page;

include('controller/'.$page.'Action.php');

?>

