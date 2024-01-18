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
            <button class="<?php if ($element->state == 1) echo 'active_on';?>">ON</button>
            <button class="<?php if ($element->state == 0) echo 'active_off';?>">OFF</button>
        </div>
    </div>
</div>
