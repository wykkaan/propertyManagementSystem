<?php
include_once("../../Entity/listPropertyEntity.php");

class searchListedPropertyCtl
{

    public function searchListedProperty($search)
    {
        $s = new ListedProperty();
        $results = $s->searchListedProperty($search);
        return $results;
    }
}