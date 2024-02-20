<?php
    include_once('Database/connection.php');

    if(isset($_POST['submit'])){
        $username=filter_var($_POST['username'],FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $email=filter_var($_POST['email'],FILTER_VALIDATE_EMAIL);
        $contact=filter_var($_POST['contact'],FILTER_VALIDATE_INT);
        $passwd=filter_var($_POST['password'],FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $cfmpasswd=filter_var($_POST['confirmpassword'],FILTER_SANITIZE_FULL_SPECIAL_CHARS);

        if(!$username){
            $_SESSION['error']="Username cannot be blank";
        }elseif(!$email){
            $_SESSION['error']="Email cannot be blank";
        }elseif(!$contact){
            $_SESSION['error']="Contact cannot be blank";
        }elseif(!$passwd){
            $_SESSION['error']="Password cannot be blank";
        }elseif(!$cfmpasswd){
            $_SESSION['error']="Confirm Password cannot be blank";
        }else{
                if($passwd!=$cfmpasswd){
                    $_SESSION['error']="Passwords did not match";
            }else{
                $query="SELECT * FROM users WHERE email='$email' OR username='$username'";
                $queryresult=mysqli_query($conn,$query);

                if(mysqli_num_rows($queryresult)>0){
                    $_SESSION['error']="A user with the email or username provided already exists";

                }else{
                    $hashedpassword=password_hash($passwd,PASSWORD_DEFAULT);
                    $adduser="INSERT INTO users (username,email,contact,passwd) VALUES('$username','$email','$contact','$hashedpassword')";

                    mysqli_query($conn,$adduser);

                    $_SESSION['success']="accont created successfully ,you can now login";
                    $_SESSION['email']=$_POST;
                    header('location:'.'create_successemail.php');
                
            }
            }
        }

        if($_SESSION['error']){
            header('location:'.'create.php');
            die();
        }

    }