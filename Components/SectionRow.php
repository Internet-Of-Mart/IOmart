<div class="section_row_container">
    <h3><?php /** @var $element */
        echo $element->name;
        $currSection=$element->id;
        ?>
    </h3>
    <div class="row_container">
        <?php
        include_once($_SERVER['DOCUMENT_ROOT'] . '/Model/Device.php');
        use model\Device;

        $elements = [/*Get data from db instead*/
            Device::generateDemo(),
            Device::generateDemo2(),
            Device::generateDemo3(),
            Device::generateDemo4(),
        ];

        foreach ($elements as $element) {
            include '../Components/ControlBox.php';
        }

        ?>
    </div>
</div>
