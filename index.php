<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Tracker</title>
    <link rel="stylesheet" href="assets/css/style.css"> <!-- Link to your CSS file -->
    <style>
        /* Add custom CSS styles here */
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            margin: 0;
            padding: 0;
        }

        header {
            background-color: #333;
            color: #fff;
            padding: 20px;
            text-align: center;
        }

        nav ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
        }

        nav ul li {
            margin: 0 10px;
        }

        nav ul li a {
            color: #fff;
            text-decoration: none;
        }

        main {
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        footer {
            background-color: #333;
            color: #fff;
            padding: 10px;
            text-align: center;
        }
    </style>
</head>
<body>
    <header>
        <h1>Welcome to Student Tracker</h1>
        <nav>
            <ul>
                <li><a href="login.php">Login</a></li>
                <li><a href="dashboard.php">Dashboard</a></li>
                <!-- Add other links as needed -->
            </ul>
        </nav>
    </header>

    <main>
        <section>
            <h2>About the Student Tracker</h2>
            <p>This system allows students to track their classes and grades.</p>
        </section>

        <!-- Other sections as needed -->
    </main>

    <footer>
        <p>&copy; 2023 Student Tracker</p>
    </footer>

    <script src="assets/js/script.js"></script> <!-- Link to your JavaScript file -->
</body>
</html>