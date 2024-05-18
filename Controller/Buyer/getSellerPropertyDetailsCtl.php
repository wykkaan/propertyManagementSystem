

<?php
include_once("../../Entity/propertyEntity.php");

class getSellerPropertyDetailsCtl
{

    public function getSellerPropertyDetails($propertylisting_id)
    {
        $vuc = new PropertyListing();
        $results = $vuc->getSellerPropertyDetails($propertylisting_id);
        return $results;
    }
}