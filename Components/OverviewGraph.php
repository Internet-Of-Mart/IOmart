<?php /** @var Array $element */ ?>
<?php /** @var String $yAxisLabel */
if (!isset($yAxisLabel)) $yAxisLabel = "Kilowatt(Kw)";
?>

<div class="window_box" style="position:fixed; top: 25vh; right: 25vw">
    <?php
    include_once '../Components/graph_MDS.php';
    ?>
</div>

