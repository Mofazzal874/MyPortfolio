<?php include 'navbar.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Projects Page</title>
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
        <h1>Projects</h1>
        <?php
        include '../include/config.php';

        // Fetch project information
        $projectsQuery = "SELECT project_type, project_name, project_image, project_details, project_link FROM projects";
        $projectsResult = $con->query($projectsQuery);

        if ($projectsResult && $projectsResult->num_rows > 0) {
            echo "<table>";
            echo "<tr><th>Project Type</th><th>Project Name</th><th>Project Image</th><th>Project Details</th><th>Project Link</th></tr>";
            while ($row = $projectsResult->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row['project_type'] . "</td>";
                echo "<td>" . $row['project_name'] . "</td>";
                echo "<td><img src='" . $row['project_image'] . "' alt='Project Image' width='100'></td>";
                echo "<td>" . $row['project_details'] . "</td>";
                echo "<td><a href='" . $row['project_link'] . "' target='_blank'>View Project</a></td>";
                echo "</tr>";
            }
            echo "</table>";
        } else {
            echo "<p>No projects available</p>";
        }
        ?>
        <!-- Buttons -->
        <div class="btn-container">
            <a href="update_projects.php" class="btn">Update Projects</a>
            <a href="add_projects.php" class="btn">Add Projects</a>
            <a href="delete_projects.php" class="btn">Delete Projects</a>
        </div>
    </div>
</body>
</html>
