<?php
include_once '../wrapper/header.php';
include_once '../wrapper/session_checker.php';

include_once($_SERVER['DOCUMENT_ROOT'] . '/Model/Store.php');
include_once($_SERVER['DOCUMENT_ROOT'] . '/Model/User.php');

use model\Store;
use model\User;

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
                echo strtok($_SERVER["REQUEST_URI"], '?') . '?tab=lights' ?>">Lights</a>
                <a href="<?php
                echo strtok($_SERVER["REQUEST_URI"], '?') . '?tab=temperature' ?>">Temp</a>
                <a href="<?php
                echo strtok($_SERVER["REQUEST_URI"], '?') . '?tab=humidity' ?>">Humidity</a>
            </div>

            <?php

            $sensorType = 0;

            switch ($_GET['tab']) {
                case 'lights':
                    $sensorType = 4;
                    $yAxisLabel = "Kilowatt(Kw)";
                    break;
                case 'temperature':
                    $sensorType = 1;
                    $yAxisLabel = "Temperature(C°)";
                    break;
                case 'humidity':
                    $sensorType = 2;
                    $yAxisLabel = "Humidity(%)";
                    break;
            }

            $element = [];

            foreach ((Store::getStoresAdmin(User::getSessionUser()->id)) as $s) {
                $element = array_merge($element, (Store::getStoreTypeData($sensorType, $s->id)));
            }

            include_once "../Components/graph_MDS.php"
            ?>

        </div>
    </div>
</div>

<?php
include_once '../wrapper/footer.php'
?>
