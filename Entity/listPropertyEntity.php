<?php

include_once("../../config.php");
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}



class ListedProperty
{
    private $conn;

    public function approveProperty($propertylisting_id): void
{
    // Establish connection to the database
    $conn = mysqli_connect(HOST, USER, PASS, DB);
    
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    
           
    // Retrieve the logged-in user's ID from the session
            if (isset($_SESSION['user_id'])) {
                $agent_id = $_SESSION['user_id'];
            } else {
                die("Error: User not logged in.");
            }
    
    // Prepare the SQL statement to update the list status and agent_id
    $stmt = $conn->prepare("UPDATE list SET list_status = 'SOLD', agent_id = ? WHERE propertylisting_id = ?");
    
    // Bind the parameters to the statement
    $stmt->bind_param("ii", $agent_id, $propertylisting_id);
    
    // Execute the statement
    $stmt->execute();
    
    // Close the statement and connection
    $stmt->close();
    $conn->close();
}

public function updateViewCount($propertylisting_id): void
{
    $conn = mysqli_connect(HOST, USER, PASS, DB);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $stmt = $conn->prepare("UPDATE `list` SET `view_count` = `view_count` + 1 WHERE `propertylisting_id` = ?");
    if ($stmt === false) {
        die("Prepare failed: " . $conn->error);
    }

    // Bind the parameter correctly
    $stmt->bind_param("i", $propertylisting_id);
    if ($stmt->execute() === false) {
        die("Execute failed: " . $stmt->error);
    }

    $stmt->close();
    $conn->close();
}


public function updateInterestCount($propertylisting_id): void
{
    $conn = mysqli_connect(HOST, USER, PASS, DB);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $stmt = $conn->prepare("UPDATE `list` SET `interest_count` = `view_count` + 1 WHERE `propertylisting_id` = ?");
    if ($stmt === false) {
        die("Prepare failed: " . $conn->error);
    }

    // Bind the parameter correctly
    $stmt->bind_param("i", $propertylisting_id);
    if ($stmt->execute() === false) {
        die("Execute failed: " . $stmt->error);
    }

    $stmt->close();
    $conn->close();
}

    public function logout()
    {
        $_SESSION['login'] = false;
        session_destroy();
    }
    
}
