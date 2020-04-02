<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resume | Formulaire</title>
</head>
<body>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <div>
            <label for="password">Password</label><br>
            <input type="text" name="password" id="password">
        </div>
        <br>
        <input type="submit" value="Connexion" name="btn" id="btn">
    </form>
    <?php 
        if(isset($_POST['btn'])){
            if(!empty($_POST['password'])){
                if($_POST['password'] == "kangourou"){
                    ?>
                    <h1>Welcome to secrect Naza</h1>
                    <p>
                        Lorem ipsum dolor, sit amet consectetur adipisicing elit. Provident, sapiente.
                        <mark>S3CR3T</mark>
                    </p>
                    <?php
                }else{
                    echo"Error Identification";
                }
            }else{
                echo"Field is empty";
            }
        }
    ?>
</body>
</html>