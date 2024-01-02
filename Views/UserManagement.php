<?php
include_once '../wrapper/header.php';
include_once '../wrapper/session_checker.php';
?>

<div class="window">
    <div class="user_window">
        <div class="user_line_labels">
            <label><b>User</b></label>
            <label>Privilege</label>
            <label>Contact</label>
        </div>

        <div class="user_line_box">

            <?php

            include $_SERVER['DOCUMENT_ROOT'] . '/Model/User.php';
            include $_SERVER['DOCUMENT_ROOT'] . '/Model/Store.php';
            use model\User;
            use model\Store;

            $adminStores = Store::getStoresAdmin(User::getSessionUser()->id);

            $users = [];
            foreach ($adminStores as $s) {
                foreach (Store::getStoreUsers($s->id) as $u) {
                    $users[$u->id] = $u;
                }
            }

            $even = 1;

            foreach ($users as $element) {
                include '../Components/UserManagementLine.php';
                $even+=1;
            }

            ?>

        </div>

        <div class="add_button button_down">
            <svg xmlns="http://www.w3.org/2000/svg" height="16" width="14" viewBox="0 0 448 512">
                <!--!Font Awesome Free 6.5.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2023 Fonticons, Inc.-->
                <path d="M256 80c0-17.7-14.3-32-32-32s-32 14.3-32 32V224H48c-17.7 0-32 14.3-32 32s14.3 32 32 32H192V432c0 17.7 14.3 32 32 32s32-14.3 32-32V288H400c17.7 0 32-14.3 32-32s-14.3-32-32-32H256V80z"/>
            </svg>
        </div>
    </div>
</div>

<?php
include_once '../wrapper/footer.php'
?>
