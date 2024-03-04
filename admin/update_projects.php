<?php include 'navbar.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Projects</title>
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
        <h1>Update Projects</h1>
        <?php
        include '../include/config.php';

        // Fetch project information
        $projectsQuery = "SELECT project_type, project_name, project_image, project_details, project_link FROM projects";
        $projectsResult = $con->query($projectsQuery);

        if ($projectsResult && $projectsResult->num_rows > 0) {
            echo "<form action='update_projects.php' method='POST'>";
            echo "<table>";
            echo "<tr><th>Project Type</th><th>Project Name</th><th>Project Image</th><th>Project Details</th><th>Project Link</th></tr>";
            while ($row = $projectsResult->fetch_assoc()) {
                $project_type = $row['project_type'];
                $project_name = $row['project_name'];
                $project_image = $row['project_image'];
                $project_details = $row['project_details'];
                $project_link = $row['project_link'];
                echo "<tr>";
                echo "<td>";
                echo "<select name='project_type[]'>";
                echo "<option value='game' " . ($project_type == 'game' ? 'selected' : '') . ">Game</option>";
                echo "<option value='android' " . ($project_type == 'android' ? 'selected' : '') . ">Android</option>";
                echo "<option value='others' " . ($project_type == 'others' ? 'selected' : '') . ">Others</option>";
                echo "</select>";
                echo "</td>";
                echo "<td><input type='text' name='project_name[]' value='$project_name' required></td>";
                echo "<td><input type='text' name='project_image[]' value='$project_image' required></td>";
                echo "<td><textarea name='project_details[]' required>$project_details</textarea></td>";
                echo "<td><input type='text' name='project_link[]' value='$project_link' required></td>";
                echo "</tr>";
            }
            echo "</table>";
            echo "<div class='btn-container'>";
            echo "<button type='submit' class='btn'>Update Projects</button>";
            echo "<a href='projects.php' class='btn'>Cancel</a>";
            echo "</div>";
            echo "</form>";
        } else {
            echo "<p>No projects available</p>";
        }
        ?>
    </div>
</body>
</html>

<?php
include '../include/config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if form data is present
    if (isset($_POST['project_type']) && isset($_POST['project_name']) && isset($_POST['project_image']) && isset($_POST['project_details']) && isset($_POST['project_link'])) {
        // Loop through each project data
        for ($i = 0; $i < count($_POST['project_id']); $i++) {
            // Sanitize inputs
            $project_type = mysqli_real_escape_string($con, $_POST['project_type'][$i]);
            $project_name = mysqli_real_escape_string($con, $_POST['project_name'][$i]);
            $project_image = mysqli_real_escape_string($con, $_POST['project_image'][$i]);
            $project_details = mysqli_real_escape_string($con, $_POST['project_details'][$i]);
            $project_link = mysqli_real_escape_string($con, $_POST['project_link'][$i]);

            // Update the project in the database
            $updateQuery = "UPDATE projects SET project_type='$project_type', project_name='$project_name', project_image='$project_image', project_details='$project_details', project_link='$project_link' WHERE project_id=$i"; // Replace 'id' with your primary key column name
            $result = $con->query($updateQuery);

            if (!$result) {
                echo "Error updating project: " . $con->error;
                exit();
            }
        }

        // Redirect back to update_projects.php after updating
        header("Location: projects.php");
        exit();
    } else {
        // Form data is missing
        echo "Form data is missing!";
        exit();
    }
} else {
    // Redirect if accessed directly
    header("Location: projects.php");
    exit();
}
?>
