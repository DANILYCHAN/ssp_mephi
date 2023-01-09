<?php
session_start();

require_once 'vendor/connect.php';

if (!$_SESSION['user']) {
    header('Location: /');
}

$user_id = $_SESSION['user']['id'];

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

<section>
    <div class="container" style="margin-top: -10px;">
        <header>
            <div class="col-md-9 col-sm-12 col-md-offset-1">
                <div class="page-header"><h1>Данные пользователя</h1></div>
            </div>
        </header> <!-- end article header -->

        <div class="main">
            <?php
            $queryt = "SELECT * FROM `contract` WHERE `user_id` = '$user_id'  AND `insurance_type` = '1'";
            $results = $connect->query($queryt);
            global $user_id;
            while ($row = $results->fetch_assoc()) {
                $id = $row["id"];
                $price = $row["price"];
                $conclusion_date = $row["conclusionDate"];
                $term_months = $row["term_months"];
            }
            ?>
            <div class="OSAGO">
                <?php if ($id) { ?>
                    <label class="msg_1">Номер договора ОСАГО - <?php echo $id; ?></label>
                    </br>
                    <label class="msg_1">Цена ОСАГО - <?php echo $price; ?></label>
                    </br>
                    <label class="msg_1">Дата заключения ОСАГО - <?php echo $conclusion_date; ?></label>
                    </br>
                    <label class="msg_1">Срок действия ОСАГО - <?php echo $term_months; ?> месяца</label>
                    </br>
                <?php } else { ?>
                    <label class="msg_1">У вас нет договора ОСАГО</label>
                    </br>
                <?php } ?>
            </div>
            <?php
            $queryt_1 = "SELECT * FROM `users_parameters` WHERE `user_id` = '$user_id'";
            $results_1 = $connect->query($queryt_1);
            while ($row = $results_1->fetch_assoc()) {
                $TB = $row["TB"];
                $KT = $row["KT"];
                $KBM = $row["KBM"];
                $KBC = $row["KBC"];
                $KO = $row["KO"];
                $KM = $row["KM"];
                $KC = $row["KC"];
                $KP = $row["KP"];
                $gosNomer = $row["gosNomer"];
            }
            ?>
            <div class="OSAGO">
                <?php if ($TB) { ?>
                    <label class="msg_1">Гос. номер авто: <?php echo $gosNomer; ?></br></label>
                    <label class="msg_1">Коэффициенты. TB: <?php echo $TB; ?>, KT: <?php echo $KT; ?>,
                        КБМ: <?php echo $KBM; ?>, KBC: <?php echo $KBC; ?>,
                        KO: <?php echo $KO; ?>, KM: <?php echo $KM; ?>, KC: <?php echo $KC; ?>, KP: <?php echo $KP; ?>
                        .</label>
                <?php } ?>
            </div>
            </br></br></br>
            <?php
            $queryt_2 = "SELECT * FROM `contract` WHERE `user_id` = '$user_id'  AND `insurance_type` = '3'";
            $results_2 = $connect->query($queryt_2);
            while ($row = $results_2->fetch_assoc()) {
                $id_hata = $row["id"];
                $price_hata = $row["price"];
                $conclusion_date_hata = $row["conclusionDate"];
                $term_months_hata = $row["term_months"];
            }
            ?>
            <div class="hata">
                <?php if ($id_hata) { ?>
                    <label class="msg_1">Номер договора страховки квартиры - <?php echo $id_hata; ?></label>
                    </br>
                    <label class="msg_1">Цена страховки - <?php echo $price_hata; ?></label>
                    </br>
                    <label class="msg_1">Дата заключения страховки - <?php echo $conclusion_date_hata; ?></label>
                    </br>
                    <label class="msg_1">Срок действия страховки - <?php echo $term_months_hata; ?> месяца</label>
                    </br>
                <?php } else { ?>
                    <label class="msg_1">У вас нет страховки квартиры</label>
                    </br>
                <?php } ?>
            </div>
            <?php
            $queryt_3 = "SELECT * FROM `users_parameters` WHERE `user_id` = '$user_id'";
            $results_3 = $connect->query($queryt_3);
            while ($row = $results_3->fetch_assoc()) {
                $sum_of_ins = $row["sum_of_ins"];
                $otdelka = $row["otdelka"];
                $property = $row["property"];
                $otvetstvenntost = $row["otvetstvenntost"];
            }
            ?>
            <div class="OSAGO">
                <?php if ($TB) { ?>
                    <label class="msg_1">Базовая сумма: 3400р.</br></br></label>
                    <label class="msg_1">Коэффициенты:</br></label>
                    <label class="msg_1">Сумма страхования: <?php echo $sum_of_ins; ?></br></label>
                    <label class="msg_1">Отделка: <?php echo $otdelka; ?></br></label>
                    <label class="msg_1">Имущество: <?php echo $property; ?></br></label>
                    <label class="msg_1">Гражданская ответственность: <?php echo $otvetstvenntost; ?></br></label>
                <?php } ?>
            </div> </br></br></br>

            <?php
            $queryt_4 = "SELECT * FROM `users` WHERE `id` = '$user_id'";
            $results_4 = $connect->query($queryt_4);
            while ($row = $results_4->fetch_assoc()) {
                $full_name = $row["full_name"];
                $email = $row["email"];
                $phone_number = $row["phone_number"];
                $inn = $row["inn"];
            }
            ?>
            <label class="msg_1">Личные данные</br></br></label>
            <label class="msg_1">ФИО: <?php echo $full_name; ?></br></label>
            <label class="msg_1">Email: <?php echo $email; ?></br></label>
            <label class="msg_1">Номер телефона: <?php echo $phone_number; ?></br></label>
            <label class="msg_1">ИНН: <?php echo $inn; ?></br></label>
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