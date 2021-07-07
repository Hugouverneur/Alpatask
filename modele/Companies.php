<?php

class Companies {

    public $company_id;
    public $company_name;
    
    public final function __construct() {}

    public function initFormPost() {

        $this->company_name = htmlspecialchars(addslashes($_POST['company_name']));
    }

    // Ajoute un nouvelle société dans la table Companies
    public function addNewCompany() {
        global $Db;

        $sql = "INSERT INTO companies (company_name)
            VALUES (
                '$this->company_name'
            )";

        $Db->query($sql);
    }


    // Récupère les donnés d'une société en passant son id en argument
    public function getCompanyData($get_company_id) {
        global $Db;

        $sql = "SELECT *
            FROM companies
            WHERE company_id = $get_company_id";

        $req = $Db->query($sql);
        $res = $req->fetch();
        return($res);
    }

    // Détermine si la société existe déjà en passant son nom
    public function companyExists($post_company_name) {
        global $Db;

        $sql = "SELECT *
            FROM companies
            WHERE company_name = '$post_company_name'";

        $req = $Db->query($sql);
        $res = $req->fetch();

        return($res);
    }



}

?>