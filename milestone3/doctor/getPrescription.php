<?php
include("../server/db.php");


    $host = "localhost";
    $username = "root";
    $password = "";
    $database = "hospital";
    $conn = new mysqli($host, $username, $password, $database);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    
    // SQL query to fetch prescription data
    $sql = "SELECT id, symptoms_id, prescription FROM prescription";
    $result = $conn->query($sql);
    
    // Check if there are rows in the result
    if ($result->num_rows > 0) {
        // Fetch data as an associative array
        $prescriptions = array();
        while ($row = $result->fetch_assoc()) {
            $prescriptions[]= $row;
        }
        // Convert the array to JSON and echo it
        echo json_encode($prescriptions);
    } else {
        // If no rows are found, return an empty array as JSON
        echo json_encode(array());
    }
    
    // Close the database connection
    $conn->close();
    
    ?>