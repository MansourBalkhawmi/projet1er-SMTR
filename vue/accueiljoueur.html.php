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
<div class="a"> Lorem ipsum dolor sit amet consectetur adipisicing elit. Error natus aliquid aperiam commodi, vel laudantium molestiae enim, libero ipsa quasi consequatur inventore minus laboriosam quis. Qui recusandae soluta facilis consequuntur.
    Lorem ipsum dolor sit amet consectetur adipisicing elit. Quaerat, pariatur numquam eos rem laborum sed assumenda beatae maiores ullam optio voluptate, corrupti repellat maxime iusto vitae quos libero, possimus a.
</div>
<div class="b"> <a href="<?php echo WEB_ROUTE.'?controller=questionController&view=jouer'?>"> <button>Cliquez pour jouer</button></a></div>
</section>
</body>
</html>