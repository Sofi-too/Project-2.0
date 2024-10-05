<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="icon" href="photo/logo.png">
    <title>Auth</title>
</head>
<body>
    <form method="POST" action="auth.php">
        <fieldset>
            <legend>Вход в учетную запись</legend>
            <p>Логин</p>
            <input type="text" name="login" placeholder="Введите логин">
            <p>Пароль</p>
            <input type="password" name="password" placeholder="Введите пароль">
        </fieldset>
        <input type="submit" value="Авторизоваться">
    </form>

    <a href="registration.php" class="registration">Регистрация</a>
    
    <?php
        session_start();
        $basedate='Shop';
        $auth='root';
        $pass='';
        $host='localhost';

        $link=mysqli_connect($host, $auth, $pass, $basedate);

        if (!empty($_POST['password']) and !empty($_POST['login'])) {
            $login=$_POST['login'];
            $password=$_POST['password'];
            
            $query="SELECT * FROM authorization WHERE login='$login' AND password='$password'";

            $result=mysqli_query($link, $query);

            $user=mysqli_fetch_assoc($result);

            if (!empty($user)) {
                // Авторизация пройдена
                $_SESSION['auth']=true;
                header('Location: index.php');
            } else {
                // Авторизация не пройдена
                echo '<p class="error">Неправильный логин или пароль</p>';
            }
        }
    ?>
</body>
</html>