<?php
session_start();

if ($_SESSION['user']) {
    header('Location: authorized.php');
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
<!-- Форма регистрации -->

<form>
    <label>ФИО</label>
    <input type="text" name="full_name" placeholder="Введите свое полное имя">
    <label>Почта</label>
    <input type="email" name="email" placeholder="Введите адрес электронной почты">
    <label>Номер телефона</label>
    <input type="tel" name="phone_number" placeholder="9998887766" pattern="[0-9]{10}">
    <label>Дата рождения</label>
    <input type="date" name="birth_date" placeholder="Введите дату своего рождения">
    <label>ИНН</label>
    <input type="number" name="inn" placeholder="Введите свой ИНН" pattern="[0-9]{12}">
    <label>Пароль</label>
    <input type="password" name="password" placeholder="Введите пароль">
    <label>Подтверждение пароля</label>
    <input type="password" name="password_confirm" placeholder="Подтвердите пароль">
    <button type="submit" class="register-btn">Зарегистрироваться</button>
    <p>
        У вас уже есть аккаунт - <a href="/authorization.php">авторизируйтесь!</a>
    </p>
    <p class="msg none">Lorem</p>
</form>

<script src="../libs/jquery/dist/jquery.min.js"></script>
<script src="../js/main.js"></script>

</body>
</html>