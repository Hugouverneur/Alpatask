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

    #Récupère le classement des membres du groupe
    public function getRankForGroup($groupid) {
        global $Db;
        $sql = "SELECT ug.group_user_score, u.user_name, u.user_lastname, u.user_role_description
                FROM users_groups ug
                INNER JOIN users u ON u.user_id = ug.user_id
                WHERE ug.group_id = $groupid
                ORDER BY ug.group_user_score DESC";

        $req = $Db->query($sql);
        $res = $req->fetchAll();

        return $res;
    }

    // Retire un utilisateur du groupe passé en argument
    public function delUserFromGroup($post_user_id) {
        global $Db;

        $sql = "UPDATE users_groups SET group_id = NULL WHERE user_id = $post_user_id";

        $Db->query($sql);
    }

    // Récupère le scrore total de l'utilisateur
    public function getUserScore($session_user_id) {
        global $Db;

        $sql = "SELECT *, SUM(ug.group_user_score) AS total_score
            FROM users_groups ug
            JOIN users u
                ON ug.user_id = u.user_id
            WHERE ug.user_id = 4
            GROUP BY ug.user_id";
        
        $req = $Db->query($sql);
        $res = $req->fetch();
        return($res);
    }

    public function getScoreInfos($userid, $difficulty, $groupid) {
        global $Db;
        $sql = "SELECT group_user_score FROM users_groups
                WHERE user_id = $userid AND group_id = $groupid";
        $req = $Db->query($sql);
        $res = $req->fetch();

        return $res;
    }

    public function updateScoreInfos($userid, $scoreinfo, $taskpoint) {
        global $Db;
        $total = $scoreinfo + $taskpoint;
        $sql = "UPDATE users_groups
                SET group_user_score = $total
                WHERE user_id = $userid";
        $req = $Db->query($sql);
        $res = $req->fetch();
    }
}

?>