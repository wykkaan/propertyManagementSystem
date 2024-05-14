<?php
include_once("../../Entity/UserProfileEntity.php");

class activateUserProfileCtl
{

    public function activateUserProfile($userprofile_id)
    {
        $suc = new UserProfile();
        $suc->activateUserProfile($userprofile_id);
    }
}
