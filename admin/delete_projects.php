<?php include 'navbar.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Projects</title>
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
        <h1>Delete Projects</h1>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
            <?php
            include '../include/config.php';

            // Fetch project information
            $projectsQuery = "SELECT project_id, project_type, project_name, project_image, project_details, project_link FROM projects";
            $projectsResult = $con->query($projectsQuery);

            if ($projectsResult && $projectsResult->num_rows > 0) {
                echo "<table>";
                echo "<tr><th>Select</th><th>Project ID</th><th>Project Type</th><th>Project Name</th><th>Project Image</th><th>Project Details</th><th>Project Link</th></tr>";
                while ($row = $projectsResult->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td><input type='checkbox' name='selected_projects[]' value='" . $row['project_id'] . "'></td>";
                    echo "<td>" . $row['project_id'] . "</td>";
                    echo "<td>" . $row['project_type'] . "</td>";
                    echo "<td>" . $row['project_name'] . "</td>";
                    echo "<td><img src='" . $row['project_image'] . "' alt='Project Image' width='100'></td>";
                    echo "<td>" . $row['project_details'] . "</td>";
                    echo "<td><a href='" . $row['project_link'] . "' target='_blank'>View Project</a></td>";
                    echo "</tr>";
                }
                echo "</table>";
                echo "<div class='btn-container'>";
                echo "<button type='submit' class='btn' name='delete'>Delete Selected Projects</button>";
                echo "<a href='projects.php' class='btn'>Back to Projects</a>";
                echo "</div>";
            } else {
                echo "<p>No projects available</p>";
            }

            if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['delete'])) {
                if (isset($_POST['selected_projects']) && !empty($_POST['selected_projects'])) {
                    // Sanitize selected project IDs
                    $selectedProjects = array_map('intval', $_POST['selected_projects']);
                    $selectedProjectsString = implode(',', $selectedProjects);

                    // Delete selected projects from the database
                    $deleteQuery = "DELETE FROM projects WHERE project_id IN ($selectedProjectsString)";
                    $result = $con->query($deleteQuery);

                    if ($result) {
                        echo "<p>Selected projects deleted successfully!</p>";
                        // Refresh the page to reflect changes
                        echo "<meta http-equiv='refresh' content='2'>";
                    } else {
                        echo "<p>Error deleting projects: " . $con->error . "</p>";
                    }
                } else {
                    echo "<p>No projects selected for deletion.</p>";
                }
            }
            ?>
        </form>
    </div>
</body>
</html>
