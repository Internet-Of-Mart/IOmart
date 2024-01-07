<?php
session_start();

if (!isset($_SESSION['user'])) {
    header('location:../index.php');
} else {

    $user = json_decode($_SESSION['user']);

    if ($user->position === 1) {
        if (!$_SESSION['store_id']) {
            include_once '../navbar_admin.php';

        } else {
            include_once '../navbar.php';
        }

    } else {
        include_once '../navbar.php';
    }

}
