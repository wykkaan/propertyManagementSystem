<?php
include_once("../../Entity/propertyEntity.php");

class getPastPropertyListingCtl
{

    public function getPastPropertyListing($user_id)
    {
        $vuc = new PropertyListing();
        $results = $vuc->getPastPropertyListing($user_id);
        return $results;
    }
}