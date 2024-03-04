<?php include 'navbar.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Timeline</title>
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
        table {
            width: 90%; /* Adjusted width */
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        .form-group {
            margin-bottom: 20px;
        }
        label {
            font-weight: bold;
        }
        input[type="text"], textarea, select {
            width: 100%;
            padding: 8px;
            border-radius: 5px;
            border: 1px solid #ccc;
            transition: border-color 0.3s;
        }
        textarea {
            height: 100px;
            resize: vertical;
        }
        .btn-container {
            display: flex;
            justify-content: center;
            margin-top: 20px;
        }
        .btn {
            padding: 10px 20px;
            border: none;
            border-radius: 10px;
            background-color: #008080;
            color: #fff;
            text-decoration: none;
            font-size: 16px;
            transition: background-color 0.3s ease;
            cursor: pointer;
            margin-right: 10px;
        }
        .btn:hover {
            background-color: #005757;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Update Timeline</h1>
        <?php
        include '../include/config.php';

        // Fetch timeline information
        $timelineQuery = "SELECT organization, duration, details, website, icon FROM timeline";
        $timelineResult = $con->query($timelineQuery);

        if ($timelineResult && $timelineResult->num_rows > 0) {
            echo "<form action='update_timeline.php' method='POST'>";
            echo "<table>";
            echo "<tr><th>Organization</th><th>Duration</th><th>Details</th><th>Website</th><th>Icon</th></tr>";
            while ($row = $timelineResult->fetch_assoc()) {
                $organization = $row['organization'];
                $duration = $row['duration'];
                $details = $row['details'];
                $website = $row['website'];
                $icon = $row['icon'];
                echo "<tr>";
                echo "<td><input type='text' name='organization[]' value='$organization' required></td>";
                echo "<td><input type='text' name='duration[]' value='$duration' required></td>";
                echo "<td><textarea name='details[]' required>$details</textarea></td>";
                echo "<td><input type='text' name='website[]' value='$website' required></td>";
                echo "<td><input type='text' name='icon[]' value='$icon' required></td>";
                echo "</tr>";
            }
            echo "</table>";
            echo "<div class='btn-container'>";
            echo "<button type='submit' class='btn'>Update Timeline</button>";
            echo "<a href='timeline.php' class='btn'>Cancel</a>";
            echo "</div>";
            echo "</form>";
        } else {
            echo "<p>No timeline entries available</p>";
        }
        ?>
    </div>
</body>
</html>

<?php
include '../include/config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if form data is present
    if (isset($_POST['organization']) && isset($_POST['duration']) && isset($_POST['details']) && isset($_POST['website']) && isset($_POST['icon'])) {
        // Loop through each timeline entry data
        for ($i = 0; $i < count($_POST['organization']); $i++) {
            // Sanitize inputs
            $organization = mysqli_real_escape_string($con, $_POST['organization'][$i]);
            $duration = mysqli_real_escape_string($con, $_POST['duration'][$i]);
            $details = mysqli_real_escape_string($con, $_POST['details'][$i]);
            $website = mysqli_real_escape_string($con, $_POST['website'][$i]);
            $icon = mysqli_real_escape_string($con, $_POST['icon'][$i]);

            // Update the timeline entry in the database
            $updateQuery = "UPDATE timeline SET organization='$organization', duration='$duration', details='$details', website='$website', icon='$icon' WHERE timeline_id=$i"; // Replace 'id' with your primary key column name
            $result = $con->query($updateQuery);

            if (!$result) {
                echo "Error updating timeline entry: " . $con->error;
                exit();
            }
        }

        // Redirect back to timeline.php after updating
        header("Location: timeline.php");
        exit();
    } else {
        // Form data is missing
        echo "Form data is missing!";
        exit();
    }
} else {
    // Redirect if accessed directly
    header("Location: timeline.php");
    exit();
}
?>
