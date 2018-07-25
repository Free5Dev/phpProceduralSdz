<?php 
    if(isset($_POST['btnConnexion'])){
        if(!empty($_POST['pseudo'] and $_POST['password'])){
            $pseudo=$_POST['pseudo'];
            $password=$_POST['password'];
            $hash= crypt($password);//on crypte le password
            echo"Le mots de passe avant le cryptage est:".$_POST['password']." et crypter est: ".$hash."<br/>";
            echo" la ligne qui doit être copiée dans .htpasswd est:<br/>".$pseudo.":".$hash;
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
    <title>Formulaire de cryptage de mots de passe</title>
</head>
<body>
    <h1>Crypter votre mots de passe facilement</h1>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <label for="pseudo">Pseudo</label><br/>
        <input type="text" name="pseudo" id="pseudo" placeholder="Ex:Said..."><br/>
        <label for="password">Password</label><br/>
        <input type="password" name="password" id="password"><br/><br/>
        <input type="submit" name="btnConnexion" value="Connexion"/>
        <input type="reset" value="Annuler">
    </form>
    <?php 
        echo"<pre>";
        print_r($_POST);
        echo"</pre>";
    ?>

</body>
</html>