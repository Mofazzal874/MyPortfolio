<?php include 'navbar.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Messages Page</title>
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
        .delete-btn {
            background-color: #ff0000; /* Red delete button color */
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Messages</h1>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
            <?php
            include '../include/config.php';

            // Fetch message information
            $messagesQuery = "SELECT message_id, person_name, person_mail, message FROM messages";
            $messagesResult = $con->query($messagesQuery);

            if ($messagesResult && $messagesResult->num_rows > 0) {
                echo "<table>";
                echo "<tr><th>Select</th><th>Person Name</th><th>Email</th><th>Message</th></tr>";
                while ($row = $messagesResult->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td><input type='checkbox' name='selected_messages[]' value='" . $row['message_id'] . "'></td>";
                    echo "<td>" . $row['person_name'] . "</td>";
                    echo "<td>" . $row['person_mail'] . "</td>";
                    echo "<td>" . $row['message'] . "</td>";
                    echo "<td><button type='submit' class='btn delete-btn' name='delete_message' value='" . $row['message_id'] . "'>Delete</button></td>";
                    echo "</tr>";
                }
                echo "</table>";
                echo "<div class='btn-container'>";
                echo "<button type='submit' class='btn' name='delete_selected'>Delete Selected Messages</button>";
                echo "<button type='submit' class='btn' name='delete_all'>Delete All Messages</button>";
                echo "</div>";
            } else {
                echo "<p>No messages available</p>";
            }

            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                if (isset($_POST['delete_message'])) {
                    $messageId = $_POST['delete_message'];
                    // Delete the selected message from the database
                    $deleteQuery = "DELETE FROM messages WHERE message_id = $messageId";
                    $result = $con->query($deleteQuery);
                    if ($result) {
                        echo "<p>Message deleted successfully!</p>";
                        // Refresh the page to reflect changes
                        echo "<meta http-equiv='refresh' content='2'>";
                    } else {
                        echo "<p>Error deleting message: " . $con->error . "</p>";
                    }
                } elseif (isset($_POST['delete_selected'])) {
                    if (isset($_POST['selected_messages']) && !empty($_POST['selected_messages'])) {
                        // Sanitize selected message IDs
                        $selectedMessages = array_map('intval', $_POST['selected_messages']);
                        $selectedMessagesString = implode(',', $selectedMessages);

                        // Delete selected messages from the database
                        $deleteQuery = "DELETE FROM messages WHERE message_id IN ($selectedMessagesString)";
                        $result = $con->query($deleteQuery);

                        if ($result) {
                            echo "<p>Selected messages deleted successfully!</p>";
                            // Refresh the page to reflect changes
                            echo "<meta http-equiv='refresh' content='2'>";
                        } else {
                            echo "<p>Error deleting selected messages: " . $con->error . "</p>";
                        }
                    } else {
                        echo "<p>No messages selected for deletion.</p>";
                    }
                } elseif (isset($_POST['delete_all'])) {
                    // Delete all messages from the database
                    $deleteAllQuery = "DELETE FROM messages";
                    $result = $con->query($deleteAllQuery);
                    if ($result) {
                        echo "<p>All messages deleted successfully!</p>";
                        // Refresh the page to reflect changes
                        echo "<meta http-equiv='refresh' content='2'>";
                    } else {
                        echo "<p>Error deleting all messages: " . $con->error . "</p>";
                    }
                }
            }
            ?>
        </form>
    </div>
</body>
</html>
