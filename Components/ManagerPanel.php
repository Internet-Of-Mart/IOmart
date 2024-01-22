<?php
/* @var String $loc */
use model\User;
?>

<div class="sub_navbar" id="sub_navbar">
    <img src="../Assets/IOmart%20Logo.png">

    <?php if (User::getSessionUser()->position == 1) echo '<a href="/routing/utilStoreDeselect.php">Admin Management</a>'; ?>

    <a style="<?php if ($loc == 'SectionManagement.php') echo "background-color: #9f8c71; color: #ffffff"?>"
       href="/Views/SectionManagement.php"> Section Management </a>
    <a style="<?php if ($loc == 'StoreData.php') echo "background-color: #9f8c71; color: #ffffff"?>" href="/Views/StoreData.php"> Store Data</a>
</div>