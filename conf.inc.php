<?php
// Désactiver le rapport d'erreurs
error_reporting(1);
//error_reporting(E_ALL);
//on supprime l'affichage des session_Id dans les URL
//ini_set('session.use_trans_sid', 0);
//ini_set('session.use_only_cookies', 1);

// desactive la limite de temps d'execution d'un traitement par PHP
ini_set('max_execution_time', 0);
//Remplace le & situé apres la valeur de la session dans les url par le code html &amp;
ini_set('arg_separator.output', '&amp;');
//recuperation du domaine
$domaine = $_SERVER['HTTP_HOST'];
//Racine du site
define('URL_ROOT' , 'https://'.$domaine);

//Chemin d'accès aux class PHP
define('DIR_PHP_CLASS','modele');

//Definition du chemin d'accès au site
define('WEB_ROOT','index.php');
//Definition du chemin d'accès aux images
define('REP_IMAGES',URL_ROOT.'/img');

//Definition du chemin d'accès aux CSS
define('REP_CSS',URL_ROOT.'/css');
//Definition du chemin d'accès aux JS
define('REP_JS',URL_ROOT.'/js');


//Chemin d'accès aux fichiers des articles
define('PATH_PICTURE_ARTICLE',URL_ROOT.'/articles/pictures');
define('PATH_PICTURE_MINI_ARTICLE',URL_ROOT.'/articles/pictures/mini');



//configuration de la BDD
    define('DATABASE_HOST' , 'localhost:3306');
    define('DATABASE_TYPE' , 'mysql');
    define('DATABASE_NAME' , 'alpatasks');
    define('DATABASE_USERNAME' , 'root');
    define('DATABASE_PASSWORD' , '');




?>