<?php
session_start();
$_SESSION['store_id'] = null;
header('location:../Views/StoreManagement.php');
