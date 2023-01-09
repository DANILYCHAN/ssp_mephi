<?php

session_start();
require_once 'connect.php';

GLOBAL $response;

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

$user_id = $_SESSION['user']['id'];

$check_contract = mysqli_query($connect, "SELECT * FROM `users_parameters` WHERE `user_id` = '$user_id' AND `TB` IS NOT NULL");

$full_name = $_SESSION['user']['full_name'];
$email = $_SESSION['user']['email'];
$phone_number = $_SESSION['user']['phone_number'];
$inn = $_SESSION['user']['inn'];

if (mysqli_num_rows($check_contract) != 0) {
    $response["message_1"] = "У вас есть договор Осаго.";

    $check_coefs = mysqli_query($connect, "SELECT `TB`, `KT`, `KBM`, `KBC`, `KO`, `KO`, `KM`, `KC`, `KP` FROM `users_parameters` WHERE `user_id` = '$user_id'");
    while ($coef_curr = $check_coefs->fetch_assoc()) {
        $TB = $coef_curr['TB'];
        $KT = $coef_curr['KT'];
        $KBM = $coef_curr['KBM'];
        $KBC = $coef_curr['KBC'];
        $KO = $coef_curr['KO'];
        $KM = $coef_curr['KM'];
        $KC = $coef_curr['KC'];
        $KP = $coef_curr['KP'];
        $response["message_2"] = "Коэффициенты. TB: $TB, KT: $KT, КБМ: $KBM, KBC: $KBC, KO: $KO, KM: $KM, KC: $KC, KP: $KP";
    }
} else {
    $response["message_1"] = "У вас нет договора Осаго.";
    $response["message_2"] = "";
}

$check_contract = mysqli_query($connect, "SELECT * FROM `users_parameters` WHERE `user_id` = '$user_id' AND `otdelka` IS NOT NULL");

if (mysqli_num_rows($check_contract) != 0) {
    $response["message_3"] = "У вас есть страховка квартиры.";

    $check_coefs = mysqli_query($connect, "SELECT `sum_of_ins`, `otdelka`, `property`, `otvetstvenntost` FROM `users_parameters` WHERE `user_id` = '$user_id'");
    while ($coef_curr = $check_coefs->fetch_assoc()) {
        $sum_of_ins = $coef_curr['sum_of_ins'];
        $otdelka = $coef_curr['otdelka'];
        $property = $coef_curr['property'];
        $otvetstvenntost = $coef_curr['otvetstvenntost'];
        $response["message_4"] = "Коэффициенты. Сумма страхования: $sum_of_ins, отделка: $otdelka, имущество: $property, гражданская ответственность: $otvetstvenntost";
    }
} else {
    $response["message_3"] = "У вас нет страховки квартиры.";
    $response["message_4"] = "";
}

$response["message_4"] = "ФИО: $full_name, email: $email, номер телефона: $phone_number, ИНН: $inn";

echo json_encode($response);