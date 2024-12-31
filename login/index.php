<?php
    
    require 'user.php';
    $msg = '';
    if($_SERVER['REQUEST_METHOD'] == "POST") {
        session_start();
        $user = new User();
        if($_POST['username'] == $user->username
          && $_POST['password'] == $user->password) {
            $_SESSION['user'] = $user;
            header('Location: home.php');
          } else {
            $msg = "Username or Password Invalid!";
          }

    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=<, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="post">
        <label for="username">User Name</label>
        <input type="text" name = "username">
        <br><br>
        <label for="password">password</label>
        <input type="password" name = "password">
        <br><br>
        <input type="submit" value="Login">
        <br>
        <?=$msg?>
    </form>
</body>
</html>