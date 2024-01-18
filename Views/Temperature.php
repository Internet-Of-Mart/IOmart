<?php
include_once '../wrapper/header.php';
include_once '../wrapper/session_checker.php';
?>

    <div class="window_for_tab">
        <?php
        include_once '../Components/TabContainer.php'
        ?>
        <div class="body_window_container">
            <?php
            include_once($_SERVER['DOCUMENT_ROOT'] . '/Model/Section.php');
            include_once($_SERVER['DOCUMENT_ROOT'] . '/Model/Device.php');

            use model\Section;
            use model\Device;

            if ($_GET['tab'] === null) {
                $path = strtok($_SERVER["REQUEST_URI"], '?') . '?tab=devices';
                header("location: $path");
            }

            if ($_GET['tab'] == 'overview') {
                include_once '../Components/graph_MDS.php';
            }


            if ($_GET['tab'] == 'devices') {
                // A list of all sections of this store
                $elements = Section::getStoreSections($_SESSION['store_id']);
                foreach ($elements as $element) {
                    $devices = Device::getSectionDeviceData($element->id, 2);
                    if(count($devices) < 1) continue;
                    $section = $element;
                    include '../Components/SectionRow.php';
                }
            }
            ?>
        </div>
    </div>
<?php
include_once '../wrapper/footer.php'
?>