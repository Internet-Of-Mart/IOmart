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
                include '../Components/ControlBox.php';
                include '../Components/ControlBox.php';
                ?>
            </div>
        </div>
    </div>


<?php
include_once '../wrapper/footer.php'
?>