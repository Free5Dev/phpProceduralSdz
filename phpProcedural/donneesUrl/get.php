<?php 
    //    verification de l'existance des variable get
    if(isset($_GET['nom']) AND isset($_GET['prenom']) AND isset($_GET['repet'])){
       //on force la conversion de $_GET['ref'] en nombre entier
       $_GET['repet']=(int) $_GET['repet'];//on fait le casting de  $_GET['ref']
        // on defini un intervall de nombre pour le  $_GET['ref']
        if( $_GET['repet']>=1 AND  $_GET['repet']<=100){
            for($i=0;$i<$_GET['repet'];$i++){
                echo"Bonjour Mr: ".$_GET['nom']." ".$_GET['nom']."<br/>";
            }
        }else{
            echo"Le nom de repetition  doit etre compris entre 1 et 100";
        }
    }else{
        header("Location:index.php");
    }
?>