<?php include 'navbar.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Projects</title>
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
        form {
            width: 80%;
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
        <h1>Add Projects</h1>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
            <div class="form-group">
                <label for="project_type">Project Type:</label>
                <select name="project_type" id="project_type">
                    <option value="game">Game</option>
                    <option value="android">Android</option>
                    <option value="others">Others</option>
                </select>
            </div>
            <div class="form-group">
                <label for="project_name">Project Name:</label>
                <input type="text" name="project_name" id="project_name" required>
            </div>
            <div class="form-group">
                <label for="project_image">Project Image:</label>
                <input type="text" name="project_image" id="project_image" required>
            </div>
            <div class="form-group">
                <label for="project_details">Project Details:</label>
                <textarea name="project_details" id="project_details" required></textarea>
            </div>
            <div class="form-group">
                <label for="project_link">Project Link:</label>
                <input type="text" name="project_link" id="project_link" required>
            </div>
            <div class="btn-container">
                <button type="submit" class="btn" name="submit">Add Project</button>
                <a href="projects.php" class="btn">Cancel</a>
            </div>
        </form>

        <?php
        include '../include/config.php';

        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
            // Check if form data is present
            if (isset($_POST['project_type']) && isset($_POST['project_name']) && isset($_POST['project_image']) && isset($_POST['project_details']) && isset($_POST['project_link'])) {
                // Sanitize inputs
                $project_type = mysqli_real_escape_string($con, $_POST['project_type']);
                $project_name = mysqli_real_escape_string($con, $_POST['project_name']);
                $project_image = mysqli_real_escape_string($con, $_POST['project_image']);
                $project_details = mysqli_real_escape_string($con, $_POST['project_details']);
                $project_link = mysqli_real_escape_string($con, $_POST['project_link']);

                // Insert the project into the database
                $insertQuery = "INSERT INTO projects (project_type, project_name, project_image, project_details, project_link) VALUES ('$project_type', '$project_name', '$project_image', '$project_details', '$project_link')";
                $result = $con->query($insertQuery);

                if (!$result) {
                    echo "Error adding project: " . $con->error;
                } else {
                    echo "Project added successfully!";
                }
            } else {
                // Form data is missing
                echo "Form data is missing!";
            }
        }
        ?>
    </div>
</body>
</html>
