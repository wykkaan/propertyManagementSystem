<?php

include_once("../../config.php");
session_start();



class ListedProperty
{
    private $conn;

 
    

    public function getListedProperty()
{
    // Connect to the database
    $conn = mysqli_connect(HOST, USER, PASS, DB);

    // Check for any errors in the connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Query to join the property table with the users table to get the seller's name
    // and filter by approved properties
    $query = "SELECT p.propertylisting_id, p.property_name, p.property_price, p.property_description, u.username AS seller_name
              FROM property p
              JOIN users u ON p.seller_id = u.user_id
              JOIN list l ON p.propertylisting_id = l.propertylisting_id
              WHERE l.list_status = 'APPROVED'
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




    function searchListedProperty($search)
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


    public function approveProperty($propertylisting_id): void
    {
        $conn = mysqli_connect(HOST, USER, PASS, DB);
        $stmt = $conn->prepare("UPDATE `list` SET `list_status` = 'APPROVED' WHERE `propertylisting_id` = ?");
        $stmt->bind_param("i", $propertylisting_id);
        $stmt->execute();
        $stmt->close();
    }
    



    public function logout()
    {
        $_SESSION['login'] = false;
        session_destroy();
    }
    
}
