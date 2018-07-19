<?php 
    session_start();
    $ref=$_SESSION['ref'];
    require_once("connexion.inc.php");
    if(isset($_POST['btnPostuler'])){
        if(!empty($_POST['auteur'] and $_POST['commentaire'])){
            $reqInsert=$bdd->prepare("INSERT INTO commentaires (id_billet,auteur,commentaire,date_commentaire) VALUES (?, ?, ?, NOW())");
           $reqInsert->execute(array($ref,$_POST['auteur'],$_POST['commentaire']));
           setcookie("auteur",$_POST['auteur'],time()+10,null,null,false,true);
           header("Location:commentaires.php?ref=$ref");
          
        }else{
            header("Location:commentaires.php?ref=$ref");
            $_SESSION['champs']="Les champs sont obligatoires";
        }
    }else{
       header("Location:index.php");
      
    }
?>