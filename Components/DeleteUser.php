<?php
/** @var User $element */
/** @var int $even */
use model\User;
?>

<script>
    function openDeleteForm() {
        document.getElementById("delete-user").style.display = "block";
        document.getElementById("action-fade").style.display = "block";
    }

    function closeDeleteForm() {
        document.getElementById("delete-user").style.display = "none";
        document.getElementById("action-fade").style.display = "none";

    }
</script>

<button class="active_off" onclick="openDeleteForm()">
    <?php include '../Assets/deleteSvg.php'?>
</button>

<div class="form-popup" id="delete-user">
    <label>
        Do you wish to delete <?php echo $element->firstname . " " . $element->lastname?> ?
    </label>
    <form action="../routing/utilDeleteUser.php" method="post" class="store-form-container">
        <button type="submit" class="active_off">Delete User</button>
        <button type="button" class="edit_btn cancel" onclick="closeDeleteForm()">Cancel</button>
    </form>
</div>
<div id="action-fade" class="black-fade"></div>


