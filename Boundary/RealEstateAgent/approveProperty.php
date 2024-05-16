<?php
include_once("../../Controller/RealEstateAgent/approvePropertyCtl.php");

if (isset($_GET['propertylisting_id'])) {
    $propertylisting_id = $_GET['propertylisting_id'];

    // Set user status to "Active"
    $approvePropertyCtl = new approvePropertyCtl();
    $approvePropertyCtl->approveProperty($propertylisting_id);

    // Redirect to System admin page
    header("Location: listedProperty.php");
    exit();
}
?>