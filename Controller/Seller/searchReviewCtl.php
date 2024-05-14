<?php
include_once("../../Entity/propertyEntity.php");

class searchPropertyListingCtl
{

    public function searchPropertyListing($search)
    {
        $s = new PropertyListing();
        $results = $s->searchPropertyListing($search);
        return $results;
    }
}