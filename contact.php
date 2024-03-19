<?php
// Include the database connection file
include 'include/config.php'; 

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $name = isset($_POST['name']) ? $_POST['name'] : '';
    $email = isset($_POST['email']) ? $_POST['email'] : '';
    $message = isset($_POST['message']) ? $_POST['message'] : '';

    // Insert data into the database
    $sql = "INSERT INTO messages (person_name, person_mail,person_message) VALUES ('$name', '$email', '$message')";

    if ($con->query($sql) === TRUE) {
        echo "<script>alert('Message sent successfully!');</script>";
        echo "<script>window.history.back();</script>"; // Redirect to the previous page
        exit; // Stop further execution
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($con);
    }
}

// Close database connection
$con->close();

