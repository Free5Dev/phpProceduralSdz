<?php 
    // appel de la function de connexion à la bdd
    require_once("../connexion.inc.php");
    $reqGestion=$bdd->query("SELECT id,titre  FROM billets ORDER BY id DESC");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Gestion Admin</title>
</head>
<body>
    <h1>Welcom to page gestion billets</h1>
    <p><a href="ajout.php">Ajout de billet</a></p>
    <table border="1" width="600" cellspacing="0" cellspadding="1">
        <tr>
            <th>Titre</th>
            <th>Modif</th>
            <th>Supprim</th>
        </tr>
        <?php while($donneesGestion=$reqGestion->fetch()) { ?>
        <tr>
            <td><?php echo htmlspecialchars($donneesGestion['titre']); ?></td>
            <td><a href="modif.php?ref=<?php echo htmlspecialchars($donneesGestion['id']); ?>">Modif</a></td>
            <td><a href="supprime.php?ref=<?php echo htmlspecialchars($donneesGestion['id']); ?>">Supprim</a></td>
        </tr>
        <?php } $reqGestion->closeCursor(); ?>
    </table>
</body>
</html>