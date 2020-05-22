<?php

$message = "";
$error = false;
$current_user = [];

$db = mysqli_connect('mariadb', 'root', 'itda310', 'employees', '3306');

if (mysqli_connect_errno()) {
    $error = true;
    $message = "Connection failed: " .mysqli_connect_errno()." : ". mysqli_connect_error();
} else {
    $message = "Connected successfully to database";
}