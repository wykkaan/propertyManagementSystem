<?php
include_once("../../Entity/reviewEntity.php");

class deleteReviewCtl
{
 
    public function deleteReview($review_id)
    {
        $suc = new PropertyListing();
        $suc->deleteReview($review_id);
    }
}