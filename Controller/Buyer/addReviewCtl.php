<?php
include_once("../../Entity/reviewEntity.php");

class addReviewCtl
{

    public function addReview($realestate_id,$review_rating, $review_description)
    {
        $rc = new Review();
        $results = $rc->addReview($realestate_id, $review_rating, $review_description);
        return $results;
    }
}
?>