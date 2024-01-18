<?php
include_once($_SERVER['DOCUMENT_ROOT'] . '/Model/Device.php');
use model\Device;

switch ($_POST['state']) {
    case ('on'):
        Device::changeActiveStateDevice($_POST['device_id'],1);
        break;

    case ('off'):
        Device::changeActiveStateDevice($_POST['device_id'],0);
        break;
}

header('location:..'. $_POST['view']);
