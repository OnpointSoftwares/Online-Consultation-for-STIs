<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Include your database connection logic (replace with your actual connection details)
   $conn=new mysqli("localhost","root","","hospital");
   if($conn)
   {
    // Retrieve form data
    $patientName = $_POST['patientName'];
    $patientEmail = $_POST['patientEmail'];
    $patientAge = $_POST['patientAge'];

    // Perform validation if needed

    // Insert data into the database
    $sql = "INSERT INTO Patients (name, email, age) VALUES ('$patientName', '$patientEmail', '$patientAge')";

    if ($conn->query($sql) === TRUE) {
        // Redirect to a success page or display a success message
        header("Location: index.php");
        exit();
    } else {
        // Handle database error, you might want to log the error
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close the database connection
    $conn->close();
}
else{
    echo "Error Connecting to Database";
}
}
?>
