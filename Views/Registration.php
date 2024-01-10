<?php
include_once '../wrapper/header.php';
?>
<div class="window_login">
    <img src="../Assets/IOmart%20Logo.png" alt="">
    <div class="Registration_box">
        <h4>Registration</h4>
        <form action="" method="post">

            <label for="EmployeeNumber">Employee Number:
            <input type="text" name="EmployeeNumber" required/>
            </label>

            <label for="username">Firstname:
                <input type="text" name="username" required/>
            </label>

            <label for="username">Lastname:
                <input type="text" name="username" required/>
            </label>

            <label for="password">Password:
                <input type="password" name="password" required/>
            </label>

            <label for="confirm">Confirm Password:
                <input type="password" name="confirm password" required/>
            </label>

            <label for="email">Email:
                <input type="email" name="email" required/>
            </label>

            <label for="Telephone">Telephone:
                <input type="tel" name="telephone" required/>
            </label>

            <label for="address">Address:
                <input type="text" name="address" required/>
            </label>

            <label for="DateOfBirth">DateOfBirth:
                <input type="date" name="DateOfBirth" required/>
            </label>

            <label for="EmploymentDate">EmploymentDate:
                <input type="date" name="username" required/>
            </label>
            <button type="submit">Create</button>
        </form>
    </div>
</div>

<?php
include_once '../wrapper/footer.php';
?>
