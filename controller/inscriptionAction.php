<?php

var_dump($_POST);
if(isset($_POST['user_email'])) {
    $users = new Users();
    $user_exists = $users->userExists($_POST['user_email']);

    if($user_exists['user_email'] === NULL) { // Vérification si l'utilisateur n'existe pas

        $companies = new Companies();
        $company_exists = $companies->companyExists($_POST['company_name']);
        
        if($company_exists['company_name'] === NULL) { // Si la société n'existe pas, on la créer
            $companies->initFormPost();
            $companies->addNewCompany();

        } else { // Si la société existe, on assigne son id dans le POST. En réutilisant l'array $company_exists
            $_POST['company_id'] = $company_exists['company_id'];
        }

        $users->initFormPost();
        $users->addNewUser();

        ?><script>
            alert('Utilisateur créé !')
        </script><?php
    }
    
}

include './layouts/header.php';
include './layouts/structure.php';

?>