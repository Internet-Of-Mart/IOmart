<?php
/** @var User $account */
/* @var Array $adminStores */
use model\User;

$error = isset($_GET['error']) ? urldecode($_GET['error']) : '';

?>

<script>
    function openEditForm<?php echo $account->id?>() {
        document.getElementById("edit-user-" + <?php echo $account->id?>).style.display = "block";
        document.getElementById("action-fade-" + <?php echo $account->id?>).style.display = "block";
    }

    function closeEditForm<?php echo $account->id?>() {
        document.getElementById("edit-user-" + <?php echo $account->id?>).style.display = "none";
        document.getElementById("action-fade-" + <?php echo $account->id?>).style.display = "none";

    }
</script>

<button class="edit_btn" onclick="openEditForm<?php echo $account->id ?>()">
    <?php include '../Assets/editSvg.php' ?>
</button>

<div class="store-form-popup" id="<?php echo "edit-user-" . $account->id ?>">

    <h4>Editing User</h4>
    <form action="../routing/utilEditAccount.php" method="post" style="display: flex; flex-direction: column">
        <input type="hidden" name="user_id" value=<?php echo $account->id ?>>
        <input type="hidden" name="employee_number" value=<?php echo $account->employee_number ?>>
        <input type="hidden" name="date_of_employment" value=<?php echo $account->do_employment ?>>


        <h5>Personal details</h5>

        <div class="fieldPadding15px">
            <label for="first_name">First Name:
                <input type="text" name="first_name" value="<?php echo $account->firstname ?>" required/>
            </label>

            <label for="last_name">Last Name (in Uppercase):
                <input type="text" name="last_name" value="<?php echo $account->lastname ?>" pattern="[A-Z]+" required/>
            </label>
        </div>

        <div class="fieldPadding15px">
            <label for="date_of_birth">Date of Birth:
                <input type="date" name="date_of_birth" value="<?php echo $account->dob ?>" required/>
            </label>
            <label for="address">Address:
                <input type="text" name="address" value="<?php echo $account->address ?>" required/>
            </label>
            <label for="telephone">Telephone:
                <input type="tel" name="telephone" value="<?php echo $account->telephone ?>" required/>
            </label>
        </div>

        <label for="email">Email:
            <input type="email" name="email" value="<?php echo $account->email ?>" required/>
        </label>

        <hr style="margin: 20px"/>
        <h5>Credentials</h5>

        <div class="fieldPadding15px">
            <label for="username">Username:
                <input type="text" value="<?php echo User::getCred($account->id)["username"] ?>" name="username" required/>
            </label>

            <label for="password">Password:
                <input type="password" name="password"/>
            </label>

            <label for="confirm">Confirm Password:
                <input type="password" name="confirm"/>
            </label>
        </div>

        <label class="error"><?php echo $error;?></label> <br>

        <div>
            <button type="submit" class="active_on">Edit User</button>
            <button type="button" class="edit_btn cancel" onclick="closeEditForm<?php echo $account->id ?>()">Cancel
            </button>
        </div>
    </form>
</div>
<div id="<?php echo "action-fade-" . $account->id ?>" class="black-fade"></div>
