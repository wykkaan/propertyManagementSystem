<?php
include_once("../../Entity/propertyEntity.php");

class getSellerPropertyCtl
{

    public function getSellerProperty($user_id)
    {
        $vuc = new PropertyListing();
        $results = $vuc->getSellerProperty($user_id);
        return $results;
    }
}