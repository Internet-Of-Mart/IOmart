<?php

include $_SERVER['DOCUMENT_ROOT'] . '/Model/Device.php';
include $_SERVER['DOCUMENT_ROOT'] . '/Model/Sensor.php';

use model\Device;
use model\Sensor;

$sensorDevIDs = json_decode($_POST["device_sensor_id"]);


Device::delete($sensorDevIDs->id_device);
Sensor::delete($sensorDevIDs->id_sensor);

header('location:../Views/SectionManagement.php');
