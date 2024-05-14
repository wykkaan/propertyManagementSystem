<?php
include_once("../../Controller/SystemAdmin/activateUserAccountCtl.php");

if (isset($_GET['user_id'])) {
    $user_id = $_GET['user_id'];

    // Set user status to "Active"
    $userAccountCtl = new activateUserAccountCtl();
    $userAccountCtl->activateUserAccount($user_id);

    // Redirect to System admin page
    header("Location: userAccount.php");
    exit();
}
?>