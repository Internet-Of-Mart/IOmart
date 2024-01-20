<?php /** @var Store $element */
include_once($_SERVER['DOCUMENT_ROOT'] . '/Model/Store.php');
use model\Store;
?>

<script>
    function editForm(id, name, address) {
        console.log("Edit form clicked:",id, name, address);
        document.getElementById("id").value = id;
        document.getElementById("name").value = name;
        document.getElementById("address").value = address;
        document.getElementById("edit-store").style.display = "block";
        document.getElementById("action-fade").style.display = "block";

    }

    function closeForm2() {
        document.getElementById("edit-store").style.display = "none";
        document.getElementById("action-fade").style.display = "none";

    }

    function confirmDelete(id) {
        if (confirm("Delete Store?")){
            document.getElementById("id").value = id;
            document.getElementById("btnDelete").value = "1";
            document.forms['edit-store'].submit();
        } else {
            window.location.href = '../Views/StoreManagement.php';
            return false;
         }
     }
 </script>

 <div class="storebox">
     <h3><?php echo $element->name ?></h3>
    <div class="image_placeholder">
        <svg xmlns="http://www.w3.org/2000/svg" height="48" width="60" viewBox="0 0 640 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M36.8 192H603.2c20.3 0 36.8-16.5 36.8-36.8c0-7.3-2.2-14.4-6.2-20.4L558.2 21.4C549.3 8 534.4 0 518.3 0H121.7c-16 0-31 8-39.9 21.4L6.2 134.7c-4 6.1-6.2 13.2-6.2 20.4C0 175.5 16.5 192 36.8 192zM64 224V384v80c0 26.5 21.5 48 48 48H336c26.5 0 48-21.5 48-48V384 224H320V384H128V224H64zm448 0V480c0 17.7 14.3 32 32 32s32-14.3 32-32V224H512z"/></svg>
    </div>
    <h4><?php echo $element->address ?></h4>
    <form action="../routing/utilStoreSelect.php" method="post">
        <input type="hidden" name="store_id" value=<?php echo $element->id?>>
        <input type="submit" value="Select store" />
    </form>
    <div class="edit_button" style="background-color: white" onclick="editForm('<?php echo $element->id ?>', '<?php echo $element->name ?>', '<?php echo $element->address ?>')">
        <svg xmlns="http://www.w3.org/2000/svg" height="16" width="16" viewBox="0 0 512 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
            <path d="M410.3 231l11.3-11.3-33.9-33.9-62.1-62.1L291.7 89.8l-11.3 11.3-22.6 22.6L58.6 322.9c-10.4 10.4-18 23.3-22.2 37.4L1 480.7c-2.5 8.4-.2 17.5 6.1 23.7s15.3 8.5 23.7 6.1l120.3-35.4c14.1-4.2 27-11.8 37.4-22.2L387.7 253.7 410.3 231zM160 399.4l-9.1 22.7c-4 3.1-8.5 5.4-13.3 6.9L59.4 452l23-78.1c1.4-4.9 3.8-9.4 6.9-13.3l22.7-9.1v32c0 8.8 7.2 16 16 16h32zM362.7 18.7L348.3 33.2 325.7 55.8 314.3 67.1l33.9 33.9 62.1 62.1 33.9 33.9 11.3-11.3 22.6-22.6 14.5-14.5c25-25 25-65.5 0-90.5L453.3 18.7c-25-25-65.5-25-90.5 0zm-47.4 168l-144 144c-6.2 6.2-16.4 6.2-22.6 0s-6.2-16.4 0-22.6l144-144c6.2-6.2 16.4-6.2 22.6 0s6.2 16.4 0 22.6z"/></svg>
    </div>
    <div class="store-form-popup" id="edit-store">
        <form action="../routing/utilStoreEdit.php?" method="post" class="store-form-container">
            <label>
                <input type="hidden" id="id" name="id" value="" />
            </label>
            <label class="padding-right15" for="name">Store Name:
                <input type="text" id="name" name="name" required value="" />
            </label>
            <label for="address">Address:
                <input type="text" id="address" name="address" required value="" />
            </label>
            <button name='btnSave' type="submit" class="btn">Save</button>
            <button type="button" class="btn cancel" onclick="closeForm2()">Cancel</button>
            <button name='btnDelete' type="submit" class="button_del" onclick="return confirmDelete(<?php echo $element->id ?>)">Delete</button>
        </form>
    </div>
</div>
<div id="<?php echo "action-fade"?>" class="black-fade"></div>
