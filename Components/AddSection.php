<script>
    function openForm() {
        document.getElementById("add-section").style.display = "block";
        document.getElementById("action-fade").style.display = "block";

    }
    function closeForm() {
        document.getElementById("add-section").style.display = "none";
        document.getElementById("action-fade").style.display = "none";
    }
</script>

<div class="add_button button_down" style="background-color: #F2EFEB" onclick="openForm()">
    <svg xmlns="http://www.w3.org/2000/svg" height="16" width="14" viewBox="0 0 448 512">
        <!--!Font Awesome Free 6.5.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2023 Fonticons, Inc.-->
        <path d="M256 80c0-17.7-14.3-32-32-32s-32 14.3-32 32V224H48c-17.7 0-32 14.3-32 32s14.3 32 32 32H192V432c0 17.7 14.3 32 32 32s32-14.3 32-32V288H400c17.7 0 32-14.3 32-32s-14.3-32-32-32H256V80z"/>
    </svg>
</div>

<div class="store-form-popup" id="add-section">
    <form action="../routing/utilSectionCreate.php" method="post" class="store-form-container">
        <input type="hidden" name="store_id" value=<?php echo $_SESSION['store_id'] ?>>

        <label class="padding-right15" for="name">Section Name:
            <input type="text" name="name" required/>
        </label>

        <button type="submit" class="active_on">Create Section</button>
        <button type="button" class="active_off" onclick="closeForm()">Cancel</button>
    </form>
</div>
<div id="<?php echo "action-fade"?>" class="black-fade"></div>
