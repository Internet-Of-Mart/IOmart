<?php
/* @var Array $adminStores */
/* @var Section $element */

use model\Section;

?>

<script>
    function openAssociateForm<?php echo $element->id?>() {
        document.getElementById("associate-form-" + <?php echo $element->id?>).style.display = "block";
        document.getElementById("action-fade-" + <?php echo $element->id?>).style.display = "block";

    }

    function closeAssociateForm<?php echo $element->id?>() {
        document.getElementById("associate-form-" + <?php echo $element->id?>).style.display = "none";
        document.getElementById("action-fade-" + <?php echo $element->id?>).style.display = "none";
    }
</script>


<button class="manage_button" onclick="openAssociateForm<?php echo $element->id ?>()">
    Associate Device/Sensor
</button>

<div class="store-form-popup" id="associate-form-<?php echo $element->id ?>">

    <h4>Associate Device Sensor</h4>
    <form action="../routing/utilAssociateDeviceSensor.php" method="post">
        <input type="hidden" name="section_id" value=<?php echo $element->id ?>>
        <input type="hidden" name="state" value="0">>

        <div class="fieldPadding15px">
            <label for="name">Device Name:
                <input type="text" name="name" required/>
            </label>
            <label for="maintenance">Date installed:
                <input type="date" name="maintenance" required/>
            </label>
            <label for="device_type_id">Device Type:
                <select name="device_type_id">
                    <option value="2">Temperature</option>
                    <option value="3">Humidity</option>
                    <option value="1">Light</option>
                </select>
            </label>
        </div>

        <div>
            <button type="submit" class="active_on">Associate Device/Sensor</button>
            <button type="button" class="edit_btn cancel" onclick="closeAssociateForm<?php echo $element->id ?>()">
                Cancel
            </button>
        </div>

    </form>
</div>
<div id="<?php echo "action-fade-" ?><?php echo $element->id ?>" class="black-fade"></div>
