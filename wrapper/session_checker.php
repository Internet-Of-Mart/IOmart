<?php
session_start();

$views = [
    'admin' => [
        '/Views/UserManagement.php',
        '/Views/StoreComparison.php',
        '/Views/StoreManagement.php',
    ],
    'notAdmin' => [
        '/Views/AccountPanel.php',
        '/Views/Humidity.php',
        '/Views/Light.php',
        '/Views/Login.php',
        '/Views/Registration.php',
        '/Views/SectionManagement.php',
        '/Views/StoreData.php',
        '/Views/Temperature.php',
        '/Views/404.php',
        '/index.php',
    ]
];

$path = strtok($_SERVER["REQUEST_URI"], '?');

if (!isset($_SESSION['user'])) {
    header('location:../index.php');
} else {
    $user = json_decode($_SESSION['user']);

    if ($user->position === 1) {
        if (!$_SESSION['store_id']) {

            if (!in_array($path, $views['admin'])) {
                header('location: ../Views/StoreManagement.php');
            }

            include_once '../navbar_admin.php';
        } else {
            include_once '../navbar.php';
        }

    } else {
        include_once '../navbar.php';
    }

}
