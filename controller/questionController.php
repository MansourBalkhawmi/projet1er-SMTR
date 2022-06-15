<?php 
if($_SERVER['REQUEST_METHOD'] == "GET") {
    if (isset($_GET['view'])) {
        if ($_GET['view'] == "creerquestion") {
            require_once(ROUTE_DIR.'vue/creerquestion.html.php');
        }elseif ($_GET['view'] == "question") {
            $Questions = get_list_question();
            require_once(ROUTE_DIR.'vue/Affiche_question.html.php');
        }
    }
}elseif ($_SERVER['REQUEST_METHOD'] == "POST") {  
    if ($_POST['action'] == "CREER") {
        unset($_POST["controller"]);
        unset($_POST["action"]);
       Questionnaire($_POST);
    }   
} 



function Questionnaire($questionnaire):void{
    $arrayError=array();
    extract($questionnaire);
    $newquestion= [];
    $questionnaire['id'] = uniqid();
    // AddQuestion($questionnaire);
    /* var_dump($questionnaire); die; */
    /* header("location:" . WEB_ROUTE . "?controller=AdminController&view=listequestion"); */
 
 
 
    valid_input($arrayError, $question, 'question');
    type_reponse($typeQuestion,'typeQuestion',$arrayError,);
    reponse($reponse,'Reponse', $arrayError);
    valid_point($arrayError, $numero,'numero');
   
    if (!isset($arrayError)) {
        if ($result != null) {
            $_SESSION['questionAJOUTER'] = $result;}
        if ($data['id'] != "") {
 
            modificationQuestion($data);
        } else {
            $newquestion = [
                "question" => $question,
                "typeQuestion" => $typeQuestion,
                "Reponse" => [
                    $reponse
                ],
                "bonneReponse" => [
                    $bonneReponse
                ],
                "numero" => $numero,
                "id" => uniqid()
 
            ];
        }
       
        AddQuestion($newquestion);
       
        $_SESSION['questionAJOUTER']=$Question;
        header("location:" . WEB_ROUTE . "?controller=questionController&view=question");
    } else {
        $_SESSION['arrayError'] = $arrayError;
        header("location:" . WEB_ROUTE . "?controller=questionController&view=creerquestion");
    }
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
 } */
 
 
?>