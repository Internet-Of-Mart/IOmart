<?php

include $_SERVER['DOCUMENT_ROOT'] . '/Model/User.php';
use model\User;

if (User::username_exist($_POST['username'])) {
    //TODO:: If it exist return with warning message
    //Username can only be edited from own account
} else {
    User::editUser($_POST, $_POST['user_id']);
    header('location:../Views/UserManagement.php');
}