<?php
include_once("../../Entity/UserProfileEntity.php");

class suspendUserProfileCtl
{
 
    public function suspendUserProfile($userprofile_id)
    {
        $suc = new UserProfile();
        $results = $suc->suspendUserProfile($userprofile_id);
        return $results;
    }
}