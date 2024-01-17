<script>
    function openForm() {
        document.getElementById("add-user").style.display = "block";
    }

    function closeForm() {
        document.getElementById("add-user").style.display = "none";
    }
</script>

<div class="add_button button_down" onclick="openForm()">
    <svg xmlns="http://www.w3.org/2000/svg" height="16" width="14" viewBox="0 0 448 512">
        <!--!Font Awesome Free 6.5.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2023 Fonticons, Inc.-->
        <path d="M256 80c0-17.7-14.3-32-32-32s-32 14.3-32 32V224H48c-17.7 0-32 14.3-32 32s14.3 32 32 32H192V432c0 17.7 14.3 32 32 32s32-14.3 32-32V288H400c17.7 0 32-14.3 32-32s-14.3-32-32-32H256V80z"/>
    </svg>
</div>

<div class="store-form-popup" id="add-user">

    <h4>New User</h4>
    <form action="" method="post">

        <div class="fieldPadding15px">
            <label for="associated_stores">Associated Stores:
                <select name="associated_stores">
                    <option value="store1">Store 1</option>
                    <option value="store2">Store 2</option>
                    <option value="store3">Store 3</option>
                    <option value="store4">Store 4</option>
                    <option value="store5">Store 5</option>
                </select>
            </label>

            <label for="position">Position:
                <select name="position">
                    <option value="user">User</option>
                    <option value="manager">Manager</option>
                </select>
            </label>
        </div>

        <hr style="margin: 20px"/>

        <div class="fieldPadding15px">
            <label for="firstname">First Name:
                <input type="text" name="firstname" required/>
            </label>

            <label for="lastname">Last Name:
                <input type="text" name="lastname" required/>
            </label>
        </div>

        <hr style="margin: 20px"/>

        <div class="fieldPadding15px">
            <label for="EmployeeNumber">Employee Number:
                <input type="text" name="EmployeeNumber" required/>
            </label>

            <label for="EmploymentDate">Employment Date:
                <input type="date" name="EmploymentDate" required/>
            </label>
        </div>

        <hr style="margin: 20px"/>


        <div class="fieldPadding15px">
            <label for="DateOfBirth">Date of Birth:
                <input type="date" name="DateOfBirth" required/>
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


        <div class="fieldPadding15px">
            <label for="password">Password:
                <input type="password" name="password" required/>
            </label>

            <label for="confirm_password">Confirm Password:
                <input type="password" name="confirm_password" required/>
            </label>
        </div>

        <button type="submit" class="btn">Create User</button>
        <button type="button" class="btn cancel" onclick="closeForm()">Cancel</button>
    </form>

</div>