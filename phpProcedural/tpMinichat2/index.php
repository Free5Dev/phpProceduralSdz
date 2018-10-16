<?php 
    // les sessoins pour retenir le pseudo du visiteur
    session_start();
    // function de connexion à la bdd
    require_once("connexion.inc.php");
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
    $req=$bdd->query("SELECT * FROM minichat ORDER BY id DESC LIMIT ".$premierMessageAaffiche.", ".$nombreDeMessagesParPage);
    // si on clique sur le lien actualise on supprime la session qui retiens le pseudo
    if(isset($_GET['actualise'])){
        unset($_SESSION['pseudo']);
    }
    
   
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style.css"/>
    <title>Minichat</title>
</head>
<body>
    <h1>Welcom to the KBZ Tchat</h1>
    <form action="minichat_post.php" method="post">
        <fieldset >
            <legend>Connexion</legend>
            <label for="pseudo">Pseudo</label>
            <input type="text" name="pseudo" id="pseudo" value="<?php if(isset($_SESSION['pseudo'])) echo $_SESSION['pseudo']; ?>">
            <label for="message">Message</label>
            <textarea name="message" id="message" cols="30" rows="5"></textarea>
            <input type="submit" value="Poster !" id="btnPostule" name="btnPostule">
        </fieldset>
    </form>
    <p class="lien"><a href="index.php?actualise=ok">Actualisez !</a></p>
    <p class="img"><img  src="http://www.interieur.gouv.fr/var/miomcti/storage/images/media/police-nationale/images/tchat/495602-1-fre-FR/Tchat.jpg" alt="" srcset=""></p>
    <?php while( $donnees=$req->fetch()){ ?>
    <p class="p"><mark><?php echo htmlspecialchars($donnees['pseudo']); ?> :</mark> <?php echo nl2br(htmlspecialchars($donnees['message'])); ?></p>
    <?php } $req->closeCursor(); ?>
    <!--  -->
    <p class="page">
        <?php 
            echo"Page: ";
            for($i=1;$i<=$nombresDePages;$i++){
            echo '<a href="index.php?page=' . $i . '">' . $i . '</a> ';
            }
        ?>
    </p>
</body>
</html>