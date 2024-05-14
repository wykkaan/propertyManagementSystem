<?php
include_once("../../Entity/UserAccountEntity.php");

class searchAccountCtl
{

    public function searchAccount($search)
    {
        $s = new UserAccount();
        $results = $s->searchAccount($search);
        return $results;
    }
}