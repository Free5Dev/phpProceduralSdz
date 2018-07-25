<?php 
    //appel de la function de connexion à la bdd
    require_once("connexion.inc.php"); 
    // nombre de message qu'on veut dans une page
    $nombreDeMessageParPage=10;
    // on recupere le nombre total de message de billet
    $req=$bdd->query("SELECT COUNT(*) As nbr FROM billets");
    $donneesPages=$req->fetch();
    
    $totalDesMessages=$donneesPages['nbr'];
    // on calcul le nombre de pages à créer 
    $nombreDePage=ceil( $totalDesMessages/$nombreDeMessageParPage);
    // on verifi bien voir si $_GET['page'] est compris entre les valeurs de $nombreDeMessageParPage
    if( isset($_GET['page']) and  ($_GET['page']>0 and $_GET['page']<=$nombreDeMessageParPage)){
        $page = $_GET['page'];
       }else{
        $page=1;
       }
         // On récupère le numéro de la page indiqué dans l'adresse (livreor.php?page=4)
    
        
    // On calcule le numéro du premier message qu'on prend pour le LIMIT de MySQL
    $premierMessageAafficher = ($page - 1) * $nombreDeMessageParPage;
?>