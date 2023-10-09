<?php
// Database connection details (replace with your own)

$servername = "sdb-63.hosting.stackcp.net";
$username = "projecthub-35303335469e";
$password = "projecthub123";
$dbname = "projecthub-35303335469e";

// Create a connection to the database
$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve event data from the form
	$full_name = $_POST["fname"];
    $dob=$_POST["dob"]
    $email = $_POST["email"];
    $password = $_POST["password"];
    $graduation_year = $_POST["gyear"];
    $major = $_POST["major"];
    $course = $_POST["course"];
    $password=$_POST["password"];
    $institute=$_POST["iname"];

// SQL query to insert event data into the database
$sql = "INSERT INTO Alumni(Fullname, email, dob, graduationyear, major, course, password, institute) VALUES ('$full_name', '$email','$dob', '$graduation_year', '$major','$course','$password','$institute')";

if ($conn->query($sql) === TRUE) {
    echo "Signed in successfully!";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Close the database connection
$conn->close();
?>




