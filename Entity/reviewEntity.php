<?php

include_once("../../config.php");
session_start();

class Review
{
    private $conn;

    public function __construct()
    {
        $db = new DB;
    }


        public function addReview($realestate_id, $review_rating, $review_description)
        {
            // Start the session if not already started
            if (session_status() == PHP_SESSION_NONE) {
                session_start();
            }
    
            // Ensure the user is logged in
            if (!isset($_SESSION['user_id'])) {
                die('User not logged in');
            }
    
            $user_id = $_SESSION['user_id'];
    
            $conn = mysqli_connect(HOST, USER, PASS, DB);
            if (!$conn) {
                die('Connection failed: ' . mysqli_connect_error());
            }
    
            // Insert new review
            $insertQuery = "
                INSERT INTO reviews (realestate_id, user_id, review_rating, review_description) 
                VALUES ('$realestate_id', '$user_id', '$review_rating', '$review_description')
            ";
            $register = mysqli_query($conn, $insertQuery);
            if (!$register) {
                die('Error executing query: ' . mysqli_error($conn));
            } else {
                header("Location: getReview.php");
            }
    
            mysqli_close($conn);
            return true;
        }
    
    

    public function getReview()
    {
        // Establish database connection
        $conn = mysqli_connect(HOST, USER, PASS, DB);
        if (!$conn) {
            die('Connection failed: ' . mysqli_connect_error());
        }
        if ($_SESSION['user_profile'] == "Real Estate Agent") {

        
        $query = "SELECT username FROM users WHERE user_id = {$_SESSION['user_id']}";
        $result = mysqli_query($conn, $query);

        if ($result && mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            $username = $row['username'];
        } else {
            die("User not found");
        }



    
        // Query to get review details along with agent and reviewer names
        $query = "
            SELECT r.realestate_id, 
                   u.user_fullname AS reviewer_name, 
                   r.review_rating, 
                   r.review_description,
                   agent.user_fullname AS agent_name
            FROM reviews r
            JOIN users u ON r.user_id = u.user_id
            JOIN users agent ON r.realestate_id = agent.user_id
            WHERE agent.user_fullname = '$username'
            ORDER BY u.user_fullname ASC
        ";
        } else {
            $query = "
            SELECT r.realestate_id, 
                   u.user_fullname AS reviewer_name, 
                   r.review_rating, 
                   r.review_description,
                   agent.user_fullname AS agent_name
            FROM reviews r
            JOIN users u ON r.user_id = u.user_id
            JOIN users agent ON r.realestate_id = agent.user_id
            ORDER BY u.user_fullname ASC
        ";
        }

        // Execute the query
        $result = mysqli_query($conn, $query);
        if (!$result) {
            die('Error executing query: ' . mysqli_error($conn));
        }
    
        // Fetch all results into an array
        $reviewListing = array();
        while ($row = mysqli_fetch_assoc($result)) {
            $reviewListing[] = $row;
        }
    
        // Close the database connection
        mysqli_close($conn);
    
        // Return the list of reviews with agent and reviewer names
        return $reviewListing;
    }
    

    
    

    public function updateReview($review_id,$user_fullname,$review_rating) :bool
    {
        $conn = mysqli_connect(HOST, USER, PASS, DB);

        $reviewlistingExists = $this->checkReviewListingExists($review_id);

        if ($reviewlistingExists) {
            // Update the propertylisting details
            $stmt = $conn->prepare("UPDATE reviews SET user_fullname = ?, review_rating = ? WHERE review_id = ?");
            $stmt->bind_param("sssi",$user_fullname, $review_rating, $review_id);
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

    public function deleteReview($review_id): void
    {
        $conn = mysqli_connect(HOST, USER, PASS, DB);
        $stmt = $conn->prepare("DELETE FROM reviews WHERE `review_id` = ?");
        $stmt->bind_param("i", $review_id);
        $stmt->execute();
        $stmt->close();
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
