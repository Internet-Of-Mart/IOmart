<?php
include_once '../wrapper/header.php';
$error = isset($_GET['error']) ? urldecode($_GET['error']) : '';
?>
<div class="window_login">
    <img src="../Assets/IOmart%20Logo.png" alt="">
    <div class="Registration_box">
        <h4>Registration</h4>
        <label class="error"><?php echo $error;?></label> <br>
        <form action="../routing/utilRegistration.php" method="post">


            <h5>Personal Data</h5>
            <div class="fieldPadding15px">
                <label class="padding-right15" for="last_name">Lastname:
                    <input type="text" name="last_name" required/>
                </label>

                <label class="padding-right15" for="first_name">Firstname:
                    <input type="text" name="first_name" required/>
                </label>
            </div>

            <label for="email">Email:
                <input type="email" name="email" required/>
            </label>

            <label for="telephone">Telephone:
                <input type="tel" name="telephone" required/>
            </label>

            <label for="address">Address:
                <input type="text" name="address" required/>
            </label>

            <label for="date_of_birth">DateOfBirth:
                <input type="date" name="date_of_birth" required/>
            </label>

            <hr style="margin: 20px"/>
            <h5>Employment Data</h5>

            <label for="employee_number">Employee Number:
                <input type="text" name="employee_number" required/>
            </label>

            <label for="date_of_employment">EmploymentDate:
                <input type="date" name="date_of_employment" required/>
            </label>

            <hr style="margin: 20px"/>
            <h5>Credentials</h5>

            <label for="username">Username:
                <input type="text" name="username" required/>
            </label>

            <label for="password">Password:
                <input type="password" name="password" required/>
            </label>

            <label for="confirm">Confirm Password:
                <input type="password" name="confirm"  required/>
            </label>

            <button type="submit">Create</button>
        </form>
    </div>
</div>

<?php
include_once '../wrapper/footer.php';
?>
