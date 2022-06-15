
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/styleaccueil1.css">
</head>
<body>
    <?php require_once(ROUTE_DIR.'vue/inc/menu.html.php'); ?>
    <div class="header">
        <div class="a1">
        <div class="a11"><img src="images/uploads/<?php echo $_SESSION["userConnected"]["avatar"] ?>" alt="Pas de photo de Profil" class="ima"></div>
            <div class="a12">
            <div class="a22"><a href="<?php echo WEB_ROUTE.'?controller=formController&view=accueil'?>" class="a" style="color: black;">Créer Admin</a></div>
            <div class="a22"><a href="<?php echo WEB_ROUTE.'?controller=questionController&view=question'?>" class="a">Liste Questions</a></div>
                <div class="a22"><a href="<?php echo WEB_ROUTE.'?controller=userController&view=list.admin'?>" class="a">Liste Admin</a></div>
                <div class="a22"><a href="<?php echo WEB_ROUTE.'?controller=userController&view=list.user'?>" class="a">Liste Joueurs</a></div>
                <div class="a22"><a href="<?php echo WEB_ROUTE.'?controller=questionController&view=creerquestion'?>" class="a">Créer Questions</a></div>
            </div>
            <div class="a13"> <a href="<?php echo WEB_ROUTE.'?controller=securityController&view=deconnexion'?>"> <button>Déconnecté</button> </a></div>
        </div>
        <div class="a2">
        <div >
            <label for="" class="aa">Nom:<?php echo $_SESSION['userConnected']['prenom']?> </label> <br>
                  <label for=""  class="aa">Prenom: <?php echo $_SESSION['userConnected']['nom']?></label><br>
                </div>  
            <div class="a21">
                <div class="a211">
                    <br>
                    <br>
                    Félicitation!!!!!!!!! <br>
                    <br>
                   <p style="font-size: 25px;margin-right:20%">Vous avez ajouté un nouveau Administrateur(se)</p> 
                </div>
    
            </div>
         </div> 
    </div>
</body>
</html>