<?php
$connect = mysqli_connect(hostname: 'localhost', username: 'root', password: 'root', database: 'insurance_company');

if (!$connect) {
    die('Error connect to DataBase');
}