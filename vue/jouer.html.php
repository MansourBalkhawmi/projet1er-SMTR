<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/jouer.css">
    <title>Document</title>
</head>
<body>
<?php require_once(ROUTE_DIR.'vue/inc/menu1.html.php'); ?>
<section class="section1">
 <div class="d1"><img src="images/uploads/<?php echo $_SESSION["userConnected"]["avatar"] ?>" alt="Pas de photo de Profil" class="ima">
 <label for="" class="aa"><?php echo $_SESSION['userConnected']['prenom']?> <?php echo $_SESSION['userConnected']['nom']?><br></label></div>
 <div class="d2">
    <div class="d22"> <a href="<?php echo WEB_ROUTE.'?controller=formController&view=accueiljoueur'?>" class="a">¤ Accueil</a></div>
    <div class="d222"> <a href="" class="a" style="color:black ;  background-color: #775AB7 ;">¤ Jouer</a></div>
    <div class="d2222"> <a href="" class="a">¤ Liste des Scores</a></div>
 </div>
 <div class="d3"><a href="<?php echo WEB_ROUTE.'?controller=securityController&view=deconnexion'?>"> <button class="BTN">Déconnexion</button> </a></div>
</section>
<section class="section2">

</section>