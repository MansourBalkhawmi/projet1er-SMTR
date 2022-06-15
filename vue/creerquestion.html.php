<?php
$arrayError=array();

if (isset($_SESSION['arrayError'])) {
    $arrayError = $_SESSION['arrayError'];
    unset($_SESSION['arrayError']);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/style_créer.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
<?php require_once(ROUTE_DIR.'vue/inc/menu.html.php'); ?>
    <div class="header">
        <div class="a1">
            <div class="a11"><img src="images/uploads/<?php echo $_SESSION["userConnected"]["avatar"] ?>" alt="Pas de photo de Profil" class="ima"></div>
            <div class="a12">
            <div class="a22"><a href="<?php echo WEB_ROUTE.'?controller=formController&view=accueil'?>" class="a">Créer Admin</a></div>
                <div class="a22"><a href="<?php echo WEB_ROUTE.'?controller=questionController&view=question'?>" class="a">Liste Questions</a></div>
                <div class="a22"><a href="<?php echo WEB_ROUTE.'?controller=userController&view=list.admin'?>" class="a">Liste Admin</a></div>
                <div class="a22"><a href="<?php echo WEB_ROUTE.'?controller=userController&view=list.user'?>" class="a">Liste Joueurs</a></div>
                <div class="a22"><a href="<?php echo WEB_ROUTE.'?controller=questionController&view=creerquestion'?>" class="a" style="color: black;">Créer Questions</a></div>
            </div>
            <div class="a13"> <a href="<?php echo WEB_ROUTE.'?controller=securityController&view=deconnexion'?>"> <button>Déconnecté</button> </a></div>
        </div>
        <div class="a2">
            <form action="<?=WEB_ROUTE?>" method="POST" enctype="multipart/form-data">
   <input type="hidden" name="controller" value="questionController">
   <input type="hidden" name="action" value="CREER">
   <div class="cadree">
       <div class="saisirdesquestions">
           Question: <textarea name="question" id="" cols="30" rows="10"></textarea>
           <span><br><?php echo isset($arrayError['question']) ? $arrayError['question'] : '' ?></span>
       </div><br>
       Nombre de point: <input type="number" name="numero" class="TAILLE">
       <span><?php echo isset($arrayError['numero']) ? $arrayError['numero'] : '' ?></span><br><br>
       Type de réponses:
       <select name="typeQuestion" id="typeQuestion" class="TAILLE1">
           <option value="">Donnez le type de réponse</option>
           <option value="simple" >Réponse simple</option>
           <option value="unique">Réponse unique</option>
           <option value="multiple">Réponse à choix multiple</option>
       </select>
       
       <span id="plus">
           <i class="fa-solid fa-plus breukh"></i><br><br>
           <span><?php echo isset($arrayError['typeQuestion']) ? $arrayError['typeQuestion'] : '' ?></span>
       </span>
       <label id="error"></label>
       <div id="rep">
            
       </div>
       <button type="submit" class="butonQuestion">Enregistrer</button>
   </div>
</form>
<script>
   const rep = document.getElementById("rep")
   const typeQuestion = document.getElementById("typeQuestion")
   const plus = document.getElementById("plus")
   const error = document.getElementById('error')
   nbr = 0
   plus.addEventListener("click",()=>{

       nbr++
      let div = document.createElement("div")
      div.classList.add('breukhnieule')

      typeQuestion.addEventListener("change" , ()=>{
       nbr = 0
       rep.removeChild(div)
      })

      if(typeQuestion.value == "simple") {

       error.innerHTML = ""
       if(nbr < 2){

           div.innerHTML =
       `
               <label for="">Réponse ${nbr}</label>
               <input type="text" name="reponse[]" class="TAILLE2">
               <i class="fa fa-trash" ></i>
      `
       }else{
      
       div.classList.remove('breukhnieule')

       }

      }else if(typeQuestion.value == "unique"){

       error.innerHTML = ""
       div.innerHTML =
      `
           <label for="">Réponse ${nbr}</label>
           <input type="text" name="reponse[]" class="TAILLE2">
           <input type="radio" name="bonneReponse[]" value="${nbr}">
           <i class="fa fa-trash" id="delete"></i>
      `
      }else if (typeQuestion.value == "multiple") {

       error.innerHTML = ""
       div.innerHTML =
      `
           <label for="">Réponse ${nbr}</label>
           <input type="text" name="reponse[]" class="TAILLE2">
           <input type="checkbox" name="bonneReponse[]" value="${nbr}">
           <i class="fa fa-trash"></i>
      `
      }else if (typeQuestion.value == "") {
       nbr = 0
       error.innerHTML = "check please!"
      }
     
      if (typeQuestion.value != "") {
          rep.appendChild(div)
      }

    
   })
 
  
</script>

</div>
        
</body>
</html>