<?php
include_once("../../Entity/reviewEntity.php");

class addReviewCtl
{

    public function addReview($realestate_id,$review_rating)
    {
        $rc = new Review();
        $results = $rc->addReview($realestate_id, $review_rating);
        return $results;
    }
}
?>