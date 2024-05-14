<?php
include_once("../../Controller/SystemAdmin/activateUserProfileCtl.php");

if (isset($_GET['userprofile_id'])) {
    $userprofile_id = $_GET['userprofile_id'];

    // Set user status to "Active"
    $activateUserProfileCtl = new activateUserProfileCtl();
    $activateUserProfileCtl->activateUserProfile($userprofile_id);

    // Redirect to System admin page
    header("Location: userProfile.php");
    exit();
}
?>