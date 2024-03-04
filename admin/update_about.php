<?php include 'navbar.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update About</title>
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
            margin-bottom: 20px;
        }
        .form-group {
            margin-bottom: 20px;
        }
        label {
            font-weight: bold;
        }
        input[type="text"], textarea {
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
            width: 80%;
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
        <h1>Update About</h1>
        <?php
        include '../include/config.php';

        // Fetch about information
        $aboutQuery = "SELECT education, completed, experience, about_details FROM about WHERE about_id=1"; // Assuming about_id is 1
        $aboutResult = $con->query($aboutQuery);

        if ($aboutResult && $aboutResult->num_rows > 0) {
            $row = $aboutResult->fetch_assoc();
            $education = $row['education'];
            $completed = $row['completed'];
            $experience = $row['experience'];
            $about_details = $row['about_details'];
        } else {
            $education = '';
            $completed = '';
            $experience = '';
            $about_details = '';
        }
        ?>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
            <div class="form-group">
                <label for="education">Education</label>
                <input type="text" id="education" name="education" value="<?php echo $education; ?>" required>
            </div>
            <div class="form-group">
                <label for="completed">Completed</label>
                <input type="text" id="completed" name="completed" value="<?php echo $completed; ?>" required>
            </div>
            <div class="form-group">
                <label for="experience">Experience</label>
                <input type="text" id="experience" name="experience" value="<?php echo $experience; ?>" required>
            </div>
            <div class="form-group">
                <label for="about_details">About Details</label>
                <textarea id="about_details" name="about_details" required><?php echo $about_details; ?></textarea>
            </div>
            <div class="btn-container">
                <button type="submit" class="btn" name="update">Update About</button>
                <a href="about.php" class="btn">Cancel</a>
            </div>
        </form>
    </div>
</body>
</html>

<?php
include '../include/config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['update'])) {
    // Validate and sanitize input
    $education = mysqli_real_escape_string($con, $_POST['education']);
    $completed = mysqli_real_escape_string($con, $_POST['completed']);
    $experience = mysqli_real_escape_string($con, $_POST['experience']);
    $about_details = mysqli_real_escape_string($con, $_POST['about_details']);

    // Update the about information in the database
    $updateQuery = "UPDATE about SET education='$education', completed='$completed', experience='$experience', about_details='$about_details' WHERE about_id=1"; // Assuming about_id is 1
    $result = $con->query($updateQuery);

    if (!$result) {
        echo "Error updating about information: " . $con->error;
    } else {
        // Redirect back to about.php after updating
        header("Location: about.php");
        exit();
    }
}
?>
