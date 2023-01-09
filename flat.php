<?php
session_start();
?>

<!DOCTYPE html>
<html lang="ru">

<head>

    <meta charset="utf-8">

    <title>Страхование квартиры</title>
    <meta name="description" content="Страховка квартиры.">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <link rel="icon" href="img/favicon/favicon.ico" type="image/x-icon">
    <link rel="shortcut icon" href="img/favicon/favicon.ico" type="image/x-icon">

    <!-- Chrome, Firefox OS and Opera -->
    <meta name="theme-color" content="#36A26B">
    <!-- Windows Phone -->
    <meta name="msapplication-navbutton-color" content="#36A26B">
    <!-- iOS Safari -->
    <meta name="apple-mobile-web-app-status-bar-style" content="#36A26B">

    <style>body {
            opacity: 0;
            overflow-x: hidden;
        }

        html {
            background-color: #fff;
        }</style>

</head>
<body>

<header>
    <a href="/" class="logo"><img src="/img/logo.png" alt=""></a>
    <div class="right_header"></div>
    <ul class="mnu_top">
        <li><a href="/casco.php">Автострахование</a></li>
        <li><a href="#">Здоровье</a></li>
        <li><a href="/flat.php">Квартира</a></li>
    </ul>
    <div class="btns">
        <?php if (!$_SESSION['user']) { ?>
            <a href="/authorization.php" class="btn_light">Вход</a>
            <a href="/register.php" class="btn_green">Регистрация</a>
        <?php } else { ?>
            <a href="/authorized.php" class="btn_light">Профиль</a>
            <a href="vendor/logout.php" class="btn_green">Выход</a>
        <?php } ?>
    </div>
    </div>
</header>

<section>
    <div class="container" style="margin-top: -10px;">
        <header>
            <div class="col-md-9 col-sm-12 col-md-offset-1">
                <div class="page-header"><h1>Расчет стоимости страхования квартиры</h1></div>
            </div>
        </header> <!-- end article header -->

        <div class="main">
            <div class="calculations">
                <form class="choose_params">

                    <label>Страховая сумма:</label>
                    <select name="sum_of_ins" id="sum_of_ins" class="osago">
                        <option value="1">700 000 Р.</option>
                        <option value="2">1 000 000 Р.</option>
                        <option value="3">1 500 000 Р.</option>
                    </select>
                    </br>
                    <label>Отделка:</label>
                    <select name="otdelka" id="otdelka" class="osago">
                        <option value="1">400 000 Р.</option>
                        <option value="2">600 000 Р.</option>
                        <option value="3">600 000 Р.</option>
                    </select>
                    </br>
                    <label>Домашнее имущество:</label>
                    <select name="property" id="property" class="osago">
                        <option value="1">150 000 Р.</option>
                        <option value="2">200 000 Р.</option>
                        <option value="3">300 000 Р.</option>
                    </select>
                    </br>
                    <label>Гражданская ответственность:</label>
                    <select name="otvetstvenntost" id="otvetstvenntost" class="osago">
                        <option value="1">150 000 Р.</option>
                        <option value="2">200 000 Р.</option>
                        <option value="3">400 000 Р.</option>
                    </select>
                    </br>
                    <button type="submit" class="calculation-flat-btn">Расчет стоимости страховки</button>
                    <!--            <div class="calculated_sum"><p class="msg none">Lorem ipsum dolor sit amet.</p></div>-->
                </form>
            </div>
            <div class="calculated_flat_sum">
                <p class="msg none">Lorem ipsum dolor sit amet.</p>
                <?php if (!$_SESSION['user']) { ?>
                    <button class="contract_execution-btn contract_execution-btn-register none" onclick="window.location.href = 'register.php'">Оформить договор с этими парматрами</button>
                <?php } else { ?>
                    <button type="submit" class="contract_execution-btn flat_execution-btn-welcome none">Оформить договор с этими парматрами</button>
                <?php } ?>
            </div>
        </div>
    </div>
</section>


<!-- libs -->
<link href="https://fonts.googleapis.com/
        css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
<link rel="stylesheet" href="libs/bootstrap-grid.min.css">

<script src="../libs/jquery/dist/jquery.min.js"></script>
<script src="../libs/jquery.fancybox.min.js"></script>
<script src="../js/main.js"></script>

<link rel="stylesheet" href="css/main.css">
<link rel="stylesheet" href="css/adaptive.css">
<script src="js/common.js"></script>


</body>
</html>