<?php
include_once("../../Entity/listPropertyEntity.php");


class updateViewCountCtl
{

    public function updateViewCount($propertylisting_id)
    {
        $suc = new ListedProperty();
        $results = $suc->updateViewCount($propertylisting_id);
        return $results;
    }
}
?>
