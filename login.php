<?php

include "db.php";

session_start();
if(isset($_POST{'btnLogin'})) {
    $username = $_POST['user'];
    $wachtwoord = $_POST['pass'];


    $query = "SELECT * FROM login WHERE gebruiker = '$username' AND wachtwoord = '$wachtwoord'";
    $stm = $connection->prepare($query);
    $stm->execute();
    $login = $stm->fetch(PDO::FETCH_OBJ);


    if($login != false) {
        $_SESSION['login'] = $login;
        Header("location: index.php");
    } else {
        echo ("gebruikers en/of wachtwoord is onjuist");
    }

}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="stylesheet.css">
</head>
<body>
<form method="post">
    <div class="login-box">
        <h1>Login</h1>
        <div class="box">
            <i class="fas fa-user"></i>
            <input type="text" name="user" placeholder="Username">
        </div>

        <div class="box">
            <i class="fas fa-lock"></i>
            <input type="password" name="pass" placeholder="Password">
        </div>

        <input type="submit" class="btn" name="btnLogin" value="Sign in">
    </div>
</form>
</body>
</html>