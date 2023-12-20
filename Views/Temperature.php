<?php
include_once '../wrapper/header.php';
include_once '../wrapper/session_checker.php';
include_once '../navbar.php';
?>
    <div class="window_for_tab">
        <?php
        include_once '../Components/TabContainer.php'
        ?>
        <div class="body_window_container">
            <div class="row_container">

                <?php
                include_once '../Components/MainControlBox.php';
                ?>

            </div>

            <div class="row_container">

                <?php

                include_once($_SERVER['DOCUMENT_ROOT'] . '/Model/Sensor.php');

                use model\Sensor;

                $elements = [ /*Get data from db isntead*/
                    Sensor::generateDemo(),
                    Sensor::generateDemo2()
                ];

                foreach ($elements as $sensor) {
                    include '../Components/ControlBox.php';
                }

                ?>

            </div>
        </div>
    </div>


<?php
include_once '../wrapper/footer.php'
?>