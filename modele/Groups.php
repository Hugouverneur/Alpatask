<?php

class Groups {

    public $group_id;
    public $group_name;
    public $company_id;
    
    public final function __construct() {}

    public function initFormPost() {

        $this->group_name = htmlspecialchars(addslashes($_POST['group_name']));
        $this->company_id = htmlspecialchars(addslashes($_POST['company_id']));
    }

    // Ajoute un nouveau groupe dans la table Groups
    public function addNewGroup() {
        global $Db;

        $sql = "INSERT INTO groups (group_name, company_id)
            VALUES (
                '$this->group_name',
                $this->company_id
            )";

        $Db->query($sql);

        $get_last_insert = "SELECT group_id FROM groups ORDER BY group_id DESC LIMIT 1";
        $req = $Db->query($get_last_insert);
        $res = $req->fetch();
        return($res['group_id']);

    }

    // Modifie les données du groupe. Prend l'id du groupe à modifier en argument.
    public function updateGroup($get_group_id) {
        global $Db;

        $sql = "UPDATE groups 
            SET group_name = '$this->group_name'
            WHERE group_id = $get_group_id";

        $Db->query($sql);
    }

    // Récupère les donnés d'un groupe en passant son id en argument
    public function getGroupData($get_group_id) {
        global $Db;

        $sql = "SELECT *
            FROM groups g
            JOIN users_groups ug
                ON g.group_id = ug.group_id
                JOIN users u
                    ON ug.user_id = u.user_id
            WHERE g.group_id = $get_group_id";

        $req = $Db->query($sql);
        $res = $req->fetchAll();
        return($res);
    }

    // Récupère les informations du propriétaire du groupe
    public function getGroupOwner($get_group_id) {
        global $Db;

        $sql = "SELECT *
            FROM users_groups ug
            JOIN users u
                ON ug.user_id = u.user_id
            WHERE ug.group_id = $get_group_id AND ug.is_group_owner = 1";

        $req = $Db->query($sql);
        $res = $req->fetch();
        return($res);
    }



}

?>