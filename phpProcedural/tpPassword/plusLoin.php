<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style.css"/>
    <title>Page d'identification</title>
</head>
<body>
    <!-- si on arrive sur la page on considere que le btn n'as pas été soumis -->
    <?php 
        if(!isset($_POST['btnConnexion'])){
            ?>
                <div id="main_page">
                    <h1>Bienvenu sur la page d'identification</h1>
                    <p>Cette page est réservé aux Admin du site</p>
                    <p class="photo"><img src="http://www.sfu.ca/~lccheng/Project%202%20Final%20Website%20Complete/images/login.png" alt=""></p>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quasi placeat blanditiis quaerat dignissimos vitae. Vero velit dolore optio voluptas maiores. Vero aut neque minima voluptatum nostrum ab debitis molestiae odit.</p>
                    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                        <label for="login">Login</label>
                        <input type="text" name="login" id="login" placeholder="Ex: said">
                        <label for="password">Password</label>
                        <input type="password" name="password" id="password" placeholder=".....">
                        <input type="submit" value="Connexion" name="btnConnexion" class="btnConnexion">
                    </form>
                </div>
            <?php
        }else{
            // verification de des champs
            if(!empty($_POST['login']) and !empty($_POST['password'])){
                if($_POST['login']=="said" and $_POST['password']=="1234"){
                    ?>
                    <h1>Welcom Mr. <?php echo $_POST['login'];  ?></h1>
                    <p>Voici votre code secret : <mark>free5dev</mark></p>
                    <?php
                }else{
                    echo"Error d'identification";
                }
            }else{
                echo"Champs vide";
            }
        }
    ?>
    
    
</body>
</html>