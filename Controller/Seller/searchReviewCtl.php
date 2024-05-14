<?php
include_once("../../Entity/reviewEntity.php");

class searchReviewCtl
{

    public function searchReview($search)
    {
        $s = new Review();
        $results = $s->Review($search);
        return $results;
    }
}