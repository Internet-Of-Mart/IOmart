<?php
session_start();
$_SESSION['store_id'] = $_POST['store_id'];

header('location:../Views/Temperature.php');