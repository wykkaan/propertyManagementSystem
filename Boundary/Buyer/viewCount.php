<?php
require_once("../../Controller/Buyer/updateViewCountCtl.php");
$updateViewCountCtl = new updateViewCountCtl();
$updateViewCountCtl->updateViewCount($_GET['propertylisting_id']);

header("Location: viewMore.php");

?>