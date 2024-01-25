<?php
include_once '../wrapper/header.php';
include_once '../wrapper/session_checker.php';

include $_SERVER['DOCUMENT_ROOT'] . '/Model/Store.php';
include_once($_SERVER['DOCUMENT_ROOT'] . '/Model/User.php');


use model\Store;
use model\User;

$account = User::getSessionUser();
$cred = User::accountCred($account->id);
$pos = User::getPosition($account->position);
$aff = Store::getUserStores($account->id);

?>

    <div class="window">
        <div class="window_box_container">
            <div class="account_window">
                <div class="account_title_container">
                    <svg xmlns="http://www.w3.org/2000/svg" height="1.5em" viewBox="0 0 448 512">
                        <!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                        <style>svg {
                                fill: #000000
                            }</style>
                        <path d="M224 256A128 128 0 1 0 224 0a128 128 0 1 0 0 256zm-45.7 48C79.8 304 0 383.8 0 482.3C0 498.7 13.3 512 29.7 512H418.3c16.4 0 29.7-13.3 29.7-29.7C448 383.8 368.2 304 269.7 304H178.3z"/>
                    </svg>
                    <h1><?php echo $account->firstname . ' ' . $account->lastname ?> </h1>
                </div>

                <div>
                    <h3>Personal Data</h3>
                    <h5>
                        <label for="email">Email: <?php echo $account->email ?>
                        </label><br>
                    </h5>
                    <h5>
                        <label for="telephone">Telephone: <?php echo $account->telephone ?>
                        </label><br>
                    </h5>
                    <h5>
                        <label for="address">Address: <?php echo $account->address ?>
                        </label><br>
                    </h5>
                    <h5>
                        <label for="date_of_birth">Date Of Birth:
                            <?php echo $account->dob ?>
                        </label><br>
                    </h5>
                </div>


                <div>
                    <h3>Employee Data</h3>
                    <h5>
                        <label for="privilege">Privilege: <?php echo $pos['name']; ?>
                        </label><br>
                    </h5>
                    <h5>
                        <label for="affiliatedStore">Affiliated Stores: <br>
                            <?php foreach ($aff as $store) {
                                echo "- " . $store->name . "<br>";
                            } ?>
                        </label>
                        <br>
                    </h5>

                    <h5><label for="employee_number">Employee
                            Number: <?php echo $account->employee_number ?>
                        </label><br>
                    </h5>
                    <h5>
                        <label for="date_of_employment">Employment
                            Date: <?php echo $account->do_employment ?>
                        </label><br>
                    </h5>
                </div>



                <div>
                    <h3>Credentials</h3>
                    <h5>
                        <label for="username">Username:
                            <?php echo $cred['username'] ?>
                        </label>
                        <br>
                    </h5>
                </div>

                <?php
                include '../Components/EditAccount.php'
                ?>
            </div>
        </div>
    </div>

<?php
include_once '../wrapper/footer.php'
?>