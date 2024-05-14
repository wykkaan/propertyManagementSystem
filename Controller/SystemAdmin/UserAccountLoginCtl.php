<?php
include_once("../../Entity/UserAccountEntity.php");

class UserAccountLoginCtl
{

    public function loginAccount($userName, $password)
    {
        $c = new UserAccount();
        $results = $c->loginAccount($userName, $password);
        return $results;
    }
}