<?php
    // traitement des erreurs
    try{
        $bdd=new PDO('mysql:host=localhost;dbname=sdz;charset=utf8','root','',array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));
    }catch(Exception $e){
        // encas d'erreur on arrrete tous et on sort de la boucle
        die('Erreur:'.$e->getMessage());
    }
?>