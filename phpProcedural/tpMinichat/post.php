<?php 
   require_once("connexion.inc.php");
   if(isset($_POST['btnSubmit'])){
        if(!empty($_POST['pseudo'] and $_POST['message'])){
            $reqInsert=$bdd->prepare("INSERT INTO minichat SET pseudo=?,message=?");
            $reqInsert->execute(array($_POST['pseudo'],$_POST['message']));
            setcookie("pseudo",$_POST['pseudo'],time()+365*24*3600,null,null,false,true);
            header("Location:index.php");
        }else{
            echo"Champs sont obligatoires";
        }
   }else{
       header("Location:index.php");
   }
>>>>>>> master
?>