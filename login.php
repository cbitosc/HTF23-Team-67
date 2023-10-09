<?php
// Connect to the database (replace with your own credentials)
$host = "sdb-63.hosting.stackcp.net";
$username = "projecthub-35303335469e";
$password = "projecthub123";
$database = "projecthub-35303335469e";

// Establish a database connection
$conn = new mysqli($host, $username, $password, $database);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve login credentials from the form
$email = $_POST["email"];
$password = $_POST["password"];

// SQL query to check if the user exists and credentials are correct
$sql = "SELECT * FROM Alumni WHERE email = '$email' AND password = '$password'";

$result = $conn->query($sql);

if ($result->num_rows == 1) {
    // User authenticated successfully; perform login actions
    session_start(); // Start a session for the user
    $_SESSION["email"] = $email; // Store user information in the session
    header("Location: home2.html"); // Redirect to the user's dashboard
    exit();
} else {
    // Invalid login credentials; display an error message
    header("Location: login.html");
}

// Close the database connection
$conn->close();
?>

