<?php  
    session_start();
    include "./connexion.inc.php";
    if(isset($_POST['add'])){
        if(!empty($_POST['pseudo'] && $_POST['message'])){
            $_SESSION['pseudo'] = $_POST['pseudo'];
            $stmt = $bdd->prepare("
                INSERT INTO minichat SET 
                pseudo = :pseudo,
                message = :message
            ");
            $stmt->bindParam(':pseudo', $_POST['pseudo']);
            $stmt->bindParam(':message', $_POST['message']);

            $stmt->execute();
            header("Location:index.php");

        }else{
            echo"It's not possible because the field is empty";
        }
    }
?>