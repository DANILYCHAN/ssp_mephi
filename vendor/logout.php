<?php

session_start();
unset($_SESSION['user']);
unset($_SESSION['log_start']);
unset($_COOKIE['cookiename']);
header('Location: ../index.php');