<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alumni List</title>
    <!-- Include Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1 class="mb-4">Events List</h1>
        
        <div class="row">
            <?php
            // Replace with your database connection code
            $servername = "sdb-63.hosting.stackcp.net";
$username = "projecthub-35303335469e";
$password = "projecthub123";
$dbname = "projecthub-35303335469e";

// Create a connection to the database
$conn = new mysqli($servername, $username, $password, $dbname);


            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            // Retrieve data for all alumni (replace table and column names)
            $sql = "SELECT * FROM events";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo '<div class="col-md-8 mb-8">';
                    echo '<div class="card">';
                    
                  
                    echo '<div class="card-body">';
                    echo '<h5 class="card-title">' . $row["event_name"] . '</h5>';
                    echo '<p class="card-text">Event Date: ' . $row["event_date"] . '</p>';
                    echo '<p class="card-text">Organizer: ' . $row["event_organizer"] . '</p>';
                    // Add more alumni details here as needed
                    echo '</div>';
                    echo '</div>';
                    echo '</div>';
                }
            } else {
                echo "No events found.";
            }

            $conn->close();
            ?>
        </div>
    </div>

    <!-- Include Bootstrap JS and jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
