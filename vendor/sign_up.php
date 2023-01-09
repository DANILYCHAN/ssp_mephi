<?php

session_start();
require_once 'connect.php';

$full_name = $_POST['full_name'];
$email = $_POST['email'];
$phone_number = $_POST['phone_number'];
$birth_date = $_POST['birth_date'];
$inn = $_POST['inn'];
$password = $_POST['password'];
$password_confirm = $_POST['password_confirm'];

$check_email = mysqli_query($connect, "SELECT * FROM `users` WHERE `email` = '$email'");
if (mysqli_num_rows($check_email) > 0) {
    $response = [
        "status" => false,
        "type" => 1,
        "message" => "Такой email уже существует",
        "fields" => ['login']
    ];

    echo json_encode($response);
    die();
}

$check_phoneNum = mysqli_query($connect, "SELECT * FROM `users` WHERE `phone_number` = '$phone_number'");
if (mysqli_num_rows($check_phoneNum) > 0) {
    $response = [
        "status" => false,
        "type" => 1,
        "message" => "Такой номер телефона уже существует",
        "fields" => ['phone_number']
    ];

    echo json_encode($response);
    die();
}

$check_inn = mysqli_query($connect, "SELECT * FROM `users` WHERE `inn` = '$inn'");
if (mysqli_num_rows($check_email) > 0) {
    $response = [
        "status" => false,
        "type" => 1,
        "message" => "Такой ИНН уже существует",
        "fields" => ['inn']
    ];

    echo json_encode($response);
    die();
}

$error_fields = [];

if ($email === '' || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $error_fields[] = 'email';
}

if ($password === '') {
    $error_fields[] = 'password';
}

if ($full_name === '') {
    $error_fields[] = 'full_name';
}

if ($phone_number === '') {
    $error_fields[] = 'phone_number';
}

if ($birth_date === '') {
    $error_fields[] = 'birth_date';
}

if ($inn === '') {
    $error_fields[] = 'inn';
}

if ($password_confirm === '') {
    $error_fields[] = 'password_confirm';
}

if (!empty($error_fields)) {
    $response = [
        "status" => false,
        "type" => 1,
        "message" => "Проверьте правильность полей",
        "fields" => $error_fields
    ];

    echo json_encode($response);

    die();
}

if ($password === $password_confirm) {
    $password = md5($password);

    mysqli_query($connect, "INSERT INTO `users` 
    (`id`, `full_name`, `email`, `password`, `phone_number`, `birth_date`, `inn`) 
    VALUES (NULL, '$full_name', '$email', '$password', '$phone_number', '$birth_date', '$inn')");

    $response = [
        "status" => true,
        "message" => "Регистрация прошла успешно",
    ];

    echo json_encode($response);

} else {
    $response = [
        "status" => false,
        "message" => "Пароли не совпадают",
    ];

    echo json_encode($response);
}

?>