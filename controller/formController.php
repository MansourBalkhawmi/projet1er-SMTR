<?php 
if($_SERVER['REQUEST_METHOD'] == "GET") {
    if (isset($_GET['view'])) {
        if ($_GET['view'] == "accueil") {
            require_once(ROUTE_DIR.'vue/accueil.html.php');
        } elseif ($_GET['view'] == "accueiljoueur") {
            require_once(ROUTE_DIR.'vue/accueiljoueur.html.php');
        }elseif ($_GET['view'] == "accueil1") {
            require_once(ROUTE_DIR.'vue/accueil1.html.php');
        }
    }
} elseif ($_SERVER['REQUEST_METHOD'] == "POST") {
    var_dump($_POST);
    die();
}



?>