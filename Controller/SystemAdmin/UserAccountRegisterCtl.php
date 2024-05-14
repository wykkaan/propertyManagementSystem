<?php
include_once("../../Entity/UserAccountEntity.php");

class UserAccountRegisterCtl
{

    public function RegisterCustomerAccount($user_fullname,$username, $password)
    {
        $rc = new UserAccount();
        $results = $rc->RegisterCustomerAccount($user_fullname,$username, $password);
        return $results;
    }
}