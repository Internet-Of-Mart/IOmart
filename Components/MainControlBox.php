<div class="main_controlbox">
    <label class="controlbox_title">Main Control</label>
    <div class="button_container">
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
        <button class="<?php if ($main['off'] == 0 && $main['on'] != 0) echo 'active_on'; ?>">ON</button>
        <button class="<?php if ($main['off'] != 0 && $main['on'] == 0) echo 'active_off'; ?>">OFF</button>
    </div>
</div>
