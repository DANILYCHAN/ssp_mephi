<?php

session_start();
require_once 'connect.php';
require_once 'coefs.php';


$standart_price = 3400;
$sum_of_ins = $_POST['sum_of_ins'];
$otdelka = $_POST['otdelka'];
$property = $_POST['property'];
$otvetstvenntost = $_POST['otvetstvenntost'];

$sum = $standart_price * $sum_of_ins_arr[$sum_of_ins] * $otdelka_arr[$otdelka] * $property_arr[$property] * $otvetstvenntost_arr[$otvetstvenntost];
$sum = ceil($sum);

$response = [
    "status" => true,
    "message" => "Предварительная сумма страховки - $sum р."
];

echo json_encode($response);

