<?php

include_once($_SERVER['DOCUMENT_ROOT'] . '/Model/User.php');

use model\User;

session_start();

if (true) {
    $userDB = User::login($_POST['username'], hash('ripemd160', $_POST['password']));
    if (!$userDB) {
        //TODO: Login Error Display

    } else {
//        $user = User::loadRaw($userDB[0]); //FIXME: Typo in employment in db

//        if ($_POST['username'] == 'admin') {
//            $_SESSION['user'] = json_encode(User::generateAdminDemo());
//            header('location:../Views/StoreManagement.php');
//        } else {
//            $_SESSION['user'] = json_encode(User::generateManagerDemo());
//            header('location:../Views/Temperature.php');
//        }
    }
}

