<?php
    include_once('Database/connection.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="img/photo-1618588845382-4267677cfc11.jpg" type="image/x-icon">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Top Security</title>
</head>
<body>
    <div class="main">
        <div class="loginform">
            <form action="loginlogic.php" method="post">
                
                <?php if(isset($_SESSION['success'])):?>
                    <div class="success">
                        <?=$_SESSION['success'];
                        unset($_SESSION['success']); ?> <br><br>
                    </div>
                <?php endif ?>

                <?php if(isset($_SESSION['error'])):?>
                    <div class="error">
                        <?=$_SESSION['error'];
                        unset($_SESSION['error']); ?> <br><br>
                    </div><br><br>
                <?php endif ?>


                <label for="usernamme">USERNAME:</label>
                <input type="text" name="username"><br><br>
                <label for="password">PASSWORD:</label>
                <input type="password" name="password"><br>
                <input type="submit" id="submit" name="submit">
            </form>

            <div class="orpart">
                OR SIGN IN WITH
            </div>  

            <div class="otheroption">
                <div class="google">
                    <i class="fa-brands fa-google"></i>
                    <b>GOOGLE</b>
                </div>
                <div class="github">
                    <i class="fa-brands fa-github"></i>
                    <B>GITHUB</B>
                </div>
            </div>
        </div>

        <div class="orpart">
           No account? <a href="create.php">CLICK HERE</a> to create new
           <br>Forgot password? <a href="forgot.php">CLICK HERE</a>
        </div>
       
    </div>
</body>
</html>