<?php
include_once("../../Entity/propertyEntity.php");

class deleteFavouriteCtl
{
    public function deleteFavourite($user_id, $propertylisting_id)
    {
        $propertyListing = new PropertyListing();
        return $propertyListing->deleteFavourite($user_id, $propertylisting_id);
    }
}
?>
