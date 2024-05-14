<?php
include_once("../../Entity/UserAccountEntity.php");

class addUserAccountCtl
{
    public function addUserAccount($user_fullname,$username, $password, $user_profile)
    {
        $aua = new UserAccount();
        $results = $aua-> addUserAccount($user_fullname, $username, $password, $user_profile);
        return $results;
    }
}