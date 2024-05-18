<?php
include_once("../../Entity/propertyEntity.php");

class addPropertyListingCtl
{

    public function addPropertyListing($name, $price, $description, $seller_name, $seller)
    {
        $rc = new PropertyListing();
        $results = $rc->addPropertyListing($name, $price, $description, $seller_name, $seller);
        return $results;
    }
}