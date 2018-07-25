<?php 
    // appel de la function de conenxion  à la bdd
    require_once("../connexion.inc.php");
    if(isset($_GET['ref'])){
        // requete de recuperation en fonction de get
        $reqRecup=$bdd->prepare("SELECT * FROM billets WHERE id=?");
        $reqRecup->execute(array($_GET['ref']));
        $donneesRecup=$reqRecup->fetch();
    }
    if(isset($_POST['btnSupprimer'])){
        if(!empty($_POST['titre'] and $_POST['contenu'])){
            $reqDelete=$bdd->prepare("DELETE FROM  billets WHERE id=?");
            $reqDelete->execute(array($_POST['id']));
            header("Location:index.php");
        }else{
            echo"Les champs sont obligatoires";
        }
     }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Modification de billets</title>
</head>
<body>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <label for="ID"></label><input type="hidden" name="id" id="id" value="<?php if(isset($_GET['ref'])) echo htmlspecialchars($donneesRecup['id']); ?>"><?php if(isset($_GET['ref'])) echo htmlspecialchars($donneesRecup['id']); ?>
        <label for="titre">Titre</label><br/>
        <input type="text" name="titre" id="titre" value="<?php if(isset($_GET['ref'])) echo htmlspecialchars($donneesRecup['titre']); ?>"><br/>
        <label for="contenu">Contenu</label><br/>
        <textarea name="contenu" id="contenu" cols="30" rows="10"><?php if(isset($_GET['ref'])) echo  nl2br(htmlspecialchars($donneesRecup['contenu'])); ?></textarea><br/>
        <input type="submit" name="btnSupprimer" value="Supprimer">
        <input type="reset" value="Annuler">
    </form>
    <?php  
        echo"<pre>";
        print_r($_POST);
        echo"</pre>";
    ?>
</body>
</html>