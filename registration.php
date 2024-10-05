<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="icon" href="photo/logo.png">
    <title>Registration</title>
</head>
<body>
    <form method="POST" action="registration.php">
        <fieldset>
            <legend>Регистрация</legend>
            <p>Логин</p>
            <input type="text" name="login" placeholder="Придумайте логин">
            <p>Пароль</p>
            <input type="password" name="password" placeholder="Придумайте пароль">
        </fieldset>
        <input type="submit" value="Отправить">
    </form>

    <?php
        session_start();
        $basedate='Shop';
        $auth='root';
        $pass='';
        $host='localhost';

        $link=mysqli_connect($host, $auth, $pass, $basedate);

        if (!empty($_POST['login']) and !empty($_POST['password'])) {
            $login=$_POST['login'];
            $password=$_POST['password'];

            $query="INSERT INTO authorization SET login='$login', password='$password'";
            mysqli_query($link,$query);

            $veryfy="SELECT * FROM authorization WHERE login='$login' AND password='$password'";
            $result=mysqli_query($link, $veryfy);
            $user=mysqli_fetch_assoc($result);
            
            if (!empty($user)) {
                // Авторизация пройдена
                echo '<p class="verify">Регистрация пройдена успешно</p>';
                echo '<a href="auth.php">Вернуться на страницу входа</a>';

            } else {
                // Авторизация не пройдена
                echo '<p class="verify">Регистрация не пройдена</p>';
            }
        }
    ?>
    
</body>
</html>