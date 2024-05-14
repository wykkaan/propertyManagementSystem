<?php
include_once("../../Entity/UserAccountEntity.php");

class activateUserAccountCtl
{

    public function activateUserAccount($user_id)
    {
        $suc = new UserAccount();
        $suc->activateUserAccount($user_id);
    }
}
