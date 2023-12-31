<?php /** @var Store $element */
include_once($_SERVER['DOCUMENT_ROOT'] . '/Model/Store.php');
use model\Store;
?>

<div class="controlbox">
    <div class="Storebox">
        <h4><?php echo $element->name ?></h4>
        <div class="image_placeholder">
            <div class="flex_image_placeholder"></div>
        </div>
        <h3><?php echo $element->address ?></h3>
        <form action="../routing/utilStoreSelect.php" method="post">
            <input type="hidden" name="store_id" value=<?php echo $element->id?>>
            <input type="submit" value="Select store" />
        </form>
    </div>
</div>

