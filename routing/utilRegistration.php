<?php

include $_SERVER['DOCUMENT_ROOT'] . '/Model/User.php';
use model\User;

var_dump($_POST);

if (User::username_exist($_POST['username'])) {
    //TODO:: If it exist return with warning message
} else {

}