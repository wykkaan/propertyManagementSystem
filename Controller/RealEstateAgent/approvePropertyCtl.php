<?php
include_once("../../Entity/listPropertyEntity.php");

class approvePropertyCtl
{
    public function approveProperty($propertylisting_id)
    {
        // Create an instance of the Bids entity
        $listedPropertyEntity = new ListedProperty();

        $listedPropertyEntity->approveProperty($propertylisting_id);
     
    }

}
