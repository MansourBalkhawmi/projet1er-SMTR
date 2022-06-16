<?php 
if($_SERVER['REQUEST_METHOD'] == "GET") {
    if (isset($_GET['view'])) {
        if ($_GET['view'] == "add.user") {
            require_once(ROUTE_DIR.'vue/add_user.html.php');

        } elseif ($_GET['view'] == "list.admin") {
            $page = 1;
            if (isset($_GET["page"])) {
                $page = intval($_GET["page"]);
            }
            $users = get_list_user(); 
          $totalPage=countpage(5, $users);
          $users= getListToDisplay($users, $page , 5);
            require_once(ROUTE_DIR.'vue/Affiche_admin.html.php');

        } elseif ($_GET['view'] == "list.user") {
            $page =1;
            if (isset($_GET["page"])) {
                $page = intval($_GET["page"]);
            }
            $users = get_list_user();
          $totalPage=countpage(5, $users);
          $users= getListToDisplay($users, $page , 5);
            require_once(ROUTE_DIR.'vue/Affiche_user.html.php');
            
        }elseif ($_GET['view'] == "delete") {
            if(isset($_GET['id'])){
                delete($_GET['id']);
                header("location:".WEB_ROUTE."?controller=userController&view=list.admin");
            }
        }elseif ($_GET['view'] == "edit") {
            $user=get_user_by_id($_GET['id']);
            require_once(ROUTE_DIR.'vue/Affiche_admin.html.php');

        }elseif ($_GET['view'] == "list.admin") {
            $users = get_list_user();
            require_once(ROUTE_DIR.'vue/Affiche_admin.html.php');
        }
    }
} elseif ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (isset($_POST['action'])) {
        if ($_POST['action'] == "add.user") {
           add($_POST);
        }elseif ($_POST['action'] == "edit") {
            add($_POST);
        }
    }
}

//FONCTION POUR AJOUTER OU MODIFIER
function add(array $data){
    $arrayError = [];
    extract($data);
    valid_champ_user($arrayError, $_POST['nom'], 'nom');
    valid_champ_user($arrayError, $_POST['prenom'], 'prenom');
    valid_champ_user($arrayError, $_POST['telephone'], 'telephone');
    valid_champ_user($arrayError, $_POST['email'], 'email');
    valid_champ_user($arrayError, $_POST['password'], 'password');
    valid_champ_user($arrayError, $_POST['confirmPassword'], 'confirmPassword');
    if (empty($arrayError)) {
        
        

        if($data['id'] != ""){

            modification($data);
        }else{
            
            $user = [
                "nom" => $_POST['nom'],
                "prenom" => $_POST['prenom'],
                "email" => $_POST['email'],
                "password" => $_POST['password'],
                "confirmPassword" => $_POST['confirmPassword'],
                "id"=>uniqid(),
            ];
            
            addUser($user);
        }

       
    } else {
        $_SESSION['arrayError'] = $arrayError;
    }

    header("location:".WEB_ROUTE."?controller=userController&view=list.admin");
    
}

/* function Pagination ($data, $position){
    $nbrPage =0 ;
    $page= 1;
    $suivant= 2;
    $nbrElement= 3;
    $precedent= 0;
    
    if (isset($position)) {
        $page = 1;
        $_SESSION['user_admin'] = $data ;
        $nbrPage = nombrePageTotal($_SESSION['user_admin'], 3);
        $list_user = paginer($_SESSION['user_admin'],$page,3);
    }

    if (isset($position)) {
        $page = $position ;
        $suivant = $page + 1 ;
        $precedent = $page - 1 ;
        if (isset($_SESSION['user_admin'])) {
            $_SESSION['user_admin'] = $data ;
            $nbrPage = nombrePageTotal($_SESSION['user_admin'],3);
            $list_user = paginer($_SESSION['user_admin'],$page,3);
        }
    }
    return [
        'precedent'=> $precedent,
        'suivant'=> $suivant,
        'nbrPage'=> $nbrPage,
        'data'=> $list_user
    ];
}
 */
?>