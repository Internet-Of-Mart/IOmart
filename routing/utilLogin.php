<?php

include_once($_SERVER['DOCUMENT_ROOT'] . '/Model/User.php');

use model\User;

session_start();

$user = User::login($_POST['username'], $_POST['password']);

if (!$user) {
    //TODO: Login Error Display

} else {

    if ($user->position == 1) {
        $_SESSION['user'] = json_encode($user);
        header('location:../Views/StoreManagement.php');
    } else {
        $_SESSION['user'] = json_encode($user);
        header('location:../Views/Temperature.php');
    }
}


