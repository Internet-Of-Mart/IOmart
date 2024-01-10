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
                if ($_GET['tab'] !== 'overview') {
                    include_once '../Components/MainControlBox.php';
                }
                ?>

            </div>

            <div class="row_container">

                <?php

                include_once($_SERVER['DOCUMENT_ROOT'] . '/Model/Section.php');
                include_once($_SERVER['DOCUMENT_ROOT'] . '/Model/Device.php');

                use model\Device;
                use model\Section;

                // TODO: Add logic to retrieve sensors
                // TODO: Rework sensor tab into graph sensor tab

                if ($_GET['tab'] === null) {
                    $path = strtok($_SERVER["REQUEST_URI"], '?') . '?tab=sections';
                    header("location: $path");
                }

                if ($_GET['tab'] == 'sections') {
                    $elements = [ /*Get data from db instead*/
                        Section::generateDemo1(),
                        Section::generateDemo2(),
                        Section::generateDemo3()
                    ];

                    foreach ($elements as $element) {
                        include '../Components/ControlBox.php';
                    }
                }

                if ($_GET['tab'] == 'devices') {
                    $elements = [ /*Get data from db instead*/
                        Device::generateDemo(),
                        Device::generateDemo2()
                    ];

                    foreach ($elements as $element) {
                        include '../Components/ControlBox.php';
                    }
                }
                if ($_GET['tab'] == 'overview') {
                    include "../Components/graph_1DS.php";
                }
                ?>

            </div>
        </div>
    </div>


<?php
include_once '../wrapper/footer.php'
?>