<?php

include_once($_SERVER['DOCUMENT_ROOT'] . '/Model/User.php');
use model\User;

include_once($_SERVER['DOCUMENT_ROOT'] . '/Model/Store.php');
use model\Store;

session_start();

$user = User::login($_POST['username'], $_POST['password']);


if (!$user) {
    $userErr = 'Not Valid User, Check Username or Password!';
    header('location:../index.php?error=' . urlencode($userErr));
    exit();

} else {

    if ($user->position == 1) {
        $_SESSION['user'] = json_encode($user);
        header('location:../Views/StoreManagement.php');

    } else {
        $_SESSION['user'] = json_encode($user);
        $_SESSION['store_id'] = (Store::getUserStores($user->id))[0]->id;

        header('location:../Views/Temperature.php');
    }
}


