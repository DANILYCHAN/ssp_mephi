<?php
session_start();

if ($_SESSION['user']) {
    header('Location: index.php');
}

?>

<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="utf-8">
    <title>Авторизация и регистрации</title>
    <link rel="stylesheet" href="css/authorization.css">

    <link rel="icon" href="img/favicon/favicon.ico" type="image/x-icon">
    <link rel="shortcut icon" href="img/favicon/favicon.ico" type="image/x-icon">
</head>
<body>

<!-- Форма авторизации -->

<form>
    <label>Email</label>
    <input type="text" name="email" placeholder="Введите email">
    <label>Пароль</label>
    <input type="password" name="password" placeholder="Введите пароль">
    <button type="submit" class="login-btn">Войти</button>
    <p>
        У вас нет аккаунта - <a href="/register.php">зарегистрируйтесь!</a>
    </p>

    <p class="msg none">Lorem ipsum dolor sit amet.</p>

</form>

<script src="../libs/jquery/dist/jquery.min.js"></script>
<script src="../js/main.js"></script>


</body>
</html>