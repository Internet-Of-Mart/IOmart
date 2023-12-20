<?php

include_once($_SERVER['DOCUMENT_ROOT'].'/Model/User.php');
use model\User;

session_start();

if (true) {
    /*$_POST['username'] will get stuff from the login form*/
    $_SESSION['user'] = json_encode(User::generateDemo());
    header('location:../Views/Light.php');
}

