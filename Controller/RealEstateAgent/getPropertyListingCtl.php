<?php
include_once("../../Entity/propertyEntity.php");

class getPropertyListingCtl
{

    public function getPropertyListing()
    {
        $vuc = new PropertyListing();
        $results = $vuc->getPropertyListing();
        return $results;
    }
}