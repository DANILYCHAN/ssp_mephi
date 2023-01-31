<?php

session_start();
require_once 'connect.php';
require_once 'coefs.php';

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

$max_contracts = 2;

$standart_price = 3400;
$sum_of_ins = $_POST['sum_of_ins'];
$otdelka = $_POST['otdelka'];
$property = $_POST['property'];
$otvetstvenntost = $_POST['otvetstvenntost'];
$user_id = $_SESSION['user']['id'];

$check_contract = mysqli_query($connect, "SELECT * FROM `users_parameters` WHERE `user_id` = '$user_id' AND `otdelka` IS NOT NULL");

if (mysqli_num_rows($check_contract) != 0) {
    $response = [
        "status" => false,
        "message" => "У вас уже есть договор!",
    ];

    echo json_encode($response);

    die();
}

$sum = $standart_price * $sum_of_ins_arr[$sum_of_ins] * $otdelka_arr[$otdelka] * $property_arr[$property] * $otvetstvenntost_arr[$otvetstvenntost];
$sum = ceil($sum);

$today = date("Y-m-d");

$check_user = mysqli_query($connect, "SELECT * FROM `users_parameters` WHERE `user_id` = '$user_id'");

mysqli_query($connect,"LOCK TABLES `users_parameters` WRITE, `contract` WRITE");    // BLOCK TABLES

$check_amount_of_contracts = mysqli_query($connect, "SELECT * FROM `users_parameters` WHERE `sum_of_ins` IS NOT NULL");

if (mysqli_num_rows($check_amount_of_contracts) < $max_contracts) {
    sleep(5); // SLEEP TO RUN SECOND BUY
    if (mysqli_num_rows($check_user) == 0) {
        mysqli_query($connect, "INSERT INTO `users_parameters`
        (`id`, `user_id`, `sum_of_ins`, `otdelka`, `property`, `otvetstvenntost`)
        VALUES (NULL, '$user_id', '$sum_of_ins', '$otdelka', '$property', '$otvetstvenntost')");

        mysqli_query($connect, "INSERT INTO `contract`
        (`id`, `conclusionDate`, `price`, `term_months`, `insurance_type`, `user_id`)
        VALUES (NULL, '$today', '$sum', '12', '3', '$user_id')");



        $response = [
            "status" => true,
            "message" => "Договор оформлен успешно",
        ];

        echo json_encode($response);

    } else {
        mysqli_query($connect, "UPDATE `users_parameters`
        SET `sum_of_ins` = '$sum_of_ins', `otdelka` = '$otdelka', `property` = '$property', `otvetstvenntost` = '$otvetstvenntost'
        WHERE `users_parameters`.`user_id` = '$user_id'");

        mysqli_query($connect, "INSERT INTO `contract`
        (`id`, `conclusionDate`, `price`, `term_months`, `insurance_type`, `user_id`)
        VALUES (NULL, '$today', '$sum', '12', '3', '$user_id')");

        $response = [
            "status" => true,
            "message" => "Договор оформлен успешно",
        ];

        echo json_encode($response);

    }
} else {
    $response = [
        "status" => true,
        "message" => "Мы больше не можем предоставлять страховку на квартиры!",
    ];

    echo json_encode($response);
}


$query = "UNLOCK TABLES;"; // UNBLOCK TABLES
mysqli_query($connect, $query);