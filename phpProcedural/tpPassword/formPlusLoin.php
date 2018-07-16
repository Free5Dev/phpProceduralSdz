<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <?php 
        if(!isset($_POST['btn'])){
            ?>
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" >
                <label for="password">Password</label>
                <input type="password" name="password" id="password" placeholder="...."/>
                <input type="submit" name="btn" value="Connexion"/>
            </form>
            <?php
        }else{
            if(!empty($_POST['password']) and $_POST['password']=='1234'){
                echo"Welcom";
            }else{
                echo"Incorrecte ou champs vide";
            }
        }
    ?>
</body>
</html>