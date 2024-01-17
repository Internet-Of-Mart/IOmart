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
            <div class="graph_window">
                <?php
                include_once "../Components/graph_1DS.php"
                ?>
            </div>
            <div class="store_index_container">
                <div class="color_box"></div>
                <a>STORENAME</a>
            </div>
        </div>
    </div>
</div>
