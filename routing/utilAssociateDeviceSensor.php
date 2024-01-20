<?php

include $_SERVER['DOCUMENT_ROOT'] . '/Model/Device.php';
include $_SERVER['DOCUMENT_ROOT'] . '/Model/Sensor.php';

use model\Device;
use model\Sensor;

$sensor =
    [
        'sensor_section_id' => $_POST['section_id'],
        'name' => $_POST['name'] . ' ' . 'Sensor'
    ];


switch ($_POST['device_type_id']) {
    case ('1'): //L
        $sensor['sensor_type_id'] = 3;
        break;
    case ('2')://T
        $sensor['sensor_type_id'] = 1;
        break;
    case ('3')://H
        $sensor['sensor_type_id'] = 2;
        break;
}

$device_id = Device::create($_POST);
$sensor_id = Sensor::create($sensor);

try {
    $val = random_int(20, 40);
} catch (\Random\RandomException $e) {
    $val = 20;
}

Device::associateSensor($sensor_id, $device_id, $val);
Sensor::addData($sensor_id, $val, date('Y-m-d 08:00:00', time()));

header('location:../Views/SectionManagement.php');
