<?php
include_once("../../Entity/propertyEntity.php");

class getPropertyCtl
{

    public function getProperty($user_id)
    {
        $vuc = new PropertyListing();
        $results = $vuc->getProperty($user_id);
        return $results;
    }
}