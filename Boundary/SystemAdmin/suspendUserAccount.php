<?php
include_once("../../Controller/SystemAdmin/suspendUserAccountCtl.php");

if (isset($_GET['user_id'])) {
    $user_id = $_GET['user_id'];

    // Set user status to "Suspended"
    $userAccountCtl = new suspendUserAccountCtl();
    $userAccountCtl->suspendUserAccount($user_id);

    // Redirect to System admin page
    header("Location: ./userAccount.php");
    exit();
}
?>
