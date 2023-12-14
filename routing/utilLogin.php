<?php

session_start();

if (true) {
    $_SESSION['user'] = $_POST['username'];
    header('location:../Views/Light.php');
}

