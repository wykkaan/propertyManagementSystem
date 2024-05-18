<?php
include_once("../../Entity/propertyEntity.php");

class getFavouriteCtl
{
    public function getFavourite($user_id)
    {
        $propertyListing = new PropertyListing();
        return $propertyListing->getFavourite($user_id);
    }
}
?>
