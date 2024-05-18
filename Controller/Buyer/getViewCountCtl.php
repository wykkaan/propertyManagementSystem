<?php
include_once("../../Entity/listPropertyEntity.php");

class getViewCountCtl
{

    public function getViewCount()
    {
        $vuc = new ListedProperty();
        $results = $vuc->getViewCount();
        return $results;
    }
}