<?php
include_once("../../Controller/Seller/deletePropertyListingCtl.php");

if (isset($_GET['propertylisting_id'])) {
    $propertylisting_id = $_GET['propertylisting_id'];

    // Set user status to "Suspended"
    $deletePropertyListingCtl = new deletePropertyListingCtl();
    $deletePropertyListingCtl->deletePropertyListing($propertylisting_id);

    // Redirect to Real Estate Agent page
    header("Location: ./seller.php");
    exit();
}
?>