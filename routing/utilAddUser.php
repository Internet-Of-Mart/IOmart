<?php

include $_SERVER['DOCUMENT_ROOT'] . '/Model/User.php';
use model\User;


if (User::username_exist($_POST['username'])) {
    $usernameErr = 'Username Taken!';
    header('location:../Views/UserManagement.php?error=' . urlencode($usernameErr));
    exit();
} else if ($_POST['password'] != $_POST['confirm']){
    $passwordErr = 'Passwords Dont Match!';
    header('location:../Views/UserManagement.php?error=' . urlencode($passwordErr));
    exit();
} else {
    User::createUser($_POST);
    header('location:../Views/UserManagement.php');
}