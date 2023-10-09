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
$company = $_POST["company"];
$location = $_POST["jlocation"];
$job_title = $_POST["jtitle"];
$qualification=$_POST["qualification"];
$description=$_POST["description"];
$skills=$_POST["skills"];
$experience=$_POST["exp"];
$vacancy=$_POST["vacancy"];
$lastdate=$_POST["lastdate"];
$reference=$_POST["jreference"];
// SQL query to insert event data into the database
$sql = "INSERT INTO Job_Post (company, location,job_title,qualification,description,skills,experience,vacancy,lastdate,reference) VALUES ('$company', '$location','$job_title','$qualification','$description','$skills','$experience','$vacancy','$lastdate','$reference')";

if ($conn->query($sql) === TRUE) {
    echo "Registered successfully!";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Close the database connection
$conn->close();
?>




