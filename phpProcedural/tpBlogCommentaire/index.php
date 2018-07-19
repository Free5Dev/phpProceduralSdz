<?php 
    require_once("connexion.inc.php");
    require_once("Pagination.php");
    $reqSelect=$bdd->query("SELECT id,titre,contenu,date_format(date_creation,'Le %d/%m/%Y à %Hh:%imin:%ss') as dateCreation FROM billets ORDER BY id DESC LIMIT ".$premierMessageAafficher.", ".$nombreDeMessageParPage);
    
   
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tp- Blog php Commentaires</title>
</head>
<body>
    <?php while($donneesSelect=$reqSelect->fetch()) { ?>
    <h1><?php echo htmlspecialchars($donneesSelect['titre']." ".$donneesSelect['dateCreation']); ?></h1>
    <p><?php echo nl2br(htmlspecialchars($donneesSelect['contenu'])) ?></p>
    <p><a href="commentaires.php?ref=<?php echo htmlspecialchars($donneesSelect['id']); ?>">Commentaires</a></p>
    <?php } $reqSelect->closeCursor(); ?>
    <?php  
        echo 'Page : ';
        for ($i = 1 ; $i <= $nombreDePage ; $i++)
        {
            echo '<a href="index.php?page=' . $i . '">' . $i . '</a> ';
            
        }
    ?>
</body>
</html>