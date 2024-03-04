<?php
include '../include/config.php';
include 'navbar.php'; // Include the navbar.php file here

// Fetch user information
$userInfoQuery = "SELECT name , title, homeabout, linkedin, github, twitter, facebook, youtube FROM users";
$userInfoResult = $con->query($userInfoQuery);

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Prepare SQL statement to update user information
    $updateUserInfoQuery = "UPDATE users SET name=?, title=?, homeabout=?, linkedin=?, github=?, twitter=?, facebook=?, youtube=?";
    $updateUserInfoStmt = $con->prepare($updateUserInfoQuery);
    $updateUserInfoStmt->bind_param("ssssssss", $_POST['name'], $_POST['title'], $_POST['homeabout'], $_POST['linkedin'], $_POST['github'], $_POST['twitter'], $_POST['facebook'], $_POST['youtube']);

    // Execute the update statement
    $updateUserInfoStmt->execute();

    // Redirect to the same page to avoid resubmission
    header("Location: update_home.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Home Page</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 120;
            padding: 0;
            color: #333; /* Default text color */
        }
        .container {
            display: flex;
            flex-direction: column;
            align-items: center;
            margin-top: 20px;
        }
        .section {
            width: 80%;
            border: 1px solid #ccc;
            border-radius: 10px;
            padding: 20px;
            margin-bottom: 20px;
            background-color: #f2f2f2;
            transition: background-color 0.3s;
            color: #333; /* Text color in light mode */
        }
        .section h1 {
            margin-top: 0;
            margin-bottom: 20px;
            text-align: center;
            position: relative;
            background-color: #008080; /* New background color */
            color: #fff; /* Text color in light mode */
            padding: 10px;
            border-top-left-radius: 10px; /* Rounded corners for top-left */
            border-top-right-radius: 10px; /* Rounded corners for top-right */
        }
        .section h1::after {
            content: '';
            position: absolute;
            width: 100%;
            height: 2px; /* Adjusted line height */
            background-color: #ccc;
            bottom: -10px;
            left: 0;
            border-bottom-left-radius: 10px; /* Rounded corners for bottom-left */
            border-bottom-right-radius: 10px; /* Rounded corners for bottom-right */
        }
        .section-content {
            display: flex;
            flex-direction: column;
        }
        .section-content-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px;
            border-bottom: 1px solid #ddd;
        }
        .section-content-item label {
            font-weight: bold;
            width: 150px;
            margin-right: 10px;
            text-align: left;
            color: #555; /* Text color in light mode */
        }
        .section-content-item input[type="text"], .section-content-item textarea {
            flex: 1;
            padding: 8px; /* Increased padding */
            border-radius: 5px;
            border: 1px solid #ccc;
            transition: border-color 0.3s;
            width: 70%; /* Adjusted width */
        }
        .section-content-item input[type="text"]:focus, .section-content-item textarea:focus {
            outline: none;
            border-color: #008080; /* Focus border color */
        }
        .update-btn-container {
            display: flex;
            justify-content: center;
            margin-top: 20px;
        }
        .update-btn {
            padding: 10px 20px;
            border: none;
            border-radius: 10px;
            background-color: #008080; /* Button color */
            color: #fff;
            text-decoration: none;
            font-size: 16px;
            transition: background-color 0.3s ease;
            cursor: pointer; /* Add pointer cursor */
        }
        .update-btn:hover {
            background-color: #005757; /* Darker button color on hover */
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="section">
            <h1>User Information</h1>
            <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                <div class="section-content">
                    <!-- User Information content -->
                    <?php
                    if ($userInfoResult->num_rows > 0) {
                        while ($row = $userInfoResult->fetch_assoc()) {
                            echo "<div class='section-content-item'>";
                            echo "<label>Name:</label>";
                            echo "<input type='text' name='name' value='" . $row['name'] . "'>";
                            echo "</div>";

                            echo "<div class='section-content-item'>";
                            echo "<label>Title:</label>";
                            echo "<input type='text' name='title' value='" . $row['title'] . "'>";
                            echo "</div>";

                            echo "<div class='section-content-item'>";
                            echo "<label>Home About:</label>";
                            echo "<textarea name='homeabout' rows='4'>" . $row['homeabout'] . "</textarea>";
                            echo "</div>";

                            echo "<div class='section-content-item'>";
                            echo "<label>LinkedIn:</label>";
                            echo "<input type='text' name='linkedin' value='" . $row['linkedin'] . "'>";
                            echo "</div>";

                            echo "<div class='section-content-item'>";
                            echo "<label>GitHub:</label>";
                            echo "<input type='text' name='github' value='" . $row['github'] . "'>";
                            echo "</div>";

                            echo "<div class='section-content-item'>";
                            echo "<label>Twitter:</label>";
                            echo "<input type='text' name='twitter' value='" . $row['twitter'] . "'>";
                            echo "</div>";

                            echo "<div class='section-content-item'>";
                            echo "<label>Facebook:</label>";
                            echo "<input type='text' name='facebook' value='" . $row['facebook'] . "'>";
                            echo "</div>";

                            echo "<div class='section-content-item'>";
                            echo "<label>YouTube:</label>";
                            echo "<input type='text' name='youtube' value='" . $row['youtube'] . "'>";
                            echo "</div>";
                        }
                    } else {
                        echo "<p>No data available</p>";
                    }
                    ?>
                </div>
                <!-- Submit Button -->
                <div class="update-btn-container">
                    <button type="submit" class="update-btn">Update</button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
