<?php

include $_SERVER['DOCUMENT_ROOT'] . '/Model/User.php';
use model\User;

if (User::username_exist($_POST['username'])) {
    //TODO:: If it exist return with warning message
} else {
    User::createUser($_POST);
    header('location:../Views/UserManagement.php');
}