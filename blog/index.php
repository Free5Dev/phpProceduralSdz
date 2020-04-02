<?php 
    include "./connexion.inc.php";
    $sql = "SELECT id, titre, contenu, date_format(date_creation, '%d/%m/%Y à %H:%i:%s') as date_fr FROM billets ORDER BY id DESC";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog | PHP</title>
</head>
<body>
    <?php foreach ($bdd->query($sql) as $row) { ?>
    <div>
        <h1><?php echo htmlspecialchars($row['titre']." ".$row['date_fr']); ?></h1>
        <p><?php echo htmlspecialchars($row['contenu']); ?></p>
        <a href="commentaires.php?id=<?php echo $row['id']; ?>">Commentaires</a>
    </div>
    <?php } ?>
</body>
</html>