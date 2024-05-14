<?php
include_once("../../Entity/propertyEntity.php");

class getPastPropertyListingCtl
{

    public function getPastPropertyListing()
    {
        $vuc = new PropertyListing();
        $results = $vuc->getPastPropertyListing();
        return $results;
    }
}