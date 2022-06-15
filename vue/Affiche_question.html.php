<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/style_question.css">
</head>
<body>
<?php require_once(ROUTE_DIR.'vue/inc/menu.html.php'); ?>
    <div class="header">
        <div class="a1">
            <div class="a11"><img src="images/uploads/<?php echo $_SESSION["userConnected"]["avatar"] ?>" alt="Pas de photo de Profil" class="ima"></div>
            <div class="a12">
            <div class="a22"><a href="<?php echo WEB_ROUTE.'?controller=formController&view=accueil'?>" class="a">Créer Admin</a></div>
                <div class="a22"><a href="<?php echo WEB_ROUTE.'?controller=questionController&view=question'?>" class="a" style="color: black;">Liste Questions</a></div>
                <div class="a22"><a href="<?php echo WEB_ROUTE.'?controller=userController&view=list.admin'?>" class="a">Liste Admin</a></div>
                <div class="a22"><a href="<?php echo WEB_ROUTE.'?controller=userController&view=list.user'?>" class="a">Liste Joueurs</a></div>
                <div class="a22"><a href="<?php echo WEB_ROUTE.'?controller=questionController&view=creerquestion'?>" class="a">Créer Questions</a></div>
            </div>
            <div class="a13"> <a href="<?php echo WEB_ROUTE.'?controller=securityController&view=deconnexion'?>"> <button>Déconnecté</button> </a></div>
        </div>
        <div class="a2">
            <form action="<?=WEB_ROUTE?>" method="POST" enctype="multipart/form-data">
   <div class="b1"><label for="">Nombre de Questions du Jeu</label> <input type="number" name="" id="" class="b11"> <button class="b12">OK</button></div>
   <div class="b2">
   <?php foreach ($Questions as $key => $val) : ?>

<h3> <?php echo $key + 1, "." . $val['question']; ?></h3>

<?php foreach ($val['Reponse'] as $reps => $rep) : ?>
    <?php if ($val["typeQuestion"] == "multiple") : ?>
        <input type="checkbox" name="choix"><?php echo $rep  ?><br>
    <?php elseif ($val["typeQuestion"] == "unique") : ?>
        <input type="radio" name="choix1"><?php echo $rep ?> <br>
        <?php elseif ($val["typeQuestion"] == "simple") : ?>
    
        <input type="text" value="<?php echo $rep ?> hhhhhhh" style="border:3px solid #775AB7 ;height: 25px;width:50%">

    <?php endif; ?>


<?php endforeach; ?>
<?php endforeach; ?>

   </div>
</form>

        
</body>
</html>