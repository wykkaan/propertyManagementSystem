<?php
include_once("../../Entity/UserAccountEntity.php");

class suspendUserAccountCtl
{

    public function suspendUserAccount($user_id)
    {
        $suc = new UserAccount();
        $suc->suspendUserAccount($user_id);
    }
}
