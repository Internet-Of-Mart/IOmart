<?php
/* @var Array $adminStores */
/* @var Section $element */

include_once($_SERVER['DOCUMENT_ROOT'] . '/Model/Device.php');


use model\Section;
use model\Device;

?>

<script>
    function openDeleteDSForm<?php echo $element->id?>() {
        document.getElementById("deleteDS-form-" + <?php echo $element->id?>).style.display = "block";
        document.getElementById("action-fade-" + <?php echo $element->id?>).style.display = "block";

    }

    function closeDeleteDSForm<?php echo $element->id?>() {
        document.getElementById("deleteDS-form-" + <?php echo $element->id?>).style.display = "none";
        document.getElementById("action-fade-" + <?php echo $element->id?>).style.display = "none";
    }
</script>


<button class="manage_button" onclick="openDeleteDSForm<?php echo $element->id ?>()">
    Delete Device/Sensor
</button>

<div class="store-form-popup" id="deleteDS-form-<?php echo $element->id ?>">

    <h4>Delete Device Sensor</h4>

    <form action="../routing/utilDeleteDeviceSensor.php" method="post">

        <div style="display: flex; flex-direction: column; align-items: center; margin: 10px">
            <label for="device_sensor_id">Select Device to delete:
                <select name="device_sensor_id">
                    <?php

                    $devices = Device::getSectionDevices($element->id);
                    foreach ($devices as $d) {
                        echo "<option value=". json_encode([
                                "id_device"=>$d['id_device'],
                                "id_sensor"=>$d['id_sensor']
                            ]) . ">" . $d['name'] . "</option>";
                    }
                    ?>
                </select>
            </label>
        </div>


        <div>
            <button type="submit" class="active_off">Delete Device/Sensor</button>
            <button type="button" class="edit_btn cancel" onclick="closeDeleteDSForm<?php echo $element->id ?>()">
                Cancel
            </button>
        </div>

    </form>
</div>
<div id="<?php echo "action-fade-" ?><?php echo $element->id ?>" class="black-fade"></div>