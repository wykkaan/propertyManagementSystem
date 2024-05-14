<?php
include_once("../../Entity/propertyEntity.php");

class addPropertyListingCtl
{

    public function addPropertyListing($name, $price, $description, $seller)
    {
        $rc = new PropertyListing();
        $results = $rc->addPropertyListing($name, $price, $description,$seller);
        return $results;
    }
}