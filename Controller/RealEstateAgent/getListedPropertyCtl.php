<?php
include_once("../../Entity/listPropertyEntity.php");

class getListedPropertyCtl
{

    public function getListedProperty()
    {
        $vuc = new ListedProperty();
        $results = $vuc->getListedProperty();
        return $results;
    }
}