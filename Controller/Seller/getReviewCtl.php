<?php
include_once("../../Entity/reviewEntity.php");

class getReviewCtl
{

    public function getReview()
    {
        $vuc = new Review();
        $results = $vuc->getReview();
        return $results;
    }
}