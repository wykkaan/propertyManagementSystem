<?php
include_once("../../Entity/UserProfileEntity.php");

class getUserProfilesCtl
{

    public function getUserProfiles()
    {
        $vuc = new UserProfile();
        $results = $vuc->getUserProfiles();
        return $results;
    }
}