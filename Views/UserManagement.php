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

        <?php
            include '../Components/AddUser.php'
        ?>

    </div>
</div>

<?php
include_once '../wrapper/footer.php'
?>
