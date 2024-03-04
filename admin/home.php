<?php include 'navbar.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
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
        .section:hover {
            background-color: #e0e0e0;
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
        .section-content-item p {
            margin: 0;
            text-align: left;
        }
        .section-content-item:hover {
            background-color: #e0e0e0;
        }

        /* Style for the update button */
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
            <div class="section-content">
                <!-- User Information content -->
                <?php
                include '../include/config.php';

                // Fetch user information
                $userInfoQuery = "SELECT name , title, homeabout FROM users";
                $userInfoResult = $con->query($userInfoQuery);

                if ($userInfoResult->num_rows > 0) {
                    while ($row = $userInfoResult->fetch_assoc()) {
                        echo "<div class='section-content-item'>";
                        echo "<label>Name:</label>";
                        echo "<p>" . $row['name'] . "</p>";
                        echo "</div>";

                        echo "<div class='section-content-item'>";
                        echo "<label>Title:</label>";
                        echo "<p>" . $row['title'] . "</p>";
                        echo "</div>";

                        echo "<div class='section-content-item'>";
                        echo "<label>Home About:</label>";
                        echo "<p>" . $row['homeabout'] . "</p>";
                        echo "</div>";
                    }
                } else {
                    echo "<p>No data available</p>";
                }
                ?>
            </div>
        </div>

        <div class="section">
            <h1>Social Links</h1>
            <div class="section-content">
                <!-- Social Links content -->
                <?php
                // Fetch social links
                $socialLinksQuery = "SELECT linkedin, github, twitter, facebook, youtube FROM users";
                $socialLinksResult = $con->query($socialLinksQuery);

                if ($socialLinksResult->num_rows > 0) {
                    while ($row = $socialLinksResult->fetch_assoc()) {
                        echo "<div class='section-content-item'>";
                        echo "<label>LinkedIn:</label>";
                        echo "<p>" . $row['linkedin'] . "</p>";
                        echo "</div>";

                        echo "<div class='section-content-item'>";
                        echo "<label>GitHub:</label>";
                        echo "<p>" . $row['github'] . "</p>";
                        echo "</div>";

                        echo "<div class='section-content-item'>";
                        echo "<label>Twitter:</label>";
                        echo "<p>" . $row['twitter'] . "</p>";
                        echo "</div>";

                        echo "<div class='section-content-item'>";
                        echo "<label>Facebook:</label>";
                        echo "<p>" . $row['facebook'] . "</p>";
                        echo "</div>";

                        echo "<div class='section-content-item'>";
                        echo "<label>YouTube:</label>";
                        echo "<p>" . $row['youtube'] . "</p>";
                        echo "</div>";
                    }
                } else {
                    echo "<p>No data available</p>";
                }
                ?>
            </div>
        </div>

        <!-- Update Homepage button -->
        <div class="update-btn-container">
            <a href="update_home.php" class="update-btn">Update Homepage</a>
        </div>
    </div>
</body>
</html>
