<?php

include $_SERVER['DOCUMENT_ROOT'] . '/Model/User.php';
use model\User;

$user = User::login($_POST['old_username'], $_POST['password']);


if (User::username_exist($_POST['username']) && ($_POST['old_username'] != $_POST['username'])){
    $usernameErr = 'Username Taken!';
    header('location:../Views/AccountPanel.php?error=' . urlencode($usernameErr));
    exit();
} else if (isset($_POST['newpass']) && !$user) {
    $passwordErr = 'Current Password Invalid!';
    header('location:../Views/AccountPanel.php?error=' . urlencode($passwordErr));
    exit();
} else if (isset($_POST['newpass']) && $user) {
    User::editAccountNewPass($_POST['user_id'], $_POST);
    header('location:../Views/AccountPanel.php');
    exit();
} else {
    User::editAccount($_POST['user_id'], $_POST,);
    header('location:../Views/AccountPanel.php');
}

