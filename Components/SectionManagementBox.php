<?php /** @var Section $element */
include_once($_SERVER['DOCUMENT_ROOT'] . '/Model/Section.php');

use model\Section;

$devicesAmount = $element->getSectionDeviceAggregate();

?>

<div class="section_box">
    <div class="section_management_container">
        <label><?php echo $element->name ?></php></label>
        <div class="device_sensor_icons_container">

            <?php
            $amount = $devicesAmount['Temperature'];
            include($_SERVER['DOCUMENT_ROOT'] . '/Assets/temperatureSvg.php');
            ?>

            <?php
            $amount = $devicesAmount['Humidity'];
            include($_SERVER['DOCUMENT_ROOT'] . '/Assets/humiditySvg.php');
            ?>

            <?php
            $amount = $devicesAmount['Light'];
            include($_SERVER['DOCUMENT_ROOT'] . '/Assets/lightSvg.php');
            ?>
        </div>

        <div class="sc-btn">
            <?php include '../Components/AddDeviceSensor.php' ?>
            <?php include '../Components/DeleteDevice.php' ?>
        </div>

        <?php include '../Components/DeleteSection.php' ?>

    </div>
</div>

