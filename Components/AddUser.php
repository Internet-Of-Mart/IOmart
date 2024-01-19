<?php /* @var Array $adminStores */?>

<script>
    function openAddForm() {
        document.getElementById("add-user").style.display = "block";
    }
    function closeAddForm() {
        document.getElementById("add-user").style.display = "none";
    }
</script>

<div class="add_button button_down" onclick="openAddForm()">
    <svg xmlns="http://www.w3.org/2000/svg" height="16" width="14" viewBox="0 0 448 512">
        <!--!Font Awesome Free 6.5.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2023 Fonticons, Inc.-->
        <path d="M256 80c0-17.7-14.3-32-32-32s-32 14.3-32 32V224H48c-17.7 0-32 14.3-32 32s14.3 32 32 32H192V432c0 17.7 14.3 32 32 32s32-14.3 32-32V288H400c17.7 0 32-14.3 32-32s-14.3-32-32-32H256V80z"/>
    </svg>
</div>

<div class="store-form-popup" id="add-user">

    <h4>New User</h4>
    <form action="../routing/utilAddUser.php" method="post">
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

        <button type="submit" class="btn">Create User</button>
        <button type="button" class="btn cancel" onclick="closeAddForm()">Cancel</button>
    </form>

</div>