<?php
session_start();
?>

<!DOCTYPE html>
<html lang="ru">

<head>

    <meta charset="utf-8">

    <title>Гайде - страховая компания</title>
    <meta name="description"
          content="Страховая компания Гайде. Страховка ОСАГО, ДМС страхование, страхование недвижимости.">

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

<section class="pt-50" id="prices" style="   margin-top: 50px!important;">
    <div class="container">

        <div class="row 27let" style="background-color:#71a7da; height:400px;">
            <div class="corner"></div>
            <div class="col-md-12" style="margin-top: 40px;">
                <span class="zag-blue-50">Страховка ОСАГО, ДМС страхование, страхование недвижимости.</span>
            </div>

            <div class="txt-egor-35">

                <div style="float: left;"><b style="font-family:GILROY;font-size: 144px;">0</b></div>
                <div class="letg27" style="">

                    <b style="font-family:GILROY;font-size: 38px;line-height: 1;"></br></br></br>лет берем ваши риски на
                        себя.</b></div>
            </div>
            <div class="col-md-2 col-sx-12 namobilenone" style="color: white;margin-top: 50px;"><b
                        style="font-size: 30px;">100+</b><br><b>региональных представительств</b></div>
            <div class="col-md-2 col-sx-12 namobilenone" style="color: white;margin-top: 50px;"><b
                        style="font-size: 30px;">1,8 млн +</b><br><b>счастливых <br>клиентов</b></div>


        </div>
    </div>
</section>


<!-- libs -->
<link href="https://fonts.googleapis.com/
        css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
<link rel="stylesheet" href="libs/bootstrap-grid.min.css">

<script src="libs/jquery/dist/jquery.min.js"></script>
<script src="libs/jquery.fancybox.min.js"></script>

<link rel="stylesheet" href="css/main.css">
<link rel="stylesheet" href="css/adaptive.css">
<script src="js/common.js"></script>


</body>
</html>


<!-- background-image: url(https://guidehins.ru/wp-content/uploads/2022/12/111kometa-scaled.jpg);
height: 100%; -->