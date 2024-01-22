<?php
/** @var User $account */
include_once $_SERVER['DOCUMENT_ROOT'] . '/Model/Store.php';
use model\Store;
use model\User;

$cred = User::accountCred($account->id);
$aff = Store::getUserStores($account->id);
$error = isset($_GET['error']) ? urldecode($_GET['error']) : '';
?>

<script>
    function openEditForm() {
        document.getElementById("edit-account").style.display = "block";
        document.getElementById("action-fade").style.display = "block";
    }

    function closeEditAccountForm() {
        document.getElementById("edit-account").style.display = "none";
        document.getElementById("action-fade").style.display = "none";

    }
</script>

<button class="edit_account" style="background-color: white" onclick="openEditForm()">
    <svg xmlns="http://www.w3.org/2000/svg" height="16" width="16" viewBox="0 0 512 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
        <path d="M410.3 231l11.3-11.3-33.9-33.9-62.1-62.1L291.7 89.8l-11.3 11.3-22.6 22.6L58.6 322.9c-10.4 10.4-18 23.3-22.2 37.4L1 480.7c-2.5 8.4-.2 17.5 6.1 23.7s15.3 8.5 23.7 6.1l120.3-35.4c14.1-4.2 27-11.8 37.4-22.2L387.7 253.7 410.3 231zM160 399.4l-9.1 22.7c-4 3.1-8.5 5.4-13.3 6.9L59.4 452l23-78.1c1.4-4.9 3.8-9.4 6.9-13.3l22.7-9.1v32c0 8.8 7.2 16 16 16h32zM362.7 18.7L348.3 33.2 325.7 55.8 314.3 67.1l33.9 33.9 62.1 62.1 33.9 33.9 11.3-11.3 22.6-22.6 14.5-14.5c25-25 25-65.5 0-90.5L453.3 18.7c-25-25-65.5-25-90.5 0zm-47.4 168l-144 144c-6.2 6.2-16.4 6.2-22.6 0s-6.2-16.4 0-22.6l144-144c6.2-6.2 16.4-6.2 22.6 0s6.2 16.4 0 22.6z"/></svg>
</button>

<div class="store-form-popup" id="edit-account">
    <h4>Editing Account <span class="error"><?php echo $error;?></span></h4>
    <form action="../routing/utilEditAccount.php" method="post" style="display: flex; flex-direction: column">
        <input type="hidden" name="user_id" value=<?php echo $account->id ?>>
        <input type="hidden" name="old_username" value=<?php echo $cred['username']?>>
        <input type="hidden" name="date_of_employment" value=<?php echo $account->do_employment?>>
        <input type="hidden" name="employee_number" value=<?php echo $account->employee_number ?>>
        <input type="hidden" name="position" value=<?php echo $account->position ?>>
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
        <h5>Employment details</h5>
        <h6>* No Access to Employee Detail Editing. Only Accesible form User Management [ADMIN ONLY} *</h6>

        <hr style="margin: 20px"/>
        <h5>Credentials</h5>

        <div class="fieldPadding15px">
            <label for="username"> Username:
                <input type="text" name="username" value="<?php echo $cred['username']?>" required />
            </label>
            <label for="password">Current Password:
                <input type="password" name="password" required/>
            </label>

            <label for="confirm_password">New Password: (Not required)
                <input type="password" name="newpass"/>
            </label>
        </div>

        <button type="submit" class="btn">Save Changes</button>
        <button type="button" class="btn cancel" onclick="closeEditAccountForm()">Cancel</button>
    </form>
</div>
<div id="<?php echo "action-fade"?>" class="black-fade"></div>

