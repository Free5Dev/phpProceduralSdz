<?php 
    session_start();
    include "./connexion.inc.php";
    if(isset($_POST['btnAdd'])){
        if(!empty($_POST['auteur'] && $_POST['commentaire'])){
            $id=$_SESSION['id'];
            echo"<pre>";
            print_r($_POST);
            echo"</pre>";
            $stmt = $bdd->prepare("INSERT INTO commentaires SET id_billet=?, auteur=?, commentaire=?, date_commentaire=now()");
            $stmt->execute(array($_SESSION['id'], $_POST['auteur'], $_POST['commentaire']));
            $_SESSION['auteur'] = $_POST['auteur'];
            header("Location:./commentaires.php?id=$id");

        }else{
            echo"The fields is empty";
        }
    }else{
        header("location:./index.php");
    }
?>
