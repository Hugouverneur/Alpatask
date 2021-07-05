<?php

class Connexions {

    public $login;
    public $password;
    
    public final function __construct(){}

    public function initFormPost(){

        $this->login = $_POST['login'];
        $this->password = $_POST['password'];

    }

    // Compare les information saisie pas l'utilisateur
    public function UserLogin($connexion_login, $connexion_password){
        global $Db;
        $sql = "SELECT * FROM users WHERE email = '$connexion_login' AND passe = '$connexion_password'";
        $req = $Db->query($sql);
        $res = $req->fetch();
        if($res == FALSE){
            $this->deleteSession();
            if($_POST['login'] != ''){
                $alert = "L'e-mail ou le mot-de-passe est invalide !";
                $this->alert = $alert;
            }
            
            return(FALSE);
        }
        else{
            $this->InitSession($res);
        };

    }

    // Initialiser les variables de sessions
    public function InitSession($res){
        
        $_SESSION['login'] = $res['email'];
        $_SESSION['pseudo'] = $res['pseudo'];
        $_SESSION['user_id'] = $res['user_id'];
        $_SESSION['role'] = $res['role'];
        $_SESSION['photo'] = $res['user_photo'];
        $_SESSION ['is_valid'] = TRUE;

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