<?php
include_once("../../Entity/reviewEntity.php");

class searchrealestateAgentCtl
{

    public function searchrealestateAgent($search)
    {
        $s = new Review();
        $results = $s->searchrealestateAgent($search);
        return $results;
    }
}