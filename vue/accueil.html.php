<?php
$arrayError = [];

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
    <link rel="stylesheet" href="css/styleaccueil.css">
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
            <div class="a13"> <a href="<?php echo WEB_ROUTE.'?controller=securityController&view=deconnexion'?>"> <button class="BTN">Déconnecté</button> </a></div>
        </div>
        <div class="a2">
            <div >
            <label for="" class="aa">Nom:<?php echo $_SESSION['userConnected']['prenom']?> </label> <br>
                  <label for=""  class="aa">Prenom: <?php echo $_SESSION['userConnected']['nom']?></label><br>
                </div>  
            <div class="a21">
        <div class="b" style="margin-bottom: 10px;">Création d'Admin</div>
        <form method="POST" action="<?php echo WEB_ROUTE ?>" enctype="multipart/form-data" >
        <input type="hidden" name="controller" value="securityController">
        <input type="hidden" name="action" value="inscription1">
        <input type="hidden" name="id" value="<?=isset($user['id']) ? $user['id'] : '' ?>">
            <div class="b1">
                <label for="">Nom</label><br>
                <input type="text" name="nom" id="" value="<?=isset($user['nom']) ? $user['nom'] : '' ?>" class="inputs">
                <span><br><?php echo isset($arrayError['nom']) ? $arrayError['nom'] : '' ?></span>
            </div>
            <div class="b2">
                <label for="">Prénom</label><br>
                <input type="text" name="prenom" id="" value="<?=isset($user['prenom']) ? $user['prenom'] : '' ?>" class="inputs">
                <span><br><?php echo isset($arrayError['prenom']) ? $arrayError['prenom'] : '' ?></span>
            </div>
            <div class="b3">
                <label for="">E-mail</label><br>
                <input type="text" name="email" id="" value="<?=isset($user['email']) ? $user['email'] : '' ?>" class="inputs">
                <span><br><?php echo isset($arrayError['email']) ? $arrayError['email'] : '' ?></span>
            </div>
            <div class="b4">
                <label for="">Mot de passe</label><br>
                <input type="text" name="password" id=""value="<?=isset($user['password']) ? $user['password'] : '' ?>" class="inputs">
                <span><br><?php echo isset($arrayError['password']) ? $arrayError['password'] : '' ?></span>
            </div>
            <div class="b5">
                <label for="">Confirmer votre mot de passe</label><br>
                <input type="password" name="confirmPassword" id="" value="<?=isset($user['confirmPassword']) ? $user['confirmPassword'] : '' ?>" class="inputs">
                <span><br><?php echo isset($arrayError['confirmPassword']) ? $arrayError['confirmPassword'] : '' ?></span>
            </div>
            <div class="b6">
                <label for="myfile">Choisir votre avatar:</label>
                <input type="file" id="myfile"  name="fileToUpload" class="b7">               
            </div>
            <div>
                <button type="submit" class="b8">Créer compte</button>
            </div>
        </form>
          </div>
    
        </div>
        
</body>
</html>