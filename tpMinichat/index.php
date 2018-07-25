<?php   
   
    
    require("connexion.inc.php");
     // nombre de messages par page
     $nombreDeMessagesParPage=10;
     // on recupere le nombre total de message
     $reqNb=$bdd->query("SELECT COUNT(*) as nb FROM minichat");
     $donneesNb=$reqNb->fetch();
     $totalMessages=$donneesNb['nb'];
     // on calcul  le nombre de page à creer 
     $nombresDePages=ceil( $totalMessages/$nombreDeMessagesParPage);
     // puis on fait une boucle pour ecrire les liens vers chacunes des pages
    
    //  on va maintenant affiché les messages
    if(isset($_GET['page'])){
        $page=$_GET['page'];//on recupere le numero de la page indiquée à l'adresse

    }else{
        $page=1;//par defaut on se met sur la page 1
    }
    // on calcul le numero de la premiere page qu'on prend pour mysql
    $premierMessageAaffiche=($page-1)*$nombreDeMessagesParPage;
    // requete de selection à la bdd
    $reqSelect=$bdd->query("SELECT * FROM minichat ORDER BY id DESC LIMIT ".$premierMessageAaffiche.", ".$nombreDeMessagesParPage);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="post.php" method="post">
        <label for="pseudo">Pseudo</label><br/>
        <input type="text" name="pseudo" id="pseudo" value="<?php echo $_COOKIE['pseudo']; ?>"/><br/>
        <label for="message">Message</label><br/>
        <textarea name="message" id="message" cols="30" rows="10"></textarea><br/><br/>
        <input type="submit" name="btnSubmit" value="Poster">
        <input type="reset" name="btnAnnuler" value="Annuler">
        <a href="index.php">Actualiser</a>
    </form>
    <?php 
         echo"Page: ";
         for($i=1;$i<=$nombresDePages;$i++){
            echo '<a href="index.php?page=' . $i . '">' . $i . '</a> ';
         }
    ?>

    <?php while($donneesSelect=$reqSelect->fetch()) { ?>
    <p><mark><?php echo htmlspecialchars($donneesSelect['pseudo']); ?>:</mark> <?php echo nl2br(htmlspecialchars($donneesSelect['message'])); ?></p>
    <?php } $reqSelect->closeCursor(); ?>
</body>
</html>