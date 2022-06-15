<?php 
if($_SERVER['REQUEST_METHOD'] == "GET") {
    if (isset($_GET['view'])) {
        if ($_GET['view'] == "accueil") {
            require_once(ROUTE_DIR.'vue/accueil.html.php');
        } elseif ($_GET['view'] == "list.admin") {
            require_once(ROUTE_DIR.'vue/Affiche_admin.html.php');
        }elseif ($_GET['view'] == "list.user") {
            require_once(ROUTE_DIR.'vue/Affiche_user.html.php');
        }elseif ($_GET['view'] == "creer_question") {
            require_once(ROUTE_DIR.'vue/creerquestion.html.php');
        }elseif ($_GET['view'] == "question") {
            require_once(ROUTE_DIR.'vue/Affiche_question.html.php');
        }elseif ($_GET['view'] == "exercice2") {
            require_once(ROUTE_DIR.'vue/exercice2.html.php');
        }elseif ($_GET['view'] == "accueil1") {
            require_once(ROUTE_DIR.'vue/accueil1.html.php');
        }
    }
} elseif ($_SERVER['REQUEST_METHOD'] == "POST") {
    var_dump($_POST);
    die();
}



?>