<?php
include_once($_SERVER['DOCUMENT_ROOT'] . '/Model/Device.php');

use model\Device;

switch ($_POST['state']) {
    case ('on'):
        Device::changeActiveStateBulk($_POST['store_id'], $_POST['device_type'], 1);
        break;

    case ('off'):
        Device::changeActiveStateBulk($_POST['store_id'], $_POST['device_type'], 0);
        break;
}

header('location:..' . $_POST['view']);