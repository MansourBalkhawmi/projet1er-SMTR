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
    <link rel="stylesheet" href="css/styleinscrire.css">
    <title>Document</title>
</head>
<body>
    <header>
        <div class="logo"><img src="images/logo-fb-en.png" alt=""></div>
        <div class="a">JOUEZ POUR UN MAX DE PLAISIR</div>
    </header>
    <article>
        <div class="b">S'inscrire</div>
        <form method="POST" action="<?php echo WEB_ROUTE ?>" enctype="multipart/form-data" >
        <input type="hidden" name="controller" value="securityController">
        <input type="hidden" name="action" value="inscription">
        <!-- <input type="hidden" name="controller" value="userController">
   <input type="hidden" name="action" value="<?=isset($user['id']) ? 'edit' : 'add_user' ?>
    <input type="hidden" name="id" value="<?=isset($user['id']) ? $user['id'] : '' ?>"> -->
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
                <input type="password" name="password" id="" class="inputs">
                <span><br><?php echo isset($arrayError['password']) ? $arrayError['password'] : '' ?></span>
            </div>
            <div class="b5">
                <label for="">Confirmer votre mot de passe</label><br>
                <input type="password" name="confirmPassword" id="" class="inputs">
                <span><br><?php echo isset($arrayError['confirmPassword']) ? $arrayError['confirmPassword'] : '' ?></span>
            </div>
            <div class="b6">
                <label for="myfile">Choisir votre avatar:</label>
                <input type="file" id="myfile" name="fileToUpload" class="b7">               
            </div>
            <div>
                <button type="submit">Créer compte</button>
            </div>
            <div class="f"><a href="<?php echo WEB_ROUTE."?controller=securityController&view=connexion"?>"> Se connecter</a></div>
        </form>
    </article>
    
</body>
</html>