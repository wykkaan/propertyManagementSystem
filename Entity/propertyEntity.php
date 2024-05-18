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

    public function addPropertyListing($property_name, $property_price, $property_description, $seller_name)
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
        $seller_name = mysqli_real_escape_string($conn, $seller_name);
    
        // Check if the property already exists
        $checkproperty = mysqli_query($conn, "SELECT property_name, property_price, property_description FROM property WHERE property_name='$property_name' AND property_price='$property_price' AND property_description='$property_description'");
    
        // Get the number of rows in the result
        $result = mysqli_num_rows($checkproperty);
    
        if ($result == 0) {
            // Begin a transaction
            mysqli_begin_transaction($conn);
    
            try {
                // Insert the new property including the seller_id
                $register = mysqli_query($conn, "INSERT INTO property (property_name, property_price, property_description, seller_id, seller_name) VALUES ('$property_name', '$property_price', '$property_description', '$seller_id', '$seller_name')");
    
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
                        header('Location: realestateAgent.php');
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
    
    

    public function getSellerPropertyListing()
    {   
        
        // Connect to the database
        $conn = mysqli_connect(HOST, USER, PASS, DB);
    
        // Check for any errors in the connection
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }
        if ($_SESSION['user_profile'] == "Seller") {
            $query = "SELECT username FROM users WHERE user_id = {$_SESSION['user_id']}";
    $result = mysqli_query($conn, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $username = $row['username'];
    } else {
        die("User not found");
    }

    
// Escape the username to prevent SQL injection
    $username = mysqli_real_escape_string($conn, $username);

    // Second query to join the property table with the users table
    $query = "SELECT p.propertylisting_id, p.seller_name, p.property_name, p.property_price, p.property_description, u.username AS realestate_name, l.list_status, view_count, interest_count
            FROM property p 
            JOIN users u ON p.seller_id = u.user_id 
            JOIN list l ON p.propertylisting_id = l.propertylisting_id
            WHERE p.seller_name = '$username'
            ORDER BY view_count DESC";
            } else {
            $query = "SELECT p.propertylisting_id, p.seller_name, p.property_name, p.property_price, p.property_description, u.username AS realestate_name,l.list_status, view_count, interest_count
            FROM property p 
            JOIN users u ON p.seller_id = u.user_id 
            JOIN list l ON p.propertylisting_id = l.propertylisting_id
            LEFT JOIN favorites f ON p.propertylisting_id = f.propertylisting_id
            WHERE l.list_status = 'PENDING'
            AND f.propertylisting_id IS NULL
            ORDER BY p.property_name ASC";
            }

    // Execute the second query
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
                return true;
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


    function searchSellerPropertyListing($search)
    {
        $conn = mysqli_connect(HOST, USER, PASS, DB);
        $search = mysqli_real_escape_string($conn, $search);
        $query = "SELECT p.propertylisting_id, p.property_name, p.property_price, p.property_description, u.username AS realestate_name, p.seller_name, l.list_status, l.view_count, l.interest_count
              FROM property p
              JOIN users u ON p.seller_id = u.user_id
              JOIN list l ON p.propertylisting_id = l.propertylisting_id
              WHERE p.property_name LIKE '%$search%'";
        $result = mysqli_query($conn, $query);

        if (!$result) {
            die("Query failed: " . mysqli_error($conn));
        }

        $propertylistings = mysqli_fetch_all($result, MYSQLI_ASSOC);
        mysqli_close($conn);
        return $propertylistings;
    }

    public function getProperty($user_id): array
    {
        $conn = mysqli_connect(HOST, USER, PASS, DB);
        $query = "SELECT p.propertylisting_id, p.property_name, p.property_price, p.property_description, p.seller_name, p.seller_id, l.view_count, l.interest_count
                  FROM property p
                  INNER JOIN list l ON p.propertylisting_id = l.propertylisting_id 
                  WHERE p.seller_id = '$user_id' AND l.list_status = 'PENDING'";
        $result = mysqli_query($conn, $query);
        $userAccounts = array();
        if ($result) {
            while ($res = mysqli_fetch_array($result)) {
                $userAccount = array();
                $userAccount['propertylisting_id'] = $res['propertylisting_id'];
                $userAccount['property_name'] = $res['property_name'];
                $userAccount['property_price'] = $res['property_price'];
                $userAccount['property_description'] = $res['property_description'];
                $userAccount['seller_name'] = $res['seller_name'];
                $userAccount['seller_id'] = $res['seller_id'];
                $userAccount['view_count'] = $res['view_count'];
                $userAccount['interest_count'] = $res['interest_count'];
                $userAccounts[] = $userAccount;
            }
        }
        return $userAccounts;
    }

    public function getPastPropertyListing($user_id): array
    {
        $conn = mysqli_connect(HOST, USER, PASS, DB);
        $query = "SELECT p.propertylisting_id, p.property_name, p.property_price, p.property_description, p.seller_name, p.seller_id, l.view_count, l.interest_count 
                  FROM property p
                  INNER JOIN list l ON p.propertylisting_id = l.propertylisting_id 
                  WHERE p.seller_id = '$user_id' AND l.list_status = 'SOLD'";
        $result = mysqli_query($conn, $query);
        $userAccounts = array();
        if ($result) {
            while ($res = mysqli_fetch_array($result)) {
                $userAccount = array();
                $userAccount['propertylisting_id'] = $res['propertylisting_id'];
                $userAccount['property_name'] = $res['property_name'];
                $userAccount['property_price'] = $res['property_price'];
                $userAccount['property_description'] = $res['property_description'];
                $userAccount['seller_name'] = $res['seller_name'];
                $userAccount['seller_id'] = $res['seller_id'];
                $userAccount['view_count'] = $res['view_count'];
                $userAccount['interest_count'] = $res['interest_count'];
                $userAccounts[] = $userAccount;
            }
        }
        return $userAccounts;
    }
    
    public function getSoldPropertyListing(): array
    {
        $conn = mysqli_connect(HOST, USER, PASS, DB);
        $query = $query = "SELECT p.propertylisting_id, p.seller_name, p.property_name, p.property_price, p.property_description, u.username AS realestate_name,l.list_status, view_count, interest_count
        FROM property p 
        JOIN users u ON p.seller_id = u.user_id 
        JOIN list l ON p.propertylisting_id = l.propertylisting_id
        LEFT JOIN favorites f ON p.propertylisting_id = f.propertylisting_id
        WHERE l.list_status = 'SOLD'
        AND f.propertylisting_id IS NULL
        ORDER BY p.property_name ASC";
        $result = mysqli_query($conn, $query);
        $userAccounts = array();
        if ($result) {
            while ($res = mysqli_fetch_array($result)) {
                $userAccount = array();
                $userAccount['propertylisting_id'] = $res['propertylisting_id'];
                $userAccount['property_name'] = $res['property_name'];
                $userAccount['property_price'] = $res['property_price'];
                $userAccount['property_description'] = $res['property_description'];
                $userAccount['seller_name'] = $res['seller_name'];
                $userAccount['view_count'] = $res['view_count'];
                $userAccount['interest_count'] = $res['interest_count'];
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

    function addFavourites($propertylisting_id)
    {
        $conn = mysqli_connect(HOST, USER, PASS, DB);
        $query = "INSERT INTO favorites (user_id, propertylisting_id) VALUES ('{$_SESSION['user_id']}', '$propertylisting_id')";
        mysqli_query($conn, $query);
    }

    public function getFavourite($user_id)
    {
        $conn = mysqli_connect(HOST, USER, PASS, DB);
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }

        $query = "SELECT p.propertylisting_id, p.seller_name, p.property_name, p.property_price, p.property_description, u.username AS realestate_name
                  FROM property p
                  JOIN favorites f ON p.propertylisting_id = f.propertylisting_id
                  JOIN users u ON p.seller_id = u.user_id
                  WHERE f.user_id = ?";
        
        $stmt = $conn->prepare($query);
        if ($stmt === false) {
            die("Prepare failed: " . $conn->error);
        }

        $stmt->bind_param("i", $user_id);
        $stmt->execute();
        $result = $stmt->get_result();
        
        $favorites = [];
        while ($row = $result->fetch_assoc()) {
            $favorites[] = $row;
        }

        $stmt->close();
        $conn->close();

        return $favorites;
    }
    public function deleteFavourite($user_id, $propertylisting_id)
    {
        $conn = mysqli_connect(HOST, USER, PASS, DB);
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }

        $query = "DELETE FROM favorites WHERE user_id = ? AND propertylisting_id = ?";
        
        $stmt = $conn->prepare($query);
        if ($stmt === false) {
            die("Prepare failed: " . $conn->error);
        }

        $stmt->bind_param("ii", $user_id, $propertylisting_id);
        $stmt->execute();

        $stmt->close();
        $conn->close();
    }

    public function getSellerPropertyDetails($property_id)
    {   
        
        // Connect to the database
        $conn = mysqli_connect(HOST, USER, PASS, DB);
    
        // Check for any errors in the connection
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }
        if ($_SESSION['user_profile'] == "Seller") {
            $query = "SELECT username FROM users WHERE user_id = {$_SESSION['user_id']}";
    $result = mysqli_query($conn, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $username = $row['username'];
    } else {
        die("User not found");
    }

    
// Escape the username to prevent SQL injection
    $username = mysqli_real_escape_string($conn, $username);

    // Second query to join the property table with the users table
    $query = "SELECT p.propertylisting_id, p.seller_name, p.property_name, p.property_price, p.property_description, u.username AS realestate_name, l.list_status
            FROM property p 
            JOIN users u ON p.seller_id = u.user_id 
            JOIN list l ON p.propertylisting_id = l.propertylisting_id
            WHERE p.seller_name = '$username'
            ORDER BY p.property_name ASC";
            } else {
            $query = "SELECT p.propertylisting_id, p.seller_name, p.property_name, p.property_price, p.property_description, u.username AS realestate_name,l.list_status
            FROM property p 
            JOIN users u ON p.seller_id = u.user_id 
            JOIN list l ON p.propertylisting_id = l.propertylisting_id
            WHERE l.list_status = 'PENDING' AND p.propertylisting_id = '$property_id'
            ORDER BY p.property_name ASC";
            }

    // Execute the second query
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


    
    public function logout()
    {
        $_SESSION['login'] = false;
        session_destroy();
    }
    
}
