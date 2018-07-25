<?php 
    if(isset($_POST['btn'])){
        if(!empty($_POST['password']) and $_POST['password']=='1234'){
            echo"Welcom";
        }else{
            echo"Incorrecte";
        }
    }else{
        header("Location:form.php");
    }
?>