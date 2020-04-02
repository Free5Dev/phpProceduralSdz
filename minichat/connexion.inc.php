<?php 
    try{
        $bdd = new PDO('mysql:host=localhost;dbname=sdz', 'root', '');
    }catch(Exception $e){
        print('Erreur:'.$e->getMessage());
        die();
    }
?>