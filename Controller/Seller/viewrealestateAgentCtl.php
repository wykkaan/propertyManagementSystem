<?php
include_once("../../Entity/reviewEntity.php");

class viewrealestateAgentCtl
{
    public function viewrealestateAgent()
    {
        $gua = new Review();
        $results = $gua->viewrealestateAgent();
        return $results;
    }
}