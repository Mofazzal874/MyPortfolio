<nav>
    <h1>Admin Panel of Mofazzal Hosen</h1>
    <ul>
        <li><a href="home.php" class="nav-link">Home</a></li>
        <li><a href="about.php" class="nav-link">About</a></li>
        <li><a href="timeline.php" class="nav-link">Timeline</a></li>
        <li><a href="projects.php" class="nav-link">Projects</a></li>
        <li><a href="messages.php" class="nav-link">Messages</a></li>
    </ul>
    <div class="mode-toggle">
        <label for="dark-mode">Dark Mode</label>
        <input type="checkbox" id="dark-mode">
    </div>
</nav>

<style>
    nav {
        position: fixed;
        top: 0;
        left: 50%; /* Align to the center */
        transform: translateX(-50%);
        width: 80%;
        max-width: 80%;
        height: 50px;
        background-color: #333;
        color: #fff;
        padding: 10px;
        display: flex;
        justify-content: space-between;
        align-items: center;
        border-radius: 20px; /* Rounded corners */
        z-index: 1000;
    }
    nav h1 {
        margin: 0;
        font-size: 24px;
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
    .mode-toggle {
        display: flex;
        align-items: center;
    }
    .mode-toggle label {
        margin-right: 10px;
    }
    .mode-toggle input[type="checkbox"] {
        appearance: none;
        -webkit-appearance: none;
        width: 40px;
        height: 20px;
        background-color: #ddd;
        border-radius: 25px;
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
        border-radius: 50%;
        top: 0;
        left: 0;
        transition: 0.3s;
    }
    .mode-toggle input[type="checkbox"]:checked::before {
        left: calc(100% - 20px);
    }
</style>

<script>
    const darkModeToggle = document.getElementById('dark-mode');
    const body = document.body;
    // Function to toggle dark mode
    function toggleDarkMode() {
        body.classList.toggle('dark-mode');
    }
    // Event listener for dark mode toggle
    darkModeToggle.addEventListener('change', toggleDarkMode);
</script>
