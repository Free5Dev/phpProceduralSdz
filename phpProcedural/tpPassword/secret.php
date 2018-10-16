<?php 
    // si soumission de formulaire
    if(isset($_POST['btnConnexion'])){
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
            header("Location:index.php");
        }
    }else{
        header("Location:index.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style.css"/>
    <title>Document</title>
</head>
<body>
    
</body>
</html>