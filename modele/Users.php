<?php

class Users {

    public $user_id;
    public $user_name;
    public $user_lastname;
    public $user_email;
    public $user_auth_level;
    public $user_role_description;
    public $user_score;
    public $company_id;
    public $user_password;
    
    public final function __construct() {}

    public function initFormPost() {

        $this->user_name = htmlspecialchars(addslashes($_POST['user_name']));
        $this->user_lastname = htmlspecialchars(addslashes($_POST['user_lastname']));
        $this->user_email = htmlspecialchars(addslashes($_POST['user_email']));
        $this->user_auth_level = htmlspecialchars(addslashes($_POST['user_auth_level']));
        $this->user_role_description = htmlspecialchars(addslashes($_POST['user_role_description']));
        $this->company_id = htmlspecialchars(addslashes($_POST['company_id']));
        $this->user_password = htmlspecialchars(addslashes(password_hash($_POST['user_password'], PASSWORD_BCRYPT, ['cost' => 15])));
    }

    // Ajoute un nouvelle utilisateur dans la table Users
    public function addNewUser() {
        global $Db;

        $sql = "INSERT INTO users (user_name, user_lastname, user_email, user_role_description, company_id, user_password)
            VALUES (
                '$this->user_name',
                '$this->user_lastname',
                '$this->user_email',
                '$this->user_role_description',
                $this->company_id,
                '$this->user_password'
            )";

        $Db->query($sql);
    }

    // Modifie les données de l'utilisateur. Prend l'id de l'utilisateur à modifier en argument.
    public function updateUser($get_user_id) {
        global $Db;

        $sql = "UPDATE users 
            SET user_name = '$this->user_name',
                user_lastname = '$this->user_lastname',
                user_role_description = '$this->user_role_description'
            WHERE user_id = $get_user_id";

        $Db->query($sql);
    }

    // Récupère les donnés d'un utilisateur en passant son id en argument
    public function getUserData($get_user_id) {
        global $Db;

        $sql = "SELECT *
            FROM users
            WHERE user_id = $get_user_id";

        $req = $Db->query($sql);
        $res = $req->fetch();
        return($res);
    }

    // Détermine si l'utilisateur existe déjà en passant son email
    public function userExists($post_user_email) {
        global $Db;

        $sql = "SELECT *
            FROM users
            WHERE user_email = '$post_user_email'";

        $req = $Db->query($sql);
        $res = $req->fetch();

        return($res);
    }



}

?>