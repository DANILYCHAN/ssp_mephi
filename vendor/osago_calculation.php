<?php

session_start();
require_once 'connect.php';
require_once 'coefs.php';


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

$sum = $standart_price * $power_arr[$power] * $KBM_arr[$KBM] * $region_arr[$region] * $strahTime_arr[$strahTime] * $yearTimeUsage_arr[$yearTimeUsage] * $experience_age_arr[$experience][$age] * $driversCol_owner_arr[$driversCol][$owner];
$sum = ceil($sum);

$response = [
    "status" => true,
    "message" => "Предварительная сумма страховки - $sum р."
];

echo json_encode($response);
