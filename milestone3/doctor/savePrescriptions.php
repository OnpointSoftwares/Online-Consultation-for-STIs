<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
   $conn=new mysqli("localhost","root","","hospital");
   if($conn)
   {
    // Retrieve form data
    $prescription = $_POST['dosage'];
    $symptom_id = $_POST['symptom_id'];
    echo $prescription;
    // Perform validation if needed

    // Insert data into the database
    $sql = "INSERT INTO prescription (symptoms_id, prescription) VALUES ('$symptom_id', '$prescription')";

    if ($conn->query($sql) === TRUE) {
        // Redirect to a success page or display a success message
        ?>
        <script>
            location.replace("index.php");
            </script>
        <?php
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
