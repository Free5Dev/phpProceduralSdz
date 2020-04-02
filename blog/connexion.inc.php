<?php 
    try{
        $bdd = new PDO('mysql:host=localhost;dbname=sdz;charset=utf8', 'root', '');
    }catch(Exception $e){
        die('Erreur:'.$e->Message());
    }
?>