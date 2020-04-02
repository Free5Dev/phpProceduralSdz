<?php 
    session_start();
     include "./connexion.inc.php";
     $sql = "SELECT * FROM minichat ORDER BY id DESC LIMIT 10";
     if(isset($_GET['params'])){
         unset($_SESSION['pseudo']);
     }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Minichat | Formulaire</title>
</head>
<body>
    <form action="post.php" method="post">
        <div>
            <label for="pseudo">Pseudo</label>
            <input type="text" name="pseudo" id="pseudo" value="<?php if(isset($_SESSION['pseudo'])) echo $_SESSION['pseudo'];  ?>">
        </div>
        <div>
            <label for="message">Message</label><br>
            <textarea name="message" id="message" cols="30" rows="10"></textarea>
        </div>
        <input type="submit" value="ADD" id="add" name="add">
        <a href="index.php?params=ok">Actualiser</a>
    </form>
    <?php 
        foreach  ($bdd->query($sql) as $row) {
            ?>
            <h3><?php echo htmlspecialchars($row['id']); ?> - <?php echo htmlspecialchars($row['pseudo']); ?></h3>
            <p><?php echo htmlspecialchars($row['message']); ?></p>
            <?php
        }
    ?>
</body>
</html>