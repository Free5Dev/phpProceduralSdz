<?php 
    session_start();
    include "./connexion.inc.php";
    if(isset($_GET['id'])){
        $stmt = $bdd->prepare("SELECT id, titre, contenu, date_format(date_creation, '%d/%m/%Y à %H:%i:%s') as date_fr FROM billets WHERE id= ?");
        $stmt->execute(array($_GET['id']));
        $row = $stmt->fetch();
        //query commentaire
        $stmtComment = $bdd->prepare("SELECT auteur, commentaire, date_format(date_commentaire, '%d/%m/%Y à %H:%i:%s') as date_commentaire FROM commentaires WHERE id_billet = ? ORDER BY id DESC");
        $stmtComment->execute(array($_GET['id']));
        $_SESSION['id'] = $_GET['id'];


        // echo"<pre>";
        // print_r($rowComment);
        // echo"</pre>";

    }else{
        header("Location:./index.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog | PHP</title>
</head>
<body>
    <a href="./index.php">Return</a>
    <div>
        <h1><?php echo $row['titre']." ".$row['date_fr']; ?></h1>
        <p><?php echo $row['contenu']; ?></p>
    </div>
    <form action="postCommentaire.php" method="post">
        <div>
            <label for="auteur">Auteur</label>
            <input type="text" name="auteur" id="auteur" value="<?php if(isset($_SESSION['auteur'])) echo $_SESSION['auteur']; ?>">
        </div>
        <div>
            <label for="commentaire">Commentaire</label><br>
            <textarea name="commentaire" id="" cols="30" rows="10"></textarea>
        </div>
        <input type="submit" value="ADD" name="btnAdd" id="btnAdd">
    </form>
    <h2>Commentaires</h2>
    <?php foreach($stmtComment->fetchAll() as $rowComment) { ?>
    <div>
        <h5><mark><?php echo $rowComment['auteur']; ?></mark>: le <?php echo $rowComment['date_commentaire']; ?></h5>
        <p><?php echo nl2br(htmlspecialchars($rowComment['commentaire'])) ?></p>
    </div>
    <?php } ?>
</body>
</html>