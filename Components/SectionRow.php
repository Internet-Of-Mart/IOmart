<div class="section_row_container">
    <h2><?php
        include_once($_SERVER['DOCUMENT_ROOT'] . '/Model/Section.php');
        include_once($_SERVER['DOCUMENT_ROOT'] . '/Model/Device.php');
        use model\Section;
        use model\Device;

//        /** @var Section $element */
//        $currSection=$element->id;

        /** @var Device $devices*/
        /** @var Section $section*/
        echo $section->name;

        ?>
    </h2>
    <div class="row_container">
        <?php

        foreach ($devices as $element) {
            if ($element->type_name=='Light') {
                include '../Components/LightControlBox.php';
            }else {
                include '../Components/ControlBox.php';
            }
        }

        ?>
    </div>
</div>
