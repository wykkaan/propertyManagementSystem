<?php
include_once("../../Entity/propertyEntity.php");

class getSoldPropertyListingCtl
{

    public function getSoldPropertyListing()
    {
        $vuc = new PropertyListing();
        $results = $vuc->getSoldPropertyListing();
        return $results;
    }
}