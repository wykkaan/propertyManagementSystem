<?php
include_once("../../Entity/propertyEntity.php");

class searchSellerPropertyListingCtl
{

    public function searchSellerPropertyListing($search)
    {
        $s = new PropertyListing();
        $results = $s->searchSellerPropertyListing($search);
        return $results;
    }
}