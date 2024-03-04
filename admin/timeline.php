<?php include 'navbar.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Timeline Page</title>
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
            width: 80%;
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
        .btn-container {
            display: flex;
            justify-content: space-around;
            width: 80%;
            margin-bottom: 20px;
        }
        .btn {
            padding: 10px 20px;
            border: none;
            border-radius: 10px;
            background-color: #008080; /* Button color */
            color: #fff;
            text-decoration: none;
            font-size: 16px;
            transition: background-color 0.3s ease;
        }
        .btn:hover {
            background-color: #005757; /* Darker button color on hover */
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Timeline</h1>
        <?php
        include '../include/config.php';

        // Fetch timeline information
        $timelineQuery = "SELECT organization, duration, details, website, icon FROM timeline";
        $timelineResult = $con->query($timelineQuery);

        if ($timelineResult && $timelineResult->num_rows > 0) {
            echo "<table>";
            echo "<tr><th>Organization</th><th>Duration</th><th>Details</th><th>Website</th><th>Icon</th></tr>";
            while ($row = $timelineResult->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row['organization'] . "</td>";
                echo "<td>" . $row['duration'] . "</td>";
                echo "<td>" . $row['details'] . "</td>";
                echo "<td><a href='" . $row['website'] . "' target='_blank'>Visit Website</a></td>";
                echo "<td><img src='" . $row['icon'] . "' alt='Icon' width='50'></td>";
                echo "</tr>";
            }
            echo "</table>";
        } else {
            echo "<p>No timeline entries available</p>";
        }
        ?>
        <!-- Buttons -->
        <div class="btn-container">
            <a href="update_timeline.php" class="btn">Update Timeline</a>
            <a href="add_timeline.php" class="btn">Add Timeline Entry</a>
            <a href="delete_timeline.php" class="btn">Delete Timeline Entries</a>
        </div>
    </div>
</body>
</html>
