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
    <link rel="stylesheet" href="css/styleconnec.css">
    <title>Document</title>
</head>
<body>
    <header>
        <div class="logo"><img src="images/logo-fb-en.png" alt=""></div>
        <div class="ave">JOUEZ POUR UN MAX DE PLAISIR</div>
    </header>
    <article>
        <div class="b">Connexion</div>
        <br> <span><?php echo isset($arrayError['error']) ? $arrayError['error'] : '' ?></span>
        <form action="<?php echo WEB_ROUTE ?>" method="post">
        <input type="hidden" name="controller" value="securityController">
    <input type="hidden" name="action" value="connexion">
          <div>
              <input type="text" name="email" id="" placeholder="    Email">
              <br> <span><?php echo isset($arrayError['email']) ? $arrayError['email'] : '' ?></span>
          </div>
          <div>
              <input type="password" name="password" id="" placeholder="    Mot de passe">
              <br><span><?php echo isset($arrayError['password']) ? $arrayError['password'] : '' ?></span>
          </div>
            <button type="submit">Se connecter</button>
        </div>
    </form>
        <div class="e">Pas de Compte ?</div>
        <div class="f"><a href="<?php echo WEB_ROUTE."?controller=securityController&view=inscription"?>"> Inscription</a></div>
    </article>
    
    
</body>
</html> 