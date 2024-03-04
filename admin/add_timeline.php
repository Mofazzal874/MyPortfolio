<?php include 'navbar.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Timeline Entry</title>
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
        <h1>Add Timeline Entry</h1>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
            <div class="form-group">
                <label for="organization">Organization:</label>
                <input type="text" name="organization" id="organization" required>
            </div>
            <div class="form-group">
                <label for="duration">Duration:</label>
                <input type="text" name="duration" id="duration" required>
            </div>
            <div class="form-group">
                <label for="details">Details:</label>
                <textarea name="details" id="details" required></textarea>
            </div>
            <div class="form-group">
                <label for="website">Website:</label>
                <input type="text" name="website" id="website" required>
            </div>
            <div class="form-group">
                <label for="icon">Icon:</label>
                <input type="text" name="icon" id="icon" required>
            </div>
            <div class="btn-container">
                <button type="submit" class="btn" name="submit">Add Timeline Entry</button>
                <a href="timeline.php" class="btn">Cancel</a>
            </div>
        </form>

        <?php
        include '../include/config.php';

        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
            // Check if form data is present
            if (isset($_POST['organization']) && isset($_POST['duration']) && isset($_POST['details']) && isset($_POST['website']) && isset($_POST['icon'])) {
                // Sanitize inputs
                $organization = mysqli_real_escape_string($con, $_POST['organization']);
                $duration = mysqli_real_escape_string($con, $_POST['duration']);
                $details = mysqli_real_escape_string($con, $_POST['details']);
                $website = mysqli_real_escape_string($con, $_POST['website']);
                $icon = mysqli_real_escape_string($con, $_POST['icon']);

                // Insert the timeline entry into the database
                $insertQuery = "INSERT INTO timeline (organization, duration, details, website, icon) VALUES ('$organization', '$duration', '$details', '$website', '$icon')";
                $result = $con->query($insertQuery);

                if (!$result) {
                    echo "Error adding timeline entry: " . $con->error;
                } else {
                    echo "Timeline entry added successfully!";
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
