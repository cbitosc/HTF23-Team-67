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
$event_name = $_POST["event_name"];
$event_date = $_POST["event_date"];
$event_description = $_POST["event_description"];
$event_organizer=$_POST["event_organizer"];

// SQL query to insert event data into the database
$sql = "INSERT INTO events (event_name, event_date, event_description,event_organizer) VALUES ('$event_name', '$event_date', '$event_description','$event_organizer')";

if ($conn->query($sql) === TRUE) {
    echo "Event submitted successfully!";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Close the database connection
$conn->close();
?>
