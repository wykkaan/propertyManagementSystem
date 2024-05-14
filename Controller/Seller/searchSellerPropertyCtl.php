<?php
include_once("../../Entity/propertyEntity.php");

class searchSellerPropertyCtl
{

    public function searchSellerProperty($search)
    {
        $s = new PropertyListing();
        $results = $s->searchSellerProperty($search);
        return $results;
    }
}