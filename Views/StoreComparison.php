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

            $element = [];

            foreach ((Store::getStoresAdmin(User::getSessionUser()->id)) as $s) {
                $element = array_merge($element, (Store::getStoreTypeData(4,$s->id)));
            }

            include_once "../Components/graph_MDS.php"
            ?>

        </div>
    </div>
</div>

<?php
include_once '../wrapper/footer.php'
?>
