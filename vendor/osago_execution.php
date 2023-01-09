<?php

session_start();
require_once 'connect.php';
require_once 'coefs.php';

$max_contracts = 10;

$standart_price = 5875; // 5772
$power = $_POST['power'];
$KBM = $_POST['KBM'];
$region = $_POST['region'];
$strahTime = $_POST['strahTime'];
$yearTimeUsage = $_POST['yearTimeUsage'];
$experience = $_POST['experience'];
$age = $_POST['age'];
$owner = $_POST['owner'];
$driversCol = $_POST['driversCol'];
$gos_nomer = $_POST['gos_number'];
$user_id = $_SESSION['user']['id'];

mysqli_query($connect,"LOCK TABLES `users_parameters` WRITE, `contract` WRITE");

$check_contract = mysqli_query($connect, "SELECT * FROM `users_parameters` WHERE `user_id` = '$user_id' AND `TB` IS NOT NULL");

if (mysqli_num_rows($check_contract) != 0) {
    $response = [
        "status" => false,
        "message" => "У вас уже есть договор!",
    ];

    echo json_encode($response);

    die();
}

$sum = $standart_price * $power_arr[$power] * $KBM_arr[$KBM] * $region_arr[$region] * $strahTime_arr[$strahTime] * $yearTimeUsage_arr[$yearTimeUsage] * $experience_age_arr[$experience][$age] * $driversCol_owner_arr[$driversCol][$owner];
$sum = ceil($sum);
$KBC = $experience_age_arr[$experience][$age];
$KO = $driversCol_owner_arr[$driversCol][$owner];

$term_months = $strahTime_arr_2[$strahTime];

$check_user = mysqli_query($connect, "SELECT * FROM `users_parameters` WHERE `user_id` = '$user_id'");

$check_amount_of_contracts = mysqli_query($connect, "SELECT * FROM `users_parameters` WHERE `TB` IS NOT NULL");

$today = date("Y-m-d");

if (mysqli_num_rows($check_amount_of_contracts) < $max_contracts) {
    if (mysqli_num_rows($check_user) == 0) {
        mysqli_query($connect, "INSERT INTO `users_parameters` 
        (`id`, `user_id`, `TB`, `KT`, `KBM`, `KBC`, `KO`, `KM`, `KC`, `KP`, `gosNomer`) 
        VALUES (NULL, '$user_id', '$standart_price', '$region_arr[$region]', '$KBM_arr[$KBM]', '$KBC', '$KO',
                '$power_arr[$power]', '$yearTimeUsage_arr[$yearTimeUsage]', '$strahTime_arr[$strahTime]', '$gos_nomer')");

        mysqli_query($connect, "INSERT INTO `contract`
        (`id`, `conclusionDate`, `price`, `term_months`, `insurance_type`, `user_id`)
        VALUES (NULL, '$today', '$sum', '$term_months', '1', '$user_id')");

        $response = [
            "status" => true,
            "message" => "Договор оформлен успешно",
        ];

        echo json_encode($response);
    } else {
        mysqli_query($connect, "UPDATE `users_parameters`
        SET `TB` = '$standart_price', `KT` = '$region_arr[$region]', `KBM` = '$KBM_arr[$KBM]', `KBC` = '$KBC', `KO` = '$KO', `KM` = '$power_arr[$power]',
            `KC` = '$yearTimeUsage_arr[$yearTimeUsage]', `gosNomer` = '$gos_nomer', `KP` = '$strahTime_arr[$strahTime]'
        WHERE `users_parameters`.`user_id` = '$user_id'");

        mysqli_query($connect, "INSERT INTO `contract`
        (`id`, `conclusionDate`, `price`, `term_months`, `insurance_type`, `user_id`)
        VALUES (NULL, '$today', '$sum', '$term_months', '1', '$user_id')");

        $response = [
            "status" => true,
            "message" => "Договор оформлен успешно!",
        ];

        echo json_encode($response);
    }
} else {
    $response = [
        "status" => true,
        "message" => "Мы больше не можем предоставлять полисы ОСАГО!",
    ];

    echo json_encode($response);
}

$query = "UNLOCK TABLES;";
mysqli_query($connect, $query);