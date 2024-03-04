<?php include 'navbar.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Timeline Entries</title>
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
            justify-content: space-between; /* Align buttons with space between them */
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
        <h1>Delete Timeline Entries</h1>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
            <?php
            include '../include/config.php';

            // Fetch timeline information
            $timelineQuery = "SELECT timeline_id, organization, duration, details, website, icon FROM timeline";
            $timelineResult = $con->query($timelineQuery);

            if ($timelineResult && $timelineResult->num_rows > 0) {
                echo "<table>";
                echo "<tr><th>Select</th><th>Organization</th><th>Duration</th><th>Details</th><th>Website</th><th>Icon</th></tr>";
                while ($row = $timelineResult->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td><input type='checkbox' name='selected_timelines[]' value='" . $row['timeline_id'] . "'></td>";
                    echo "<td>" . $row['organization'] . "</td>";
                    echo "<td>" . $row['duration'] . "</td>";
                    echo "<td>" . $row['details'] . "</td>";
                    echo "<td><a href='" . $row['website'] . "' target='_blank'>Visit Website</a></td>";
                    echo "<td>" . $row['icon'] . "</td>";
                    echo "</tr>";
                }
                echo "</table>";
                echo "<div class='btn-container'>";
                echo "<button type='submit' class='btn' name='delete'>Delete Selected Entries</button>";
                echo "<a href='timeline.php' class='btn'>Back to Timeline</a>";
                echo "</div>";
            } else {
                echo "<p>No timeline entries available</p>";
            }

            if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['delete'])) {
                if (isset($_POST['selected_timelines']) && !empty($_POST['selected_timelines'])) {
                    // Sanitize selected timeline IDs
                    $selectedTimelines = array_map('intval', $_POST['selected_timelines']);
                    $selectedTimelinesString = implode(',', $selectedTimelines);

                    // Delete selected timeline entries from the database
                    $deleteQuery = "DELETE FROM timeline WHERE timeline_id IN ($selectedTimelinesString)";
                    $result = $con->query($deleteQuery);

                    if ($result) {
                        echo "<p>Selected timeline entries deleted successfully!</p>";
                        // Refresh the page to reflect changes
                        echo "<meta http-equiv='refresh' content='2'>";
                    } else {
                        echo "<p>Error deleting timeline entries: " . $con->error . "</p>";
                    }
                } else {
                    echo "<p>No timeline entries selected for deletion.</p>";
                }
            }
            ?>
        </form>
    </div>
</body>
</html>
