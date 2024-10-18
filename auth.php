<?php
    session_start();
    $basedate='project';
    $auth='root';
    $pass='';
    $host='localhost';

    $link=mysqli_connect($host, $auth, $pass, $basedate);

    if (!empty($_POST['password']) and !empty($_POST['login'])) {
        $login=$_POST['login'];
        $password=$_POST['password'];
                
        $query="SELECT * FROM auth WHERE login='$login' AND password='$password'";

        $result=mysqli_query($link, $query);

        $user=mysqli_fetch_assoc($result);

        if (!empty($user)) {
            // Авторизация пройдена
            $_SESSION['auth']=true;
            header('Location: index-auth.html');
        } else {
                // Авторизация не пройдена
            echo '<p class="error">Неправильный логин или пароль</p>';
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="bootstrap/css/bootstrap.css">
        <link rel="stylesheet" href="auth.css">
        <link rel="icon" href="photo/logo.png">
        <title>Auth</title>
    </head>
    <body>
        
        <form method="POST" action="auth.php">
            <fieldset>
            <legend>Вход в учетную запись</legend>
                <div class="mb-3">
                    <label class="form-label">Логин</label>
                    <input type="text" class="form-control" name="login">
                </div>
                <div class="mb-3">
                    <label class="form-label">Пароль</label>
                    <input type="password" class="form-control" name="password">
                </div>
            </fieldset>
            <input type="submit" value="Авторизоваться">
            <a href="registration.php" class="registration">Регистрация</a>
        </form>
    </body>
</html>
    
    