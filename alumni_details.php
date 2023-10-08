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
$institute = $_POST["iname"];
$fullname = $_POST["fname"];
$dob = $_POST["dob"];
$email=$_POST["email"];
$graduationyear=$_POST["gyear"];
$course=$_POST["course"];
$domain=$_POST["major"];
$occupation=$_POST["occupation"];
$password=$_POST["password"];
$linkedIn=$_POST["linkedIn"];
$twitter=$_POST["twitter"];
$targetDirectory = "uploads/";
    $profilePhotoName = uniqid() . "_" . basename($_FILES["profilePhoto"]["name"]);
    $targetFilePath = $targetDirectory . $profilePhotoName;
    move_uploaded_file($_FILES["profilePhoto"]["tmp_name"], $targetFilePath);

// SQL query to insert event data into the database
$sql = "INSERT INTO Alumni (institute, fullname, dob,email,password, course, domain, occupation, graduationyear,profilepicture,linkedIn,twitter) VALUES ('$institute', '$fullname', '$dob','$email','$password', '$course', '$domain', '$occupation', '$graduationyear','$profilePhotoName','$linkedIn','$twitter')";

if ($conn->query($sql) === TRUE) {
    session_start();
    $_SESSION["email"]= $email;
   header("Location: home2.html");
   exit();
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Close the database connection
$conn->close();
?>




