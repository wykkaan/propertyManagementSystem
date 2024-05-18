<?php
include_once("../../Entity/propertyEntity.php");

class addFavouritesCtl
{

    public function addFavourite($propertylisting_id)
    {
        $rc = new PropertyListing();
        $rc->addFavourites($propertylisting_id);
    }
}
?>