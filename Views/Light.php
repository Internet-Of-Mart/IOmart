<?php
include_once '../wrapper/header.php';
include_once '../wrapper/session_checker.php';
?>
<div class="window_for_tab">
    <div class="body_window_container">

        <?php
        include_once '../Components/MainControlBox.php';
        ?>

        <div class="row_container">

            <?php
            include_once($_SERVER['DOCUMENT_ROOT'] . '/Model/Section.php');

            use model\Section;

            $elements = [ /*Get data from db instead*/
                Section::generateDemo1(),
                Section::generateDemo2(),
                Section::generateDemo3()
            ];

            foreach ($elements as $element) {
                include '../Components/ControlBox.php';
            }

            ?>

        </div>
    </div>

</div>
<?php
include_once '../wrapper/footer.php'
?>
