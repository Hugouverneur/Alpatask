<?php
/**
 * Cette fonction appele automatiquement une classe php
 * sans avoir besoin de faire un "include" ou "require"
 * Une simple demande d'instanciation d'un objet appel automatiquement cette méthode
 */


function __autoload($class_name)
 {   
 	(file_exists(DIR_PHP_CLASS.'/'.$class_name.'.php'))?	require_once DIR_PHP_CLASS.'/'.$class_name.'.php' : ''; 
  	}
?>