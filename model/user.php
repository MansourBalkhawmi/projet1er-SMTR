<?php 
function addUser(array $user) {
    $users = get_file_content();
    if (!isset($users)) {
        $users = [];
    }

    array_push($users, $user);
    ajouter_fichier($users);
}

function get_list_user() {
    $users = get_file_content();
    if (!isset($users)) {
        $users = [];
    }

    return $users;
}

function get_user_by_id(string $id) {
    $users = get_list_user();
    foreach ($users as $key => $value) {
        if($value['id'] == $id) {
            return $value;
        }
    }
}

function get_file_content() {
    $json = file_get_contents(ROUTE_DIR.'data/user.data.json');
    return json_decode($json, true);
}

function ajouter_fichier(array $array) {
    $json = json_encode($array);
    file_put_contents(ROUTE_DIR.'data/user.data.json', $json);
}

function delete(string $id):bool{
    $data = get_file_content();
    $tab=[];
    $yes=false;
    foreach ($data as $value) {
        if ($value['id'] == $id) {
            $yes = true;
        }else{
            $tab [] = $value;
        }
    }
    if($yes){
        ajouter_fichier($tab);
    }
    return $yes;
     
}

function modification(array $user){
    $modif = get_file_content();
    foreach ($modif as $key => $value) {
        if($value['id'] == $user['id']){
            $modif[$key] = $user;
        }
    }
    ajouter_fichier($modif);
}

function login_password_exist($login, $password) {
    $users = get_file_content();

    foreach ($users as $key => $value) {
        if ($value['email'] == $login && $value['password'] == $password) {
            return $value;
        }
    }

    return null;
}
function nombrePageTotal($array, $nombreElement): int {
    $nombrePage=0;
    $longArray = count($array);
    if ($longArray % $nombreElement ==0) {
        $nombrePage = $longArray / $nombreElement ;
    }
    return $nombrePage;
}
function paginer($array, $nombreElement, $page): array{
    $arrayElement = [] ;
    $indiceDepart = ($page*$nombreElement) - $nombreElement;
    $limitElement = $page*$nombreElement ; 
    for ($i=$indiceDepart; $i < $limitElement; $i++) { 
        if ($i >= count($array)) {
           return $arrayElement ;
    } else {
        $arrayElement[] = $array[$i] ;
    }
} 
return $arrayElement ;
}

function countpage(int $taillePage, array $arrayPersonne) {
    $nbrePage = intdiv(count($arrayPersonne), $taillePage);
    if (count($arrayPersonne)%$taillePage != 0) {
        $nbrePage = $nbrePage + 1;
    }
    return $nbrePage;
 }
 
 
 
 

?>