<?php
    // appel de la function de connexion à la bdd
    require_once("../connexion.inc.php");
    if(isset($_POST['btnAjouter'])){
        if(!empty($_POST['titre'] and $_POST['contenu'])){
            $reqInsert=$bdd->prepare("INSERT INTO billets SET titre=?,contenu=?,date_creation=now()");
            $reqInsert->execute(array($_POST['titre'],$_POST['contenu']));
           header("Location:index.php");
        }else{
            echo"champs vide";
        }
    }
   
    //header("Location:index.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ajout d'un Billets</title>
</head>
<body>
    <form action="ajout.php" method="post">
        <label for="titre">Titre</label><br/>
        <input type="text" name="titre" id="titre" placeholder="Titre..."><br/>
        <label for="contenu">Contenu</label><br/>
        <textarea name="contenu" id="contenu" cols="30" rows="10" placeholder="Votre Contenu..."></textarea><br/>
        <input type="submit" name="btnAjouter" value="Ajouter">
        <input type="reset" name="btnAnnuler" value="Annuler">
    </form>
</body>
</html>