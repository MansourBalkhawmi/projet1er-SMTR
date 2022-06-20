

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/styleaffiche.css">
</head>
<body>
    <?php require_once(ROUTE_DIR.'vue/inc/menu.html.php'); ?>
    <div class="header">
        <div class="a1">
        <div class="a11"><img src="images/uploads/<?php echo $_SESSION["userConnected"]["avatar"] ?>" alt="Pas de photo de Profil" class="ima"></div>
            <div class="a12">
            <div class="a22"><a href="<?php echo WEB_ROUTE.'?controller=formController&view=accueil'?>" class="a">Créer Admin</a></div>
            <div class="a22"><a href="<?php echo WEB_ROUTE.'?controller=questionController&view=question'?>" class="a">Liste Questions</a></div>
                <div class="a22"><a href="<?php echo WEB_ROUTE.'?controller=userController&view=list.admin'?>" class="a" style="color: black;">Liste Admin</a></div>
                <div class="a22"><a href="<?php echo WEB_ROUTE.'?controller=userController&view=list.user'?>" class="a">Liste Joueurs</a></div>
                <div class="a22"><a href="<?php echo WEB_ROUTE.'?controller=questionController&view=creerquestion'?>" class="a">Créer Questions</a></div>
            </div>
            <div class="a13"> <a href="<?php echo WEB_ROUTE.'?controller=securityController&view=deconnexion'?>"> <button>Déconnexion</button> </a></div>
        </div>
        <div class="a2">
            <div class="a21">
            <?php if(empty($users)):?>
        <h1>Aucun résultat</h1>
     <?php endif;?>
     <?php if(!empty($users)): ?>
            <table>
                <tr>
                    <th>Nom</th>
                    <th>Prénom</th>
                    <th>Email</th>
                    <th>Action</th>
                </tr>
                <?php foreach ($users as $key => $val):?>
                    <?php if($val['role'] == 'ROLE_Admin'): ?>
                    <tr>
                        <td><?php echo $val['nom'];?></td>
                        <td><?php echo $val['prenom'];?></td>
                        <td><?php echo $val['email'];?></td>
                        <td>
                           <div class="but1">
                            <a href="<?= WEB_ROUTE.'/?controller=userController&view=delete&id='.$val['id']?>"><button class="but2""> effacer</button></a>
                            <a href="<?= WEB_ROUTE.'/?controller=securityController&view=edit&id='.$val['id']?>"><button class="but"> Modifier</button></a>
                            </div>
                        </td>
                       
                    </tr>
                    <?php endif;?>
                <?php endforeach;?>
            </table>
         <?php endif;?>
         <div  class="pagination">
         <?php for($i = 1; $i <= $totalPage; $i++):?>
       <a href="<?= WEB_ROUTE.'/?controller=userController&view=list.admin&page='.$i.''?>">
       <button class="mm"><?php echo $i; ?></button> 
   </a>
       <?php endfor;?>
       </div>
            </div>
        </div>
        </div>
        <style>
        .mm{
       width: 30px;
       background-color: #775AB7;
       color: white;
       margin: 10px;
        } 
        .pagination{
            margin-left: 45%;
            margin-top: 15px;
        }
       </style>
</body>
</html>