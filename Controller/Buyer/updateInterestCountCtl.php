<?php
include_once("../../Entity/listPropertyEntity.php");


class updateInterestCountCtl
{

    public function updateInterestCount($propertylisting_id)
    {
        $suc = new ListedProperty();
        $results = $suc->updateInterestCount($propertylisting_id);
        return $results;
    }
}
?>
