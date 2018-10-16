<?php 
     // les sessoins pour retenir le pseudo du visiteur
     session_start();
    // appel de la function de connexion à la bdd
    require_once("connexion.inc.php");
    // verification de la soumission du formulaire
    if(isset($_POST['btnPostule'])){
        // verification de l'insertion des données dans les champs
        if(!empty($_POST['pseudo'] and $_POST['message'])){
            $_SESSION['pseudo']=$_POST['pseudo'];
            // requete d'insertion à la bdd
            $reqInsert=$bdd->prepare("INSERT INTO minichat (pseudo,message) VALUES (?,?)");
            $reqInsert->execute(array($_POST['pseudo'],$_POST['message']));
            header("Location: index.php");
        }else{
            echo"Veuillez saisir tous les champs afin de pouvoir postuler votre message ";
        }
    }else{
        header("Location: index.php");
    }
?>