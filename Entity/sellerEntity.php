<?php

include_once("../../config.php");
session_start();

class Seller
{
    private $conn;

    public function __construct()
    {
        $db = new DB;
    }

   

    public function getPropertyListing()
    {
        $conn = mysqli_connect(HOST, USER, PASS, DB);
        $query = "SELECT  propertylisting_id, property_name, property_price, property_description FROM property ORDER BY property_name ASC";
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


    public function logout()
    {
        $_SESSION['login'] = false;
        session_destroy();
    }
    
}
