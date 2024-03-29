<div class="controlbox">
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

    <div class="value_display_container">
        <div class="value_set_container">
            <div class="value_inline_container">
                <label>
                    <?php
                    echo $element->set_value . ' ' . $element->unit_type ?>
                </label>
                <form action="../routing/utilChangeDeviceValue.php" method="post">
                    <div class="arrow_button_container">

                        <input type="hidden" name="view" value=<?php echo $_SERVER['REQUEST_URI'] ?>>
                        <input type="hidden" name="device_id" value=<?php echo $element->id ?>>

                        <button type="submit"
                                name="new_value"
                                value=<?php echo $element->set_value + 1 ?>
                        >
                            <svg xmlns="http://www.w3.org/2000/svg" height="2em" viewBox="0 0 320 512">
                                <!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                                <path d="M182.6 137.4c-12.5-12.5-32.8-12.5-45.3 0l-128 128c-9.2 9.2-11.9 22.9-6.9 34.9s16.6 19.8 29.6 19.8H288c12.9 0 24.6-7.8 29.6-19.8s2.2-25.7-6.9-34.9l-128-128z"/>
                            </svg>
                        </button>
                        <button type="submit"
                                name="new_value"
                                value=<?php echo $element->set_value - 1 ?>
                        >
                            <svg xmlns="http://www.w3.org/2000/svg" height="2em" viewBox="0 0 320 512">
                                <!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                                <path d="M137.4 374.6c12.5 12.5 32.8 12.5 45.3 0l128-128c9.2-9.2 11.9-22.9 6.9-34.9s-16.6-19.8-29.6-19.8L32 192c-12.9 0-24.6 7.8-29.6 19.8s-2.2 25.7 6.9 34.9l128 128z"/>
                            </svg>
                        </button>
                    </div>
                </form>

            </div>
            <div>
                <label>SET</label>
            </div>
        </div>
        <div class="value_set_container">
            <div class="value_inline_container">
                <label>
                    <?php
                    echo $element->actual_value . ' ' . $element->unit_type ?>
                </label>
            </div>
            <div>
                <label>ACTUAL</label>
            </div>
        </div>
    </div>
</div>
