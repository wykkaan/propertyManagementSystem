<?php

include_once("../../config.php");
session_start();



class PropertyListing
{
    private $conn;

    public function __construct()
    {
        $db = new DB;
    }

    public function addPropertyListing($property_name, $property_price, $property_description)
    {
        // Start the session if not already started
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
    
        // Retrieve the logged-in user's ID from the session
        if (isset($_SESSION['user_id'])) {
            $seller_id = $_SESSION['user_id'];
        } else {
            die("Error: User not logged in.");
        }
    
        // Connect to the database
        $conn = mysqli_connect(HOST, USER, PASS, DB);
    
        // Check for any errors in the connection
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }
    
        // Escape the input values to prevent SQL injection
        $property_name = mysqli_real_escape_string($conn, $property_name);
        $property_price = mysqli_real_escape_string($conn, $property_price);
        $property_description = mysqli_real_escape_string($conn, $property_description);
        $seller_id = mysqli_real_escape_string($conn, $seller_id);
    
        // Check if the property already exists
        $checkproperty = mysqli_query($conn, "SELECT property_name, property_price, property_description FROM property WHERE property_name='$property_name' AND property_price='$property_price' AND property_description='$property_description'");
    
        // Get the number of rows in the result
        $result = mysqli_num_rows($checkproperty);
    
        if ($result == 0) {
            // Begin a transaction
            mysqli_begin_transaction($conn);
    
            try {
                // Insert the new property including the seller_id
                $register = mysqli_query($conn, "INSERT INTO property (property_name, property_price, property_description, seller_id) VALUES ('$property_name', '$property_price', '$property_description', '$seller_id')");
    
                // Check for any errors in the query
                if ($register) {
                    // Get the ID of the newly inserted property
                    $propertylisting_id = mysqli_insert_id($conn);
    
                    // Insert the new listing with the default status PENDING
                    $insertList = mysqli_query($conn, "INSERT INTO list (propertylisting_id, list_status, user_id) VALUES ('$propertylisting_id', 'PENDING', '$seller_id')");
    
                    if ($insertList) {
                        // Commit the transaction
                        mysqli_commit($conn);
                        // Redirect to seller.php after successful insertion
                        header('Location: seller.php');
                        exit(); // Make sure to exit after redirection
                    } else {
                        throw new Exception("Error inserting list: " . mysqli_error($conn));
                    }
                } else {
                    throw new Exception("Error inserting property: " . mysqli_error($conn));
                }
            } catch (Exception $e) {
                // Rollback the transaction in case of an error
                mysqli_rollback($conn);
                // Display the error message
                die($e->getMessage());
            }
        } else {
            // If the property already exists, return false
            return false;
        }
    }
    
    

    public function getPropertyListing()
    {
        // Connect to the database
        $conn = mysqli_connect(HOST, USER, PASS, DB);
    
        // Check for any errors in the connection
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }
    
        // Query to join the property table with the users table to get the seller's name
        $query = "SELECT p.propertylisting_id, p.property_name, p.property_price, p.property_description, u.username AS seller_name
                  FROM property p
                  JOIN users u ON p.seller_id = u.user_id
                  ORDER BY p.property_name ASC";
    
        // Execute the query
        $result = mysqli_query($conn, $query);
    
        // Check for any errors in the query execution
        if (!$result) {
            die('Error executing query: ' . mysqli_error($conn));
        }
    
        // Fetch the results into an array
        $propertylisting = array();
        while ($row = mysqli_fetch_assoc($result)) {
            $propertylisting[] = $row;
        }
    
        // Close the database connection
        mysqli_close($conn);
    
        // Return the property listings
        return $propertylisting;
    }
    

    public function getPastPropertyListing()
    {
        $conn = mysqli_connect(HOST, USER, PASS, DB);
        $query = "SELECT property_name FROM property  ORDER BY property_name DESC";
        $result = mysqli_query($conn, $query);
        $propertylisting = array();
        if (!$result) {
            die('Error executing query: ' . mysqli_error($conn));
        }
        $propertylisting = array();
        while ($row = mysqli_fetch_assoc($result)) {
            $propertylisting[] = $row;
        }
        mysqli_close($conn);
        return $propertylisting;
    }


    public function updatePropertyListing($propertylisting_id, $property_name, $property_price, $property_description) :bool
    {
        $conn = mysqli_connect(HOST, USER, PASS, DB);

        $propertylistingExists = $this->checkPropertyListingExists($propertylisting_id);

        if ($propertylistingExists) {
            // Update the propertylisting details
            $stmt = $conn->prepare("UPDATE property SET property_name = ?, property_price = ?, property_description = ? WHERE propertylisting_id = ?");
            $stmt->bind_param("sssi",$property_name,  $property_price, $property_description, $propertylisting_id);
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

    private function checkPropertyListingExists($propertylisting_id) :bool
    {
        $conn = mysqli_connect(HOST, USER, PASS, DB);
        $stmt = $conn->prepare("SELECT * FROM property WHERE propertylisting_id = ?");
        $stmt->bind_param("i", $propertylisting_id);
        $stmt->execute();
        $stmt->store_result();

        if ($stmt->num_rows > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function deletePropertyListing($propertylisting_id): void
    {
        $conn = mysqli_connect(HOST, USER, PASS, DB);
        $stmt = $conn->prepare("DELETE FROM property WHERE `propertylisting_id` = ?");
        $stmt->bind_param("i", $propertylisting_id);
        $stmt->execute();
        $stmt->close();
    }


    function searchPropertyListing($search)
    {
        $conn = mysqli_connect(HOST, USER, PASS, DB);
        $search = mysqli_real_escape_string($conn, $search);
        $query = "SELECT propertylisting_id, property_name FROM property WHERE property_name LIKE '%$search%'";
        //$query = "SELECT workslot_id, workslot_date FROM workslot WHERE workslot_date < '$search' ORDER BY workslot_date DESC";
        $result = mysqli_query($conn, $query);

        if (!$result) {
            die("Query failed: " . mysqli_error($conn));
        }

        $propertylistings = mysqli_fetch_all($result, MYSQLI_ASSOC);
        mysqli_close($conn);
        return $propertylistings;
    }


    public function getSellerProperty($user_id):array
    {
        $conn = mysqli_connect(HOST, USER, PASS, DB);
        $query = "SELECT  propertylisting_id, property_name, property_price, property_description, seller_id FROM property WHERE seller_id LIKE '%$user_id%'";
        $result = mysqli_query($conn, $query);
        $userAccounts = array();
        if ($result) {
            while ($res = mysqli_fetch_array($result)) {
                $userAccount = array();
                $userAccount['propertylisting_id'] = $res['propertylisting_id'];
                $userAccount['property_name'] = $res['property_name'];
                $userAccount['property_price'] = $res['property_price'];
                $userAccount['property_description'] = $res['property_description'];
                $userAccount['seller_id'] = $res['seller_id'];
                $userAccounts[] = $userAccount;
            }
        }
        return $userAccounts;
    }

    function searchSellerProperty($search)
    {
        $conn = mysqli_connect(HOST, USER, PASS, DB);
        $search = mysqli_real_escape_string($conn, $search);
        $query = "SELECT * FROM property WHERE property_name LIKE '%$search%'";
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
