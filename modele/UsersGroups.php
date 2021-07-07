<?php

class UsersGroups {

    public $is_group_owner;
    public $group_user_score;
    public $group_id;
    public $user_id;
    
    public final function __construct() {}

    // Ajoute un nouvel utilisateur dans le groupe
    public function addNewUserGroup($is_group_owner, $post_group_id, $post_user_id) {
        global $Db;

        if($is_group_owner) {
            $sql = "INSERT INTO users_groups (is_group_owner, group_user_score, group_id, user_id)
                VALUES (
                    1,
                    0,
                    $post_group_id,
                    $post_user_id
                )";

        } else {
            $sql = "INSERT INTO users_groups (is_group_owner, group_user_score, group_id, user_id)
                VALUES (
                    0,
                    0,
                    $post_group_id,
                    $post_user_id
                )";

        }

        $Db->query($sql);
    }

    // Récupération des groupes de l'utilisateur
    public function getUserGroups($session_user_id) {
        global $Db;

        $sql = "SELECT *
            FROM users_groups ug
            JOIN groups g
                ON ug.group_id = g.group_id
                JOIN companies c
                    ON g.company_id = c.company_id
            WHERE ug.user_id = $session_user_id";

        $req = $Db->query($sql);
        $res = $req->fetchAll();
        return($res);
    }

    // Retire un utilisateur du groupe passé en argument
    public function delUserFromGroup($post_user_id) {
        global $Db;

        $sql = "UPDATE users_groups SET group_id = NULL WHERE user_id = $post_user_id";

        $Db->query($sql);
    }



}

?>