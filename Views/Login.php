

<div class="window_login">
    <img src="./Assets/IOmart%20Logo.png" alt="">
    <div class="login_box">
        <h2>Login</h2>
        <form action="./routing/utilLogin.php" method="post">
            <label for="username">Username:
                <input type="text" name="username" required />
            </label>

            <label for="password">Password:
                <input type="password" name="password" required />
            </label>

            <button type="submit">Login</button>
        </form>

        <p>Not a member? <a href="./Views/Registration.php">Register</a></p>
    </div>
</div>
