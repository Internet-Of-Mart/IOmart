<?php

include_once($_SERVER['DOCUMENT_ROOT'].'/Model/User.php');
use model\User;

session_start();

if (true) {
    if ($_POST['username'] == 'admin') {
        $_SESSION['user'] = json_encode(User::generateAdminDemo());
        header('location:../Views/StoreManagement.php');
    } else {
        $_SESSION['user'] = json_encode(User::generateManagerDemo());
        header('location:../Views/Temperature.php');
    }
}

