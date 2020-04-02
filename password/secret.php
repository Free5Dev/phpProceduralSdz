<?php 
    if(isset($_POST['btn'])){
        if(!empty($_POST['password'])){
            if($_POST['password'] == "kangourou"){
                ?>
                <h1>Welcome to secret Page</h1>
                <p>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Aliquam, inventore!
                    <mark>Secret</mark>
                </p>
                <?php
            }else{  
                echo"Error Identification";
            }
        }else{
            echo"Field is empty";
        }
    }else{
        header("Location:./index.php");
    }
?>