<?php
session_start();

if (!isset($_SESSION['user'])) {
    header('location:../index.php');
} else {

    $user = json_decode($_SESSION['user']);

    if ($user->position === 1) {
        /*TODO: Add store selection*/

        if (!isset($_SESSION['store'])) {
            include_once '../navbar_admin.php';
        } else {
            include_once '../navbar.php';
        }

    } else {
        include_once '../navbar.php';
    }

}
