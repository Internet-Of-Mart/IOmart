<?php
/** @var User $element */

/* @var Array $adminStores */

use model\User;
use model\Store;

?>


<script>
    function openEditForm<?php echo $element->id?>() {
        document.getElementById("edit-user-" + <?php echo $element->id?>).style.display = "block";
        document.getElementById("action-fade-" + <?php echo $element->id?>).style.display = "block";
    }

    function closeEditForm<?php echo $element->id?>() {
        document.getElementById("edit-user-" + <?php echo $element->id?>).style.display = "none";
        document.getElementById("action-fade-" + <?php echo $element->id?>).style.display = "none";

    }
</script>

<button class="edit_btn" onclick="openEditForm<?php echo $element->id ?>()">
    <?php include '../Assets/editSvg.php' ?>
</button>

<div class="store-form-popup" id="<?php echo "edit-user-" . $element->id ?>">

    <h4>Editing User</h4>
    <form action="../routing/utilEditUser.php" method="post" style="display: flex; flex-direction: column">
        <input type="hidden" name="user_id" value=<?php echo $element->id ?>>

        <h5>Personal details</h5>

        <div class="fieldPadding15px">
            <label for="first_name">First Name:
                <input type="text" name="first_name" value="<?php echo $element->firstname ?>" required/>
            </label>

            <label for="last_name">Last Name:
                <input type="text" name="last_name" value="<?php echo $element->lastname ?>" required/>
            </label>
        </div>

        <div class="fieldPadding15px">
            <label for="date_of_birth">Date of Birth:
                <input type="date" name="date_of_birth" value="<?php echo $element->dob ?>" required/>
            </label>
            <label for="address">Address:
                <input type="text" name="address" value="<?php echo $element->address ?>" required/>
            </label>
            <label for="telephone">Telephone:
                <input type="tel" name="telephone" value="<?php echo $element->telephone ?>" required/>
            </label>
        </div>

        <label for="email">Email:
            <input type="email" name="email" value="<?php echo $element->email ?>" required/>
        </label>


        <hr style="margin: 20px"/>
        <h5>Employment details</h5>

        <div class="fieldPadding15px">
            <label for="store-id">Associated Store:
                <select name="store_id">
                    <?php
                    $userStores = Store::getUserStores($element->id);
                    $storesID = array_map(function ($s) { return $s->id; }, $userStores);

                    foreach ($adminStores as $st) {
                        $select = '';
                        if (in_array($st->id, $storesID)) echo $select = 'selected';
                        echo "<option " . $select . " value='$st->id'>$st->name</option>";
                    }
                    ?>
                </select>
            </label>

            <label for="position">Position:
                <select name="position">
                    <option <?php if ($element->position == 2) echo 'selected' ?> value="2">Manager</option>
                    <option <?php if ($element->position == 3) echo 'selected' ?> value="3">User</option>
                </select>
            </label>
        </div>

        <div class="fieldPadding15px">
            <label for="employee_number">Employee Number:
                <input type="text" name="employee_number" value="<?php echo $element->employee_number ?>" required/>
            </label>

            <label for="date_of_employment">Employment Date:
                <input type="date" name="date_of_employment" value="<?php echo $element->do_employment ?>" required/>
            </label>
        </div>

        <div>

            <button type="submit" class="active_on">Edit User</button>
            <button type="button" class="edit_btn cancel" onclick="closeEditForm<?php echo $element->id ?>()">Cancel
            </button>
        </div>
    </form>
</div>
<div id="<?php echo "action-fade-" . $element->id ?>" class="black-fade"></div>
