<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/stylejoueur.css">
    <title>Document</title>
</head>
<body>
<?php require_once(ROUTE_DIR.'vue/inc/menu.html.php'); ?>
<section>
<div class="a">  <h1>BIENVENUE  sur notre QUIZ</h1>
<br><br>
Bienvenue cher(e) compétiteur (se) sur Challenge Brain qui est un quizz qui vous permet de tester votre Culture Générale dans tous les domaines et vous donne l’occasion d’acquérir plus de savoir et de connaissance.
</div>
<div class="b"> <a href="<?php echo WEB_ROUTE.'?controller=questionController&view=jouer'?>"> <button>Cliquez pour jouer</button></a></div>
</section>
</body>
</html>