<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Connect to MySQL database
    $conn = new mysqli("localhost", "coryj", "Poland86!", "StudentTracker");

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Check if the user wants to create a new login
    if (isset($_POST['create'])) {
        // Check if the username already exists
        $checkUsername = "SELECT id FROM Students WHERE username = '$username'";
        $result = $conn->query($checkUsername);

        if ($result->num_rows > 0) {
            echo "Username already exists. Please choose a different username.";
        } else {
            // Insert new user into the database
            $insertUser = "INSERT INTO Students (username, password) VALUES ('$username', '$password')";
            if ($conn->query($insertUser) === TRUE) {
                echo "New user created successfully. You can now login.";
            } else {
                echo "Error creating new user: " . $conn->error;
            }
        }
    } else {
        // Ask the user if they want to create a new login
        echo "Do you want to create a new login? <a href='login.php?create=true'>Click here</a>";

        // Check credentials
        $sql = "SELECT id FROM Students WHERE username = '$username' AND password = '$password'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $_SESSION['loggedin'] = true;
            $_SESSION['username'] = $username;
            header("location: dashboard.php");
        } else {
            echo "Invalid username or password";
        }
    }

    $conn->close();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
        }

        h1 {
            text-align: center;
            margin-top: 50px;
        }

        form {
            width: 300px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        label {
            display: block;
            margin-bottom: 10px;
        }

        input[type="text"],
        input[type="password"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
            margin-bottom: 20px;
        }

        input[type="submit"] {
            width: 100%;
            background-color: #4CAF50;
            color: #fff;
            padding: 10px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <h1>Login</h1>
    <form method="POST" action="login.php">
        <label for="username">Username:</label>
        <input type="text" name="username" id="username" required><br><br>
        <label for="password">Password:</label>
        <input type="password" name="password" id="password" required><br><br>
        <input type="submit" value="Login">
    </form>
</body>
</html>
