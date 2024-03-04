<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 120;
            padding: 0;
        }
        nav {
            position: fixed; /* Fix the navigation bar at the top */
            top: 0; /* Place it at the top of the viewport */
            width: 100%; /* Occupy the full width */
            background-color: #333;
            color: #fff;
            padding: 10px 20px;
            display: flex;
            justify-content: space-between;
            z-index: 1000; /* Ensure it appears above other content */
        }
        nav h1 {
            margin: 0;
            font-size: 20px;
        }
        nav ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
            display: flex;
        }
        nav ul li {
            margin-left: 20px;
        }
        nav ul li a {
            color: #fff;
            text-decoration: none;
            font-size: 18px;
        }
        nav ul li a:hover {
            color: #ccc;
        }
        .content {
            padding: 70px 20px 20px; /* Adjust content padding to prevent overlap with navigation bar */
        }
        .mode-toggle {
            display: flex;
            align-items: center;
        }
        .mode-toggle label {
            margin-right: 10px;
        }
        /* Style for the toggle button */
        .mode-toggle input[type="checkbox"] {
            appearance: none;
            -webkit-appearance: none;
            width: 40px;
            height: 20px;
            background-color: #ddd;
            border-radius: 25px; /* Makes it round */
            position: relative;
            cursor: pointer;
            outline: none;
        }
        .mode-toggle input[type="checkbox"]::before {
            content: '';
            position: absolute;
            width: 20px;
            height: 20px;
            background-color: #fff;
            border-radius: 50%; /* Makes it round */
            top: 0;
            left: 0;
            transition: 0.3s;
        }
        .mode-toggle input[type="checkbox"]:checked::before {
            left: 20px;
        }
        /* Dark mode */
        body.dark-mode {
            background-color: #222;
            color: #fff;
        }
    </style>
</head>
<body>
    <?php include 'navbar.php'; ?> <!-- Include the navigation bar -->

    <div class="content" id="dynamic-content">
        <!-- Content will be loaded dynamically here -->
    </div>

    <script>
    const darkModeToggle = document.getElementById('dark-mode');
    const body = document.body;
    const dynamicContent = document.getElementById('dynamic-content');

    // Function to toggle dark mode
    function toggleDarkMode() {
        body.classList.toggle('dark-mode');
    }

    // Function to load content from URL
    function loadContent(event) {
        event.preventDefault();
        const url = event.target.href;

        fetch(url)
            .then(response => response.text())
            .then(data => {
                dynamicContent.innerHTML = data;
                // Reattach event listeners to newly loaded content
                attachEventListeners();
            })
            .catch(error => console.error('Error:', error));
    }

    // Function to attach event listeners to navigation links
    function attachEventListeners() {
        const navLinks = dynamicContent.querySelectorAll('.nav-link');
        navLinks.forEach(link => {
            link.addEventListener('click', loadContent);
        });
    }

    // Event listener for dark mode toggle
    darkModeToggle.addEventListener('change', toggleDarkMode);

    // Load default content (home.php) when the page loads
    window.addEventListener('load', () => {
        fetch('home.php')
            .then(response => response.text())
            .then(data => {
                dynamicContent.innerHTML = data;
                // Attach event listeners to default content
                attachEventListeners();
            })
            .catch(error => console.error('Error:', error));
    });
</script>

</body>
</html>
