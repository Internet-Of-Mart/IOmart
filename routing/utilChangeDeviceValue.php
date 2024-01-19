<?php
include_once($_SERVER['DOCUMENT_ROOT'] . '/Model/Device.php');
use model\Device;

Device::changeDeviceSetValue($_POST['device_id'], $_POST['new_value']);
header('location:..'. $_POST['view']);