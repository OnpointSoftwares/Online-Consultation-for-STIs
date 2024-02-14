<?php
// Include your database connection logic
$conn=new mysqli("localhost","root","","hospital");
   if($conn)
   {
// Perform a query to fetch patient data from the database
$sql = "SELECT id, name, email FROM Patients";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Fetch the result set as an associative array
    $patients = array();
    while ($row = $result->fetch_assoc()) {
        $patients[] = $row;
    }

    // Output the result in JSON format
    header('Content-Type: application/json');
    echo json_encode($patients);
} else {
    // Handle the case where no patients are found
    echo json_encode(array());
}

// Close the database connection
$conn->close();
   }
   else{
    echo "Db connection failed";
   }
?>
