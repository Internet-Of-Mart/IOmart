<?php
include_once '../wrapper/header.php';
include_once '../wrapper/session_checker.php';


include_once($_SERVER['DOCUMENT_ROOT'] . '/Model/Store.php');

use model\Store;
?>

<div class="window">
    <div class="window_box_container">
        <div class="window_box">
            <?php
            if ($_GET['tab'] === null) {
                $path = strtok($_SERVER["REQUEST_URI"], '?') . '?tab=lights';
                header("location: $path");
            }
            ?>

            <div class="tab_container">
                <a href="<?php
                echo strtok($_SERVER["REQUEST_URI"], '?') . '?tab=lights' ?>"
                   style="<?php if ($_GET['tab'] == 'lights') echo "background-color: #9f8c71; color: #ffffff"?>">Lights</a>
                <a href="<?php
                echo strtok($_SERVER["REQUEST_URI"], '?') . '?tab=temperature' ?>"
                   style="<?php if ($_GET['tab'] == 'temperature') echo "background-color: #9f8c71; color: #ffffff"?>">Temp</a>
                <a href="<?php
                echo strtok($_SERVER["REQUEST_URI"], '?') . '?tab=humidity' ?>"
                   style="<?php if ($_GET['tab'] == 'humidity') echo "background-color: #9f8c71; color: #ffffff"?>">Humidity</a>
            </div>

            <?php

            $sensorType = 0;

            switch ($_GET['tab']) {
                case 'lights':
                    $sensorType = 4;
                    $yAxisLabel = "Kilowatt(Kw)";
                    break;
                case 'temperature':
                    $sensorType = 5;
                    $yAxisLabel = "Kilowatt(Kw)";
                    break;
                case 'humidity':
                    $sensorType = 6;
                    $yAxisLabel = "Kilowatt(Kw)";
                    break;
            }

            $element = Store::getStoreTypeData($sensorType, $_SESSION['store_id']);

            include_once "../Components/graph_MDS.php"
            ?>
        </div>
    </div>
</div>

<?php
include_once '../wrapper/footer.php'
?>
