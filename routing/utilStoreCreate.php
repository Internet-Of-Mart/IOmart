<?php

include_once($_SERVER['DOCUMENT_ROOT'] . '/Model/User.php');
include_once($_SERVER['DOCUMENT_ROOT'] . '/Model/Store.php');
use model\Store;
use model\User;

Store::createStore($_POST['name'], $_POST['address'], User::getSessionUser()->id);
header('location:../Views/StoreManagement.php');