<?php
include_once("../../Controller/SystemAdmin/suspendUserProfileCtl.php");

if (isset($_GET['userprofile_id'])) {
    $userprofile_id = $_GET['userprofile_id'];

    // Set user status to "Suspended"
    $suspendUserProfileCtl = new suspendUserProfileCtl();
    $suspendUserProfileCtl->suspendUserProfile($userprofile_id);

    // Redirect to System admin page
    header("Location: ./userProfile.php");
    exit();
}
?>