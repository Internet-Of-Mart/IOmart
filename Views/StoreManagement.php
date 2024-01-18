<?php
include_once '../wrapper/header.php';
include_once '../wrapper/session_checker.php';
?>
<div class="window">
    <div class="store_window">

        <?php

        include_once($_SERVER['DOCUMENT_ROOT'] . '/Model/Store.php');
        include_once($_SERVER['DOCUMENT_ROOT'] . '/Model/User.php');

        use model\Store;
        use model\User;

        $elements = Store::getStoresAdmin(User::getSessionUser()->id);

        foreach ($elements as $element) {
            include '../Components/storeBox.php';
        }

        ?>
        <?php include '../Components/AddStore.php' ?>
    </div>
</div>
<?php
include_once '../wrapper/footer.php'
?>
