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
        // verification si le fichier à été envoyéet s'il n'ya pas d'erreur
        if(isset($_FILES['photo']) and $_FILES['photo']['error']==0){
            // verification si le fichier n'est pas trop gros
            if($_FILES['photo']['size']<=1000000){
                // testons si l'extension est autorisées
                $infosfichier=pathinfo($_FILES['photo']['name']);
                $extension_upload=$infosfichier['extension'];
                $extensions_autorisees=array('jpg','jpeg','gif','png');
                if(in_array($extension_upload,$extensions_autorisees)){
                    move_uploaded_file($_FILES['photo']['tmp_name'],'uploads/'.basename($_FILES['photo']['name']));
                    echo"vous avez téléchargez le fichier avec succès";
                   ?>
                    <img src="uploads/<?php echo $_FILES['photo']['name'];  ?>" alt="">
                   <?php
                }else{
                    echo "Vous avez télécharger un mauvais format";
                }
            }else{
                echo"Votre fichier est trop volumineux";
            }
        }else{
            echo"Aucun téléchargement n'as été fait";
        }
    ?>
</body>
</html>