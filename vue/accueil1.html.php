<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Animated Speedmetre Progress</title>
	<link rel="stylesheet" href="css/styleaccueil1.css">
</head>
<body>
<?php require_once(ROUTE_DIR.'vue/inc/menu.html.php'); ?>
<div class="a1">
            <div class="a11"><img src="images/uploads/<?php echo $_SESSION["userConnected"]["avatar"] ?>" alt="Pas de photo de Profil" class="ima"></div>
            <div class="a12">
            <div class="a22"><a href="<?php echo WEB_ROUTE.'?controller=formController&view=accueil'?>" class="a" style="color: black;">Créer Admin</a></div>
                <div class="a22"><a href="<?php echo WEB_ROUTE.'?controller=questionController&view=question'?>" class="a">Liste Questions</a></div>
                <div class="a22"><a href="<?php echo WEB_ROUTE.'?controller=userController&view=list.admin'?>" class="a">Liste Admin</a></div>
                <div class="a22"><a href="<?php echo WEB_ROUTE.'?controller=userController&view=list.user'?>" class="a">Liste Joueurs</a></div>
                <div class="a22"><a href="<?php echo WEB_ROUTE.'?controller=questionController&view=creerquestion'?>" class="a">Créer Questions</a></div>
            </div>
            <div class="a13"> <a href="<?php echo WEB_ROUTE.'?controller=securityController&view=deconnexion'?>"> <button class="BTN">Déconnexion</button> </a></div>
        </div>
            <div >
            <label for="" class="aa">Nom:<?php echo $_SESSION['userConnected']['prenom']?> </label> <br>
                  <label for=""  class="aa">Prenom: <?php echo $_SESSION['userConnected']['nom']?></label><br>
                  <label for=""  class="aa">E-mail: <?php echo $_SESSION['userConnected']['email']?></label><br>
                </div>  
	<div class="box">
		<div class="circle" data-dots="70" data-percent="90" style="--bgColor: #ff0070"></div>
		<div class="text">
			<h2>90%</h2>
			<small>Nombre de Joueurs</small>
		</div>
	</div>
	<div class="box">
		<div class="circle" data-dots="70" data-percent="70" style="--bgColor: red"></div>
		<div class="text">
			<h2>70%</h2>
			<small>Nombre d'Admins</small>
		</div>
	</div>
	<div class="box">
		<div class="circle" data-dots="70" data-percent="60" style="--bgColor: #4a337d"></div>
		<div class="text">
			<h2>60%</h2>
			<small>Nombre de Questions</small>
		</div>
	</div>
	<script "> 
    const circles = document.querySelectorAll('.circle');
circles.forEach(elem => {
    var dots = elem.getAttribute('data-dots')
    var marked = elem.getAttribute('data-percent');
    var percent = Math.floor(dots * marked / 100);
    var rotate = 360 / dots;
    var points = "";
    for (let i = 0; i < dots; i++) {
        points += `<div class="points" style="--i: ${i}; --rot: ${rotate}deg"></div>`;
    }
    elem.innerHTML = points;
    const pointsMarked = elem.querySelectorAll('.points');
    for (let i = 0; i < percent; i++) {
        pointsMarked[i].classList.add('marked')
    }
})
</script>
</body>
</html>