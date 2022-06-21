<?php
function AddQuestion(array $Question) {
    $Questions = get_file_contentQuestion();
    if (!isset($Questions)) {
        $Questions = [];
    }
    array_push($Questions, $Question);
    ajouter_Question($Questions);
}
 
 function get_list_question() {
    $Questions = get_file_contentQuestion();
    if (!isset($Questions)) {
        $Questions = [];
    }
 
    return $Questions;
 }
 
 function get_question_by_id(string $id) {
    $Questions = get_list_question();
    foreach ($Questions as $key => $value) {
        if($value['id'] == $id) {
            return $value;
        }
    }
 }
 
 function get_file_contentQuestion() {
    $json = file_get_contents(ROUTE_DIR.'data/question.data.json');
    return json_decode($json, true);
 }

 function deleteQuestion(string $id):bool{
    $data = get_file_contentQuestion();
    $tab=[];
    $yes=false;
    
    foreach ($data as $value) {
        if ($value['id'] == $id) {
            $yes = true;
        }else{
            $tab [] = $value;
        }
    }
    ajouter_fichierq($tab);
    return $yes;
     
}


function ajouter_fichierq(array $array) {
    $json = json_encode($array);
    file_put_contents(ROUTE_DIR.'data/question.data.json', $json);
}

 
 function ajouter_Question(array $array) {
    $json = json_encode($array);
    file_put_contents(ROUTE_DIR.'data/question.data.json', $json);
 }
 
 function modificationQuestion(array $Question){
    $modifQuestion = get_file_contentQuestion();
    foreach ($modifQuestion as $key => $value) {
        if($value['id'] == $Question['id']){
            $modifQuestion[$key] = $Question;
        }
    }
    ajouter_Question($modifQuestion);
 }
 function getListToDisplay(array $arrayPersonne, $page, $taillePage) {
    $indiceDepart = ($taillePage*$page) - $taillePage;
    $indiceArriver = $indiceDepart + $taillePage - 1;
    $arrayPaged = [];
 
    for ($i=$indiceDepart; $i< count($arrayPersonne); $i++){
        if ($indiceArriver < count($arrayPersonne)) {
            array_push($arrayPaged, $arrayPersonne[$i]);
            if ($i == $indiceArriver) {
                break;
            }
        }else {
            array_push($arrayPaged, $arrayPersonne[$i]);
        }
    }
    return $arrayPaged;
 }
 
?>