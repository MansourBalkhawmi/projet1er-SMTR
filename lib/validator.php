<?php
function est_vide($str) {
    $valeur=str_replace(" ","",$str);
    return empty($valeur);
}

function est_entier($str) {
    $valeur=str_replace(" ","",$str);
    return is_numeric($valeur);
}

function valid_champ(array &$arrayError, $str, string $key) {
    $valeur=str_replace(" ","",$str);
    if (est_vide($valeur)) {
        $arrayError[$key] = "Champ obligatoire";
    } else if (!est_entier($valeur)) {
        $arrayError[$key] = "Veuillez saisir un nombre";
    }
}

function valid_champ_user(array &$arrayError, $str, string $key) {
    $valeur=str_replace(" ","",$str);
    if (est_vide($valeur)) {
        $arrayError[$key] = "Champ obligatoire";
    }
}
 function valideEmail(array &$arrayError, $email, string $key){
   // $email=str_replace(" ","",$str);
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $arrayError[$key] = "Le format e-mail est invalide. (aa@gmail.com)";
    }
 }

 function validePassword(array &$arrayError, $password1,$password2, string $key){
    // $email=str_replace(" ","",$str);
     if ($password2 != $password1) {
         $arrayError[$key] = "Ce mot de passe est diffferent du premier";
     }
  }

  function type_reponse($valeur, string $key, &$arrayError) {
      if (est_vide($valeur)) {
         $arrayError[$key]= "Veillez donner le type de réponse";
      }
  }
  function reponse($valeur, string $key, &$arrayError) {
    if (est_vide($valeur)) {
        $arrayError[$key]= "Veillez donner la réponse";
     }
  }
  function valid_input(array &$arrayError, $str, string $key) {
      $valeur = str_replace(" ","",$str);
      if (empty($valeur)) {
          $arrayError[$key]= "Ce champ est obligatoire";
      }elseif ($valeur.trim(" ") == "") {
        $arrayError[$key]= "Ce champ est obligatoire";
    }
  }
  function valid_point( array &$arrayError, $valeur, string $key) {
      if (empty($valeur)) {
          $arrayError[$key] = "Ce champ est obligatoire";
      }  elseif ($valeur <= 0) {
        $arrayError[$key] = "Veillez saisir de nombres positifs";
  }

 /*  function valid_nbr_reponse($valeur, string $key, array &$arrayError) {
      if (empty($valeur)) {
          $arrayError[$key]= "Ce champ est obligatoire";
      }elseif ($valeur <=0) {
        $arrayError[$key] = "Veillez saisir de nombres positifs";
      }
  } */
}
?>
