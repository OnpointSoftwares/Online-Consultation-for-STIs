<?php
include("../server/db.php");
function getSymptoms() {

    $host = "localhost";
    $username = "root";
    $password = "";
    $database = "hospital";
    
    $conn = new mysqli($host, $username, $password, $database);
    $sql = "SELECT id, symptoms,predictedDisease,patient_id FROM predictions";
    $result = mysqli_query($conn, $sql);

    $symptoms = array();

    while ($row = mysqli_fetch_assoc($result)) {
        $symptoms[] = $row;
    }

    mysqli_close($conn);

    return $symptoms;
}

// Fetch symptoms and return as JSON
$symptoms = getSymptoms();
header('Content-Type: application/json');
echo json_encode($symptoms);
?>
