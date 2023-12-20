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

                // TODO: Add logic to retrieve sensors
                // TODO: Rework sensor tab into graph sensor tab

                if ($_GET['tab'] === null) {
                    $path = strtok($_SERVER["REQUEST_URI"], '?') . '?tab=sensors';
                    header("location: $path");
                }

                if ($_GET['tab'] == 'devices') {
                    $elements = [ /*Get data from db instead*/
                        Sensor::generateDemo(),
                        Sensor::generateDemo2()
                    ];

                    foreach ($elements as $element) {
                        include '../Components/ControlBox.php';
                    }
                }

                if ($_GET['tab'] == 'sensors') {
                    //TODO: Include graph of sensors here
                }

                ?>

            </div>
        </div>
    </div>


<?php
include_once '../wrapper/footer.php'
?>