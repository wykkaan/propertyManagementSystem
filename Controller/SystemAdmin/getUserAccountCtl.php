<?php
include_once("../../Entity/UserAccountEntity.php");

class getUserAccountCtl
{
    public function getUserAccount()
    {
        $gua = new UserAccount();
        $results = $gua->getUserAccount();
        return $results;
    }
}