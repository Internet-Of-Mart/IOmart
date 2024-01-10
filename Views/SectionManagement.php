<?php
include_once '../wrapper/header.php';
include_once '../wrapper/session_checker.php';
?>

<div class="window">
    <div class="window_section_container">

        <?php
        include_once($_SERVER['DOCUMENT_ROOT'] . '/Model/Section.php');

        use model\Section;

        $elements = [ /*Get data from db instead*/
            Section::generateDemo1(),
            Section::generateDemo2(),
            Section::generateDemo3()
        ];

        foreach ($elements as $element) {
            include '../Components/SectionManagementBox.php';
        }

        ?>

        <?php
        include '../Components/SectionAddButton.php';
        ?>

    </div>
</div>

<?php
include_once '../wrapper/footer.php'
?>
