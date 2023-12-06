<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Account Panel</title>
    <style>
        body {
            font-family: "League Spartan", serif;
            margin: 0;
            padding: 0;
            background-color: #DDD6CD;
        }

        .container {
            max-width: 600px;
            margin: 50px auto;
            padding: 20px;
            background-color: #F2EFEB;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 5px;
        }

        label {
            display: block;
            margin-bottom: 8px;
        }

        input {
            width: 100%;
            padding: 8px;
            margin-bottom: 16px;
            box-sizing: border-box;
        }

        button {
            background-color: #00BF62;
            color: #fff;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        button:hover {
            background-color: #00BF62;
        }
    </style>
</head>
<body>

<div class="container">
    <div class="user-nav">
        <div class="account_panel_name">
            <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 448 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><style>svg{fill:#000000}</style><path d="M224 256A128 128 0 1 0 224 0a128 128 0 1 0 0 256zm-45.7 48C79.8 304 0 383.8 0 482.3C0 498.7 13.3 512 29.7 512H418.3c16.4 0 29.7-13.3 29.7-29.7C448 383.8 368.2 304 269.7 304H178.3z"/></svg>
            <h1>Full Name</h1>
        </div>
    <form>
        <h4><label for="fullname">Full Name:</label><br></h4>

        <h4><label for="privilege">Privilege:</label><br></h4>


        <h4><label for="email">Email:</label><br></h4>


        <h4><label for="affiliatedStore">Affiliated Store:</label><br></h4>


        <h4><label for="Change Password">Change Password</label><br></h4>


        <label for="password">Current Password:</label>
        <input type="password" id="password" name="password" required>
        <label for="password">New Password:</label>
        <input type="password" id="password" name="password" required>

        <button type="submit">Save Changes</button>
    </form>
</div>

</body>
</html>
