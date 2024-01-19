<?php
/** @var Section $element */
use model\Section;
?>

<script>
    function openDeleteForm<?php echo $element->id?>() {
        document.getElementById("delete-user-" + <?php echo $element->id?>).style.display = "block";
        document.getElementById("action-fade-" + <?php echo $element->id?>).style.display = "block";
    }

    function closeDeleteForm<?php echo $element->id?>() {
        document.getElementById("delete-user-" + <?php echo $element->id?>).style.display = "none";
        document.getElementById("action-fade-" + <?php echo $element->id?>).style.display = "none";

    }
</script>

<button class="active_off" onclick="openDeleteForm<?php echo $element->id?>()">
    <?php include '../Assets/deleteSvg.php'?>
</button>

<div class="form-popup" id="<?php echo "delete-user-" . $element->id?>">
    <label>
        Do you wish to delete <?php echo $element->name ?> ?
    </label>
    <form action="../routing/utilDeleteSection.php" method="post" class="store-form-container">
        <input type="hidden" name="section_id" value=<?php echo $element->id ?>>

        <button type="submit" class="active_off">Delete Section</button>
        <button type="button" class="edit_btn cancel" onclick="closeDeleteForm<?php echo $element->id?>()">Cancel</button>
    </form>
</div>
<div id="<?php echo "action-fade-" . $element->id?>" class="black-fade"></div>

