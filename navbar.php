<?php
//Logic to figure out where you are
$loc = substr($_SERVER['SCRIPT_NAME'], strrpos($_SERVER['SCRIPT_NAME'], "/") +1);
?>

<div class="navbar">

    <div class="sub_navbar">
        <img src="../Assets/IOmart%20Logo.png">
        <a href="/routing/utilStoreDeselect.php">Admin Management</a>
        <a style="<?php if ($loc == 'SectionManagement.php') echo "background-color: #9f8c71; color: #ffffff"?>"
           href="/Views/SectionManagement.php"> Section Management </a>
        <a style="<?php if ($loc == 'StoreData.php') echo "background-color: #9f8c71; color: #ffffff"?>"
           href="/Views/StoreData.php"> Store Data</a>
    </div>

    <div class="sub_navbar">
        <h3>Control Panel</h3>
        <a class="nav-link" style="<?php if ($loc == 'Light.php') echo "background-color: #9f8c71; color: #ffffff"?>"
           href="/Views/Light.php"> Lights</a>
        <a class="nav-link" style="<?php if ($loc == 'Temperature.php') echo "background-color: #9f8c71; color: #ffffff"?>"
           href="/Views/Temperature.php"> Temperature </a>
        <a class="nav-link" style="<?php if ($loc == 'Humidity.php') echo "background-color: #9f8c71; color: #ffffff"?>"
           href ="/Views/Humidity.php">Humidity</a>
    </div>


    <div class="user-nav">
        <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 448 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><style>svg{fill:#000000}</style><path d="M224 256A128 128 0 1 0 224 0a128 128 0 1 0 0 256zm-45.7 48C79.8 304 0 383.8 0 482.3C0 498.7 13.3 512 29.7 512H418.3c16.4 0 29.7-13.3 29.7-29.7C448 383.8 368.2 304 269.7 304H178.3z"/></svg>
        <a style="background-color: #ffffff" href ="/Views/AccountPanel.php">Account</a><br><br>
        <form action="../routing/utilLogout.php" method="post">
            <button>
                Logout
            </button>
        </form>
    </div>
</div>