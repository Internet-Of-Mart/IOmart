<div class="window_login">
    <img src="../Assets/IOmart%20Logo.png" alt="">
    <div class="AddUser_box">
        <h4>New User</h4>
        <form action="" method="post">

            <br>

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

            <br>
            <br>

            <label for="EmployeeNumber">Employee Number:
                <input type="text" name="EmployeeNumber" required/>
            </label>

            <label for="EmploymentDate">Employment Date:
                <input type="date" name="EmploymentDate" required/>
            </label>

            <label for="firstname">First Name:
                <input type="text" name="firstname" required/>
            </label>

            <label for="lastname">Last Name:
                <input type="text" name="lastname" required/>
            </label>

            <label for="email">Email:
                <input type="email" name="email" required/>
            </label>

            <label for="telephone">Telephone:
                <input type="tel" name="telephone" required/>
            </label>

            <label for="address">Address:
                <input type="text" name="address" required/>
            </label>

            <label for="DateOfBirth">Date of Birth:
                <input type="date" name="DateOfBirth" required/>
            </label>

            <label for="password">Password:
                <input type="password" name="password" required/>
            </label>

            <label for="confirm_password">Confirm Password:
                <input type="password" name="confirm_password" required/>
            </label>

            <button type="submit">Create</button>
        </form>
    </div>
</div>