<?php
/** @var User $element */
/* @var Array $adminStores */
use model\User;
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

<button class="edit_btn" onclick="openEditForm<?php echo $element->id?>()">
    <?php include '../Assets/editSvg.php'?>
</button>

<div class="store-form-popup" id="<?php echo "edit-user-" . $element->id?>">

    <h4>Editing User</h4>
    <form action="../routing/utilEditUser.php" method="post" style="display: flex; flex-direction: column">
        <input type="hidden" name="user_id" value=<?php echo $element->id ?>>

        <h5>Personal details</h5>

        <div class="fieldPadding15px">
            <label for="first_name">First Name:
                <input type="text" name="first_name" required/>
            </label>

            <label for="last_name">Last Name:
                <input type="text" name="last_name" required/>
            </label>
        </div>

        <div class="fieldPadding15px">
            <label for="date_of_birth">Date of Birth:
                <input type="date" name="date_of_birth" required/>
            </label>
            <label for="address">Address:
                <input type="text" name="address" required/>
            </label>
            <label for="telephone">Telephone:
                <input type="tel" name="telephone" required/>
            </label>
        </div>

        <label for="email">Email:
            <input type="email" name="email" required/>
        </label>


        <hr style="margin: 20px"/>
        <h5>Employment details</h5>

        <div class="fieldPadding15px">
            <label for="store-id">Associated Store:
                <select name="store-id">
                    <?php
                    foreach ($adminStores as $st) {
                        echo "<option value='$st->id'>$st->name</option>";
                    }
                    ?>
                </select>
            </label>

            <label for="position">Position:
                <select name="position">
                    <option value="2">User</option>
                    <option value="3">Manager</option>
                </select>
            </label>
        </div>

        <div class="fieldPadding15px">
            <label for="employee_number">Employee Number:
                <input type="text" name="employee_number" required/>
            </label>

            <label for="date_of_employment">Employment Date:
                <input type="date" name="date_of_employment" required/>
            </label>
        </div>

        <hr style="margin: 20px"/>
        <h5>Credentials</h5>

        <div class="fieldPadding15px">
            <label for="username">Username:
                <input type="text" name="username" required/>
            </label>

            <label for="password">Password:
                <input type="password" name="password" required/>
            </label>

            <label for="confirm_password">Confirm Password:
                <input type="password" name="confirm_password" required/>
            </label>
        </div>

        <div>

            <button type="submit" class="active_on">Edit User</button>
            <button type="button" class="edit_btn cancel" onclick="closeEditForm<?php echo $element->id?>()">Cancel</button>
        </div>
    </form>
</div>
<div id="<?php echo "action-fade-" . $element->id?>" class="black-fade"></div>
