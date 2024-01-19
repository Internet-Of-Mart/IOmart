<?php

include_once($_SERVER['DOCUMENT_ROOT'] . '/Model/Store.php');
use model\Store;


Store::editStore( $_POST['id'], $_POST['name'], $_POST['address']);
header('location:../Views/StoreManagement.php');
