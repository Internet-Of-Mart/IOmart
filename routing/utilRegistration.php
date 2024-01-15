<?php

include $_SERVER['DOCUMENT_ROOT'] . '/Model/User.php';
use model\User;


if (User::username_exist($_POST['username'])) {
    //TODO:: If it exist return with warning message
} else {
    $user = User::registerAdmin($_POST);
    $_SESSION['user'] = json_encode($user);
    header('location:../Views/StoreManagement.php');
}