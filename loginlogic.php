<?php
    include_once('Database/connection.php');

    if(isset($_POST['submit'])){
        $username=filter_var($_POST['username'],FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $passwd=filter_var($_POST['password'],FILTER_SANITIZE_FULL_SPECIAL_CHARS);

        if(!$username){
            $_SESSION['error']="Username cannot be blank";
        }elseif(!$passwd){
            $_SESSION['error']="Password cannot be blank";
        }else{
            $dbhash="SELECT * FROM users WHERE username='$username'";
            $hash=mysqli_query($conn,$dbhash);


            if(mysqli_num_rows($hash)==1){
                $record=mysqli_fetch_assoc($hash);
                $passhash=$record['passwd'];

                if(password_verify($passwd,$passhash)){
                    $_SESSION['id']=$record['id'];
                }else{
                    $_SESSION['error']="Wrong password";
                }
            }else{
                $_SESSION['error']="Username not found";
            }

            
        }

        if(isset($_SESSION['error'])){
            header('location:'.'login.php');
            die();
        }
        
        if(isset($_SESSION['id'])){
            header('location:'.'loggedin.php');
            die();
        }

    }