<?php

include_once($_SERVER['DOCUMENT_ROOT'] . '/Model/User.php');

use model\User;

session_start();

$userDB = User::login($_POST['username'], $_POST['password']);

if (!$userDB) {
    //TODO: Login Error Display

} else {
    $user = User::loadRaw($userDB[0]);

    if ($user->position == 1) {
        $_SESSION['user'] = json_encode($user);
        header('location:../Views/StoreManagement.php');
    } else {
        $_SESSION['user'] = json_encode($user);
        header('location:../Views/Temperature.php');
    }
}


