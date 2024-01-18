<div class="main_controlbox">
    <?php
    include_once($_SERVER['DOCUMENT_ROOT'] . '/Model/Device.php');

    use model\Device;

    /** @var Device $storeDevices */

    $main = [
        'on' => 0,
        'off' => 0
    ];
    foreach ($storeDevices as $element) {
        if ($element->state == 1) {
            $main['on'] += 1;
        } else {
            $main['off'] += 1;
        }
    }
    ?>

    <label class="controlbox_title">Main Control</label>

    <div class="button_container">


        <form action="../routing/utilBulkChangeState.php" method="post">
            <input type="hidden" name="view" value=<?php echo $_SERVER['REQUEST_URI'] ?>>
            <input type="hidden" name="store_id" value=<?php echo $_SESSION['store_id'] ?>>
            <input type="hidden" name="device_type"
                <?php
                switch (strtok($_SERVER["REQUEST_URI"], '?')) {
                    case ('/Views/Light.php'):
                        echo 'value="1"';
                        break;
                    case ('/Views/Temperature.php'):
                        echo 'value="2"';
                        break;
                    case ('/Views/Humidity.php'):
                        echo 'value="3"';
                        break;
                }
                ?>
            >

            <button type="submit"
                    name="state"
                    value="on"
                <?php if ($main['off'] == 0 && $main['on'] != 0) echo 'disabled'; ?>
                    class="<?php if ($main['off'] == 0 && $main['on'] != 0) echo 'active_on'; ?>"
            >ON
            </button>
            <button type="submit"
                    name="state"
                    value="off"
                <?php if ($main['off'] != 0 && $main['on'] == 0) echo 'disabled'; ?>
                    class="<?php if ($main['off'] != 0 && $main['on'] == 0) echo 'active_off'; ?>">OFF
            </button>
        </form>
    </div>
</div>
