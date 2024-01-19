<div class="Lightcontrolbox">
    <label class="controlbox_title">
        <?php
        include_once($_SERVER['DOCUMENT_ROOT'] . '/Model/Device.php');

        use model\Device;

        /** @var Device $element */
        echo $element->name;
        ?>

    </label>
    <div class="button_inline_container">
        <div class="button_container">
            <form action="../routing/utilChangeDeviceState.php" method="post">
                <input type="hidden" name="view" value=<?php echo $_SERVER['REQUEST_URI'] ?>>
                <input type="hidden" name="device_id" value=<?php echo $element->id ?>>
                <button type="submit"
                        name="state"
                        value="on"
                        <?php if ($element->state == 1) echo 'disabled'; ?>
                        class="<?php if ($element->state == 1) echo 'active_on'; ?>"
                >ON
                </button>
                <button type="submit"
                        name="state"
                        value="off"
                        <?php if ($element->state == 0) echo 'disabled'; ?>
                        class="<?php if ($element->state == 0) echo 'active_off'; ?>">OFF
                </button>
            </form>
        </div>
    </div>
</div>
