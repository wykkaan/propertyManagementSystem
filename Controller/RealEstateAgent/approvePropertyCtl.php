<?php
include_once("../../Entity/listPropertyEntity.php");

class approvePropertyCtl
{
    public function approveProperty($propertylisting_id)
    {
        $listedPropertyEntity = new ListedProperty();

        $listedPropertyEntity->approveProperty($propertylisting_id);
     
    }

}
