<?php
include_once("../../Entity/propertyEntity.php");

class deletePropertyListingCtl
{
 
    public function deletePropertyListing($propertylisting_id)
    {
        $suc = new PropertyListing();
        $suc->deletePropertyListing($propertylisting_id);
    }
}