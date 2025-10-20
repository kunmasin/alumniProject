<?php
header('Content-Type: application/json'); // Indicate that the response is JSON

// Database connection parameters
$servername = "localhost"; // Usually "localhost" if your database is on the same server
$username = "your_db_username"; // Replace with your database username
$password = "your_db_password"; // Replace with your database password
$dbname = "apu_alumni"; // The database you created

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die(json_encode(['error' => 'Connection failed: ' . $conn->connect_error]));
}

// Fetch job opportunities
$sql = "SELECT title, company, location, description, job_type, posted_date, apply_link FROM job_opportunities ORDER BY posted_date DESC";
$result = $conn->query($sql);

$jobs = [];
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $jobs[] = [
            'title' => htmlspecialchars($row['title']),
            'company' => htmlspecialchars($row['company']),
            'location' => htmlspecialchars($row['location']),
            'description' => htmlspecialchars($row['description']),
            'job_type' => htmlspecialchars($row['job_type']),
            'posted_date' => date('F d, Y', strtotime($row['posted_date'])), // Format date nicely
            'apply_link' => htmlspecialchars($row['apply_link'])
        ];
    }
}

// Close connection
$conn->close();

// Return jobs as JSON
echo json_encode($jobs);
?>