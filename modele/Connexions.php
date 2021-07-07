<?php

class Connexions {

    public $login;
    public $password;
    
    public final function __construct(){}

    public function initFromPostConnection() {
        $this->login = htmlspecialchars(addslashes($_POST['login']));
        $this->password = htmlspecialchars(addslashes($_POST['password']));
    }

    // Compare les information saisie pas l'utilisateur
    public function UserLogin($connexion_login, $connexion_password){
        global $Db;

        // Trouve le bon login dans la base
        $sql = "SELECT * 
        FROM users
        WHERE user_email = '$connexion_login'";

        $req = $Db->query($sql);
        $res = $req->fetch();
        
        // Vérifie si le mdp de la base (hash) correspond avec la saisie
        if(password_verify($connexion_password, $res['user_password'])) {
            $this->initSession($res);

        } else {
            $this->deleteSession();

            if($_POST['login'] != '') {
                $connexion_echoue = "L'e-mail ou le mot-de-passe est invalide !";
                $this->connexion_echoue = $connexion_echoue;

            }

            return(FALSE);
        }
    }

    // Initialiser les variables de sessions
    public function initSession($res) {

        $_SESSION['user_id'] = $res['user_id'];
        $_SESSION['user_email'] = $res['user_email'];
        $_SESSION['user_lastname'] = $res['user_lastname'];
        $_SESSION['user_name'] = $res['user_name'];
        $_SESSION['user_role_description'] = $res['user_role_description'];
        $_SESSION['company_id'] = $res['company_id'];
        $_SESSION ['is_valid'] = TRUE;

        // redirection vers la page home
        header('location:index.php?page=home');

    }

    public function deleteSession(){
        $_SESSION = array();

        // Destruction de la session
        session_destroy();

        // Destruction du tableau de session
        unset($_SESSION);
    }

    
}

?>