<?php
// Assuming you have a database connection established
// You should replace 'your_host', 'your_username', 'your_password', and 'your_database' with your actual database credentials
$conn = new mysqli('localhost', 'admin', 'password', 'tp_cyber');

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if a record exists
    $check_sql = "SELECT * FROM tricked_counter";
    $check_result = $conn->query($check_sql);
    
    if ($check_result->num_rows > 0) {
        // If a record exists, update the visits count
        $update_sql = "UPDATE tricked_counter SET tricked = tricked + 1";
        $update_result = $conn->query($update_sql);
    } else {
        // If no record exists, insert a new one with visits count set to 1
        $insert_sql = "INSERT INTO tricked_counter (tricked) VALUES (1)";
        $insert_result = $conn->query($insert_sql);
    }

    // Redirect to another page
    header("Location: message.html");
    exit;
}
?>


