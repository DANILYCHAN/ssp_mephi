<?php
session_start();

$log_expr_time = 120;
if (isset($_SESSION['log_start']) && time() - $_SESSION['log_start'] > $log_expr_time) {
    header('Location: vendor/logout.php');
} elseif (isset($_SESSION['user'])) {
    $_SESSION['log_start'] = time();
}

?>

<!DOCTYPE html>
<html lang="ru">

<head>

    <meta charset="utf-8">

    <title>Страховка ОСАГО</title>
    <meta name="description" content="Страховка ОСАГО.">

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
                <div class="page-header"><h1>Предварительный расчет стоимости ОСАГО</h1></div>
            </div>
        </header> <!-- end article header -->

        <div class="main">
            <div class="calculations">
                <form class="choose_params">

                    <label>Мощность, л.с.:</label>
                    <select name="power" id="power" class="osago">
                        <option value="1">До 50 включительно</option>
                        <option value="2">Свыше 50 до 70 включительно</option>
                        <option value="3">Свыше 70 до 100 включительно</option>
                        <option value="4">Свыше 100 до 120 включительно</option>
                        <option value="5">Свыше 120 до 150 включительно</option>
                        <option value="6">Свыше 150</option>
                    </select>
                    </br>
                    <label>Наибольший КБМ(в случае нескольких водителей):</label>
                    <select name="KBM" id="KBM" class="osago">
                        <option value="1">3.92</option>
                        <option value="2">2.94</option>
                        <option value="3">2.25</option>
                        <option value="4">1.76</option>
                        <option value="5">1.17</option>
                        <option value="6">1</option>
                        <option value="7">0,91</option>
                        <option value="8">0.83</option>
                        <option value="9">0.78</option>
                        <option value="10">0.74</option>
                        <option value="11">0.68</option>
                        <option value="12">0.63</option>
                        <option value="13">0.57</option>
                        <option value="14">0.52</option>
                        <option value="15">0.46</option>
                    </select>
                    </br>
                    <label>Адрес регистрации собственника:</label>
                    <select name="region" id="region" class="osago">
                        <option value="1">Москва</option>
                        <option value="2">Санкт-Петербург</option>
                        <option value="3">Новосибирск</option>
                        <option value="4">Екатеринбург</option>
                        <option value="5">Казань</option>
                        <option value="6">Нижний Новгород</option>
                        <option value="7">Челябинск</option>
                        <option value="8">Красноярск</option>
                        <option value="9">Самара</option>
                        <option value="10">Уфа</option>
                        <option value="11">Ростов-на-Дону</option>
                        <option value="12">Омск</option>
                        <option value="13">Краснодар</option>
                        <option value="14">Воронеж</option>
                        <option value="15">Пермь</option>
                        <option value="16">Волгоград</option>
                    </select>
                    </br>
                    <label>Период страхования:</label>
                    <select name="strahTime" id="strahTime" class="osago">
                        <option value="1">3 месяца</option>
                        <option value="2">4 месяца</option>
                        <option value="3">5 месяцев</option>
                        <option value="4">6 месяцев</option>
                        <option value="5">7 месяцев</option>
                        <option value="6">8 месяцев</option>
                        <option value="7">9 месяцев</option>
                        <option value="8">1 год</option>
                    </select>
                    </br>
                    <label>Временное использование:</label>
                    <select name="yearTimeUsage" id="yearTimeUsage" class="osago">
                        <option value="1">3 месяца</option>
                        <option value="2">3-4 месяца</option>
                        <option value="3">4-5 месяцев</option>
                        <option value="4">5-6 месяцев</option>
                        <option value="5">6-7 месяцев</option>
                        <option value="6">7-8 месяцев</option>
                        <option value="7">8-9 месяцев</option>
                        <option value="8">9+ месяцев</option>
                    </select>
                    </br>
                    <label>Стаж самого неопытного водителя(в случае нескольких водителей):</label>
                    <select name="experience" id="experience" class="osago">
                        <option value="1">0 лет</option>
                        <option value="2">1 год</option>
                        <option value="3">2 года</option>
                        <option value="4">3-4 года</option>
                        <option value="5">5-6 лет</option>
                        <option value="6">7-9 лет</option>
                        <option value="7">10-14 лет</option>
                        <option value="8">14+ лет</option>
                    </select>
                    </br>
                    <label>Возраст самого неопытного водителя(в случае нескольких водителей):</label>
                    <select name="age" id="age" class="osago">
                        <option value="1">16-21 год</option>
                        <option value="2">22-24 года</option>
                        <option value="3">25-29 лет</option>
                        <option value="4">30-34 года</option>
                        <option value="5">35-39 лет</option>
                        <option value="6">40-49 лет</option>
                        <option value="7">50-59 лет</option>
                        <option value="8">59+ лет</option>
                    </select>
                    </br>
                    <label>Собственник:</label>
                    <select name="owner" id="owner" class="osago">
                        <option value="1">Физическое лицо</option>
                        <option value="2">Юридическое лицо</option>
                    </select>
                    </br>
                    <label>Кол-во водителей:</label>
                    <select name="driversCol" id="driversCol" class="osago">
                        <option value="1">Ограниченное(до 4)</option>
                        <option value="2">Неограниченное</option>
                    </select>
                    </br>
                    <label>Гос-номер авто:</label>
                    <input name="gos_number" id="gos_number" class="osago" type="text" placeholder="Введите гос. номер авто" pattern="[A-Z]{1}[1-3]{3}[A-Z]{2}{1-9}[3]">
                    </br>
                    <button type="submit" class="calculation-btn">Расчет стоимости страховки</button>
                    <!--            <div class="calculated_sum"><p class="msg none">Lorem ipsum dolor sit amet.</p></div>-->
                </form>
            </div>
            <div class="calculated_sum">
                <p class="msg none">Lorem ipsum dolor sit amet.</p>
                <?php if (!$_SESSION['user']) { ?>
                    <button class="contract_execution-btn contract_execution-btn-register none" onclick="window.location.href = 'register.php'">Оформить договор с этими парматрами</button>
                <?php } else { ?>
                    <button type="submit" class="contract_execution-btn contract_execution-btn-welcome none">Оформить договор с этими парматрами</button>
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
