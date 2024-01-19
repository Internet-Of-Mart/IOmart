<?php

include $_SERVER['DOCUMENT_ROOT'] . '/Model/User.php';
use model\User;

User::deleteUser($_POST['user_id']);

header('location:../Views/UserManagement.php');
