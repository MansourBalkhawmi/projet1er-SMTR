<?php 

if($_SERVER['REQUEST_METHOD'] == "GET") {
    if (isset($_GET['view'])) {
        if ($_GET['view'] == "connexion") {
            require_once(ROUTE_DIR.'vue/security/connexion.html.php');
        } elseif ($_GET['view'] == "inscription") {
            require_once(ROUTE_DIR.'vue/security/inscription.html.php');
        } elseif ($_GET['view'] == "connexion") {
            require_once(ROUTE_DIR.'vue/security/connexion.html.php');
        }elseif ($_GET['view'] == "deconnexion") {
            destroy_session();
            require_once(ROUTE_DIR.'vue/security/connexion.html.php');
        }elseif ($_GET['view'] == "inscription1") {
            require_once(ROUTE_DIR.'vue/accueil.html.php');
        }elseif ($_GET['view'] == "edit") {
            $user=get_user_by_id($_GET['id']);
           
            require_once(ROUTE_DIR.'vue/accueil.html.php');

        }
    }
} elseif ($_SERVER['REQUEST_METHOD'] == "POST") {
    
        if (isset($_POST['action'])) {
        //var_dump($_POST);die;
       if ($_POST['action'] == "connexion") {
        
          connexion($_POST);
       } elseif ($_POST['action'] == "inscription") {
           
        
           inscription($_POST , $_FILES);
       } elseif ($_POST['action'] == "inscription1") {
            inscription1($_POST , $_FILES);
            }
    }
    }


function connexion($data) {
    $arrayError = [];
    extract($data);
    
    valid_champ_user($arrayError, $email, 'email');
    valideEmail($arrayError, $email, 'email'); 
    valid_champ_user($arrayError, $password, 'password');
    
    
    if (empty($arrayError)) {
        $result = login_password_exist($email, $password);
        if ($result != null) {

            $_SESSION['userConnected'] = $result;

            if ( $_SESSION['userConnected']['role'] == 'ROLE_JOUEUR') {
                header("location:".WEB_ROUTE."?controller=formController&view=accueiljoueur");
            }else {
                header("location:".WEB_ROUTE."?controller=formController&view=accueil");
            }
         
            
        } else {
            $arrayError['error'] = "email ou mot de passe incorrect";
            $_SESSION['arrayError'] = $arrayError;
            header("location:".WEB_ROUTE."?controller=securityController&view=connexion");
        }
    } else {
        $_SESSION['arrayError'] = $arrayError;
        header("location:".WEB_ROUTE."?controller=securityController&view=connexion");
    }

    
}
function deconnexion(){
    unset($_SESSION['userConnected']);
}

function inscription($inscription,$files) {
    
    $arrayError = [];
    extract($inscription);
    
            valid_champ_user($arrayError, $nom, 'nom');
            valid_champ_user($arrayError, $prenom, 'prenom');
           /*  valid_champ_user($arrayError, $telephone, 'telephone'); */
            valid_champ_user($arrayError, $email, 'email');
            valideEmail($arrayError, $email, 'email'); 
            valid_champ_user($arrayError, $password, 'password');
            validePassword($arrayError, $password,$confirmPassword, 'confirmPassword');
            valid_champ_user($arrayError, $confirmPassword, 'confirmPassword');
            if (empty($arrayError)) {
               
                if(to_uploads($files)){
                    $data['fileToUpload'] = $files['fileToUpload']['name'];
                }
                if($data['id'] != ""){

                    modification($data);
                }else{
                    $user = [
                    "nom" => $nom,
                    "prenom" => $prenom,
                    /* "telephone" => $telephone, */
                    "email" => $email,
                    "password" => $password,
                    "id" =>uniqid(),
                    "role"=> 'ROLE_JOUEUR',
                    "avatar"=> $files['fileToUpload']['name']
                ];
                }
                
                addUser($user);
                $_SESSION['userConnected'] = $user;
                header("location:".WEB_ROUTE."?controller=securityController&view=connexion");
               
            } else {
                $_SESSION['arrayError'] = $arrayError;
                header("location:".WEB_ROUTE."?controller=securityController&view=inscription");
            }
            

            
}
function inscription1($inscription1,$files) {
    
    $arrayError = [];
  
    extract($inscription1);
    
            valid_champ_user($arrayError, $nom, 'nom');
            valid_champ_user($arrayError, $prenom, 'prenom');
            valid_champ_user($arrayError, $email, 'email');
            valideEmail($arrayError, $email, 'email');
            valid_champ_user($arrayError, $password, 'password');
            validePassword($arrayError, $password,$confirmPassword, 'confirmPassword');
            valid_champ_user($arrayError, $confirmPassword, 'confirmPassword');
            if ($password != $confirmPassword) {
                $arrayError['confirmPassword']= "Saisir le bon mot de passe";
            }
            if (empty($arrayError)) {
                if(to_uploads($files)){
                    $data['fileToUpload'] = $files['fileToUpload']['name'];
                }

                if($data['id'] != ""){

                    modification($data);
                }else{
                    $user = [
                    "nom" => $nom,
                    "prenom" => $prenom,
                    "email" => $email,
                    "password" => $password,
                    "id" =>uniqid(),
                    "role"=> 'ROLE_Admin',
                    "avatar"=> $files['fileToUpload']['name']
                ];
                
                }
                
                addUser($user);
                $_SESSION['userConnected'] = $user;
                header("location:".WEB_ROUTE."?controller=formController&view=accueil1");
               
            } else {
                $_SESSION['arrayError'] = $arrayError;
                header("location:".WEB_ROUTE."?controller=securityController&view=inscription1");
            }
            

            
}


?>
