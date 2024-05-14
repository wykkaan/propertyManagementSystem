<?php
include_once("../../Entity/reviewEntity.php");

class addReviewCtl
{

    public function addReview($name, $review)
    {
        $rc = new Review();
        $results = $rc->addReview($name, $review);
        return $results;
    }
}