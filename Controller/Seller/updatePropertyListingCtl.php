<?php
include_once("../../Entity/propertyEntity.php");


class updatePropertyListingCtl
{

    public function updatePropertyListing($propertylisting_id, $property_name, $property_price, $property_description)
    {
        $suc = new PropertyListing();
        $results = $suc->updatePropertyListing($propertylisting_id, $property_name, $property_price, $property_description);
        return $results;
    }
}
?>
