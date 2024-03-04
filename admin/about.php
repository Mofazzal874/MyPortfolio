<?php include 'navbar.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Page</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 130;
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
        <h1>About</h1>
        <?php
        include '../include/config.php';

        // Fetch about information
        $aboutQuery = "SELECT education, completed, experience, about_details FROM about";
        $aboutResult = $con->query($aboutQuery);

        if ($aboutResult && $aboutResult->num_rows > 0) {
            echo "<table>";
            echo "<tr><th>Education</th><th>Completed</th><th>Experience</th><th>About Details</th></tr>";
            while ($row = $aboutResult->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row['education'] . "</td>";
                echo "<td>" . $row['completed'] . "</td>";
                echo "<td>" . $row['experience'] . "</td>";
                echo "<td>" . $row['about_details'] . "</td>";
                echo "</tr>";
            }
            echo "</table>";
        } else {
            echo "<p>No data available</p>";
        }
        ?>
        <!-- Update Button -->
        <div class="btn-container">
            <a href="update_about.php" class="btn">Update</a>
        </div>
    </div>
</body>
</html>
