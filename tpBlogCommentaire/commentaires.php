 <?php 
    session_start();
    $_SESSION['ref']=$_GET['ref'];
    require_once("connexion.inc.php");
    require_once("Pagination.php");
    if(isset($_GET['ref'])){
       
        $reqSelectComment=$bdd->prepare("SELECT titre,contenu,date_format(date_creation,'Le %d/%m/%Y à %Hh:%imin:%ss') as dateCreation FROM billets WHERE id=?");
        $reqSelectComment->execute(array($_GET['ref']));
        $donneesSelectComment=$reqSelectComment->fetch();
        if(empty($donneesSelectComment)){//si le billet n'existe pas on le redirige
            header("Location:index.php");
        }
    }else{
        header("Location:index.php");
    }
    // requete des commentaires d'un billet du blog
    $reqBilletsComment=$bdd->prepare("SELECT c.id,c.id_billet,c.auteur,c.commentaire,date_format(date_commentaire,'Le %d/%m/%Y à %Hh:%imin:%ss') as date_commentaire FROM commentaires as c INNER JOIN billets as b ON c.id_billet=b.id WHERE c.id_billet=".$_SESSION['ref']." ORDER BY id DESC  ");
    $reqBilletsComment->execute(array($_SESSION['ref']));
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tp Blog php et commentaires</title>
</head>
<body>
    <h1>Formulaire d'ajout de commentaire</h1>
    <?php
        if(isset($_SESSION['champs'])){
            echo $_SESSION['champs'];//on affiche champs vide
            unset($_SESSION['champs']);//on detruit la session
        } 
     
     ?>
    <form action="commentaires_post.php" method="post">
        <label for="auteur">Auteur</label><br/>
        <input type="text" name="auteur" id="auteur" value="<?php if(isset($_COOKIE['auteur'])) echo $_COOKIE['auteur']; setcookie("auteur"); ?>" ><br/>
        <label for="commentaire">Commentaire</label><br/>
        <textarea name="commentaire" id="commentaire" cols="30" rows="10"></textarea><br/>
        <input type="submit" name="btnPostuler" value="Poster"/>
        <input type="reset" name="btnAnnuler" value="Annuler"/>
    </form>
    <h1><?php echo htmlspecialchars($donneesSelectComment['titre']." ".$donneesSelectComment['dateCreation']); ?></h1>
    <p><?php echo nl2br(htmlspecialchars($donneesSelectComment['contenu'])) ?></p>
    <h3>Commentaires</h3>
    
    <!-- affichage des commentaires en php et de ses billets -->
    <?php while($donneesBilletsComment=$reqBilletsComment->fetch()) { ?>
        <p>----------------------------------------------------------------------------</p>

    <p><strong><?php echo htmlspecialchars($donneesBilletsComment['auteur']); ?>:</strong> <?php echo htmlspecialchars($donneesBilletsComment['date_commentaire']); ?></p>
    <p><?php echo htmlspecialchars($donneesBilletsComment['commentaire']); ?></p>
    <?php } $reqBilletsComment->closeCursor(); ?>
    
</body>
</html>