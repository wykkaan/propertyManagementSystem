<?php
include_once("../../Entity/propertyEntity.php");

class getSellerPropertyListingCtl
{

    public function getSellerPropertyListing()
    {
        $vuc = new PropertyListing();
        $results = $vuc->getSellerPropertyListing();
        return $results;
    }
}