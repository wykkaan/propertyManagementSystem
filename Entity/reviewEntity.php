<?php

include_once("../../config.php");
//session_start();

class Review
{
    private $conn;

    public function __construct()
    {
        $db = new DB;
    }

    public function addReview($review_id,$user_fullname,$user_profile,$review_rating)
    {
        $conn = mysqli_connect(HOST, USER, PASS, DB);
        $checkrating = mysqli_query($conn, "SELECT review_id,user_fullname,user_profile,review_rating FROM reviews WHERE review_id='$review_id' AND user_fullname='$user_fullname' AND user_profile='$user_profile' AND review_rating='$review_rating' ");
        $result = mysqli_num_rows($checkrating);
        if ($result == 0) {
            $register = mysqli_query($conn, "INSERT INTO reviews (review_id,user_fullname,user_profile,review_rating) VALUES ('$review_id','$user_fullname','$user_profile', '$review_rating')") or die(mysqli_error($conn));
            header('Location: review.php');
            return $register;
        } else {
            return false;
        }
    }

    public function getReview()
    {
        $conn = mysqli_connect(HOST, USER, PASS, DB);
        $query = "SELECT  review_id,user_fullname,user_profile,review_rating FROM reviews ORDER BY user_fullname ASC";
        $result = mysqli_query($conn, $query);
        $reviewlisting = array();
        if (!$result) {
            die('Error executing query: ' . mysqli_error($conn));
        }
        $reviewlisting = array();
        while ($row = mysqli_fetch_assoc($result)) {
            $reviewlisting[] = $row;
        }
        mysqli_close($conn);
        return $reviewlisting;
    }

    public function updateReview($review_id,$user_fullname,$user_profile,$review_rating) :bool
    {
        $conn = mysqli_connect(HOST, USER, PASS, DB);

        $reviewlistingExists = $this->checkReviewListingExists($review_id);

        if ($reviewlistingExists) {
            // Update the propertylisting details
            $stmt = $conn->prepare("UPDATE reviews SET user_fullname = ?, user_profile = ?, review_rating = ? WHERE review_id = ?");
            $stmt->bind_param("sssi",$user_fullname,  $user_profile, $review_rating, $review_id);
            $stmt->execute();

            if ($stmt->affected_rows > 0) {
                // propertylisting updated successfully
                return true;
            } else {
                // Account update failed
                return false;
            }
        } else {
            // User with the given ID does not exist
            return false;
        }
    }

    private function checkReviewListingExists($review_id) :bool
    {
        $conn = mysqli_connect(HOST, USER, PASS, DB);
        $stmt = $conn->prepare("SELECT * FROM reviews WHERE review_id = ?");
        $stmt->bind_param("i", $review_id);
        $stmt->execute();
        $stmt->store_result();

        if ($stmt->num_rows > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function deleteReviewListing($review_id): void
    {
        $conn = mysqli_connect(HOST, USER, PASS, DB);
        $stmt = $conn->prepare("DELETE FROM reviews WHERE `review_id` = ?");
        $stmt->bind_param("i", $review_id);
        $stmt->execute();
        $stmt->close();
    }


    function searchReview($search)
    {
        $conn = mysqli_connect(HOST, USER, PASS, DB);
        $search = mysqli_real_escape_string($conn, $search);
        $query = "SELECT review_id, user_fullname FROM reviews WHERE user_fullname LIKE '%$search%'";
        //$query = "SELECT workslot_id, workslot_date FROM workslot WHERE workslot_date < '$search' ORDER BY workslot_date DESC";
        $result = mysqli_query($conn, $query);

        if (!$result) {
            die("Query failed: " . mysqli_error($conn));
        }

        $reviewlistings = mysqli_fetch_all($result, MYSQLI_ASSOC);
        mysqli_close($conn);
        return $reviewlistings;
    }

    public function viewrealestateAgent()
    {
        $conn = mysqli_connect(HOST, USER, PASS, DB);
        $query = "SELECT user_id, user_fullname FROM users WHERE user_profile = 'Real Estate Agent'";
        $result = mysqli_query($conn, $query);
        $userAccounts = array();
        if ($result) {
            while ($res = mysqli_fetch_array($result)) {
                $userAccount = array();
                $userAccount['user_id'] = $res['user_id'];
                $userAccount['user_fullname'] = $res['user_fullname'];
                $userAccounts[] = $userAccount;
            }
        }
        return $userAccounts;
    }

    function searchrealestateAgent($search)
    {
        $conn = mysqli_connect(HOST, USER, PASS, DB);
        $search = mysqli_real_escape_string($conn, $search);
        $query = "SELECT * FROM users WHERE user_fullname LIKE '%$search%'";
        $result = mysqli_query($conn, $query);

        if (!$result) {
            die("Query failed: " . mysqli_error($conn));
        }

        $userAccounts = mysqli_fetch_all($result, MYSQLI_ASSOC);
        mysqli_close($conn);
        return $userAccounts;
    }


    public function logout()
    {
        $_SESSION['login'] = false;
        session_destroy();
    }
    
}
