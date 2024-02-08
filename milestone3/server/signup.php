<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $cpassword=$_POST['cpassword'];
    if($_POST['password']==$cpassword)
    {
        $sql1 = "SELECT * FROM users WHERE email='$email'";
        $result = $conn->query($sql1);
    
        if ($result->num_rows > 0) {
            echo "Existing or used email address";
        }
        else{
    $sql = "INSERT INTO users (username, email, password,user_role) VALUES ('$username', '$email', '$password','1')";

    if ($conn->query($sql) === TRUE) {
        echo "User registered successfully!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
}
else{
    echo "Password and confirm password donot match";
}
}

$conn->close();
?>
