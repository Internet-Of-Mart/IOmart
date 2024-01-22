<?php

include $_SERVER['DOCUMENT_ROOT'] . '/Model/User.php';
use model\User;

var_dump($_POST);

$user = User::getSessionUser();
$oldUsername = User::getCred($user->id)["username"];



if ($oldUsername != $_POST['username']) {
    var_dump('different');
    if (User::username_exist($_POST['username'])) {
        $usernameErr = 'Username Taken!';
        header('location:../Views/AccountPanel.php?error=' . urlencode($usernameErr));
        exit();
    } else {
        User::changeUsername($user->id, $_POST['username']);
    }
}

if (isset($_POST['password'])) {
    var_dump('Change psw');
    if ($_POST['password'] != $_POST['confirm']) {
        $passwordErr = 'Passwords Dont Match!';
        header('location:../Views/AccountPanel.php?error=' . urlencode($passwordErr));
        exit();
    } else {
        User::changePassword($user->id, $_POST['password']);
    }
}

User::changePerson($user->id, $_POST);

$user = User::login($_POST['username'], $_POST['password']);
$_SESSION['user'] = json_encode($user);

var_dump(User::getSessionUser());

header('location:../Views/AccountPanel.php');
