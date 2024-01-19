<?php

include_once($_SERVER['DOCUMENT_ROOT'] . '/Model/Store.php');
use model\Store;

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Check if 'action' parameter is set
    if (isset($_POST['btnSave'])) {
        Store::editStore($_POST['id'], $_POST['name'], $_POST['address']);
    } elseif (isset($_POST['btnDelete'])) {
        Store::deleteStore($_POST['id']);
    }
}

header('location:../Views/StoreManagement.php');
