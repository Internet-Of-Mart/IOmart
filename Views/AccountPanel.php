<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Account Panel</title>
</head>
<body>
<div class="window">
    <div class="window_box_container">
        <div class="window_box">
            <div class="account_title_container">
                <svg xmlns="http://www.w3.org/2000/svg" height="1.5em" viewBox="0 0 448 512">
                    <!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                    <style>svg{fill:#000000}</style>
                    <path d="M224 256A128 128 0 1 0 224 0a128 128 0 1 0 0 256zm-45.7 48C79.8 304 0 383.8 0 482.3C0 498.7 13.3 512 29.7 512H418.3c16.4 0 29.7-13.3 29.7-29.7C448 383.8 368.2 304 269.7 304H178.3z"/></svg> <h1>Full Name</h1>
            </div>
            <form class="account_panel">
                <h4><label for="fullname">Full Name:</label><br></h4>
                <h4><label for="privilege">Privilege:</label><br></h4>
                <h4><label for="email">Email:</label><br></h4>
                <h4><label for="affiliatedStore">Affiliated Store:</label><br></h4>
            </form>
            <h3><label for="Change Password" style="text-decoration:underline;">Change Password</label><br></h3>
            <form class="account_panel">
                <label for="password">Current Password:</label>
                <input type="password" id="password" name="password" required>
                <label for="password">New Password:</label>
                <input type="password" id="password" name="password" required>
                <button class="account_panel_button" type="submit">Save Changes</button>
            </form>
        </div>
    </div>
</div>
</body>
</html>
