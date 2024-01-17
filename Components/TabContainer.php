<?php
if ($_GET['tab'] === null) {
    $path = strtok($_SERVER["REQUEST_URI"], '?') . '?tab=devices';
    header("location: $path");
}
?>

<div class="tab_container">
    <a href="<?php
    echo strtok($_SERVER["REQUEST_URI"], '?') . '?tab=devices' ?>"
    style="<?php if ($_GET['tab'] == 'devices') echo "background-color: #9f8c71; color: #ffffff"?>">Devices</a>
    <a href="<?php
    echo strtok($_SERVER["REQUEST_URI"], '?') . '?tab=overview' ?>"
    style="<?php if ($_GET['tab'] == 'overview') echo "background-color: #9f8c71; color: #ffffff"?>">Overview</a>
</div>


