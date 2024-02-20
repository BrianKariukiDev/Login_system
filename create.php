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

        
                 <?php if(isset($_SESSION['error'])):?>
                    <div class="error">
                        <?=$_SESSION['error'];
                        unset($_SESSION['error']); ?> <br><br>
                    </div><br><br>
                <?php endif ?>


            <form action="createlogic.php" method="post">
                <label for="usernamme">USERNAME:</label>
                <input type="text" name="username"><br><br>
                <label for="email">EMAIL:</label>
                <input type="text" name="email"><br><br>
                <label for="phone">CONTACT:</label>
                <input type="text" name="contact"><br><br>
                <label for="password">PASSWORD:</label>
                <input type="password" name="password"><br><br>
                <label for="confirm password">CONFIRM PASSWORD:</label>
                <input type="password" name="confirmpassword"><br><br>
                <input type="submit" id="submit" name="submit">
            </form>
        </div>

        <div class="orpart">
           Already have an account? <a href="login.php">CLICK HERE</a> to login
        </div>
       
    </div>
</body>
</html>