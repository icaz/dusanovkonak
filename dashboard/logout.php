<?php
    session_start();
    setcookie("email", "", time()-3600);
    unset($_SESSION['logged_in']);
    unset($_SESSION['email']);
    unset($_SESSION['nick']);
    unset($_SESSION['cart']);
    
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Error</title>
    <?php include 'css/css.html'; ?>
</head>
<body>
    <div class="form">
        <?php 
            //setcookie('email', $_POST['email'], 1);
            //setcookie('password', password_hash($_POST['password'], PASSWORD_BCRYPT), 1);
            var_dump($_SESSION);
          	//header("location: /dashboard/");
        ?>
    </div>
</body>
</html>