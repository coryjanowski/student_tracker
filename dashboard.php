<?php
session_start();

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("location: login.php");
    exit;
}

// Connect to MySQL database
$conn = new mysqli("localhost", "coryj", "Poland86!", "StudentTracker");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM Classes";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "<p style='color: blue;'>Class: " . $row["name"]. "</p>";
    }
} else {
    echo "<p style='color: red;'>0 results</p>";
}
$conn->close();

function goToAddGradePage() {
    header("location: add_grade.php");
    exit;
}

function showGrades() {
    // Connect to MySQL database
    $conn = new mysqli("localhost", "coryj", "Poland86!", "StudentTracker");

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT * FROM Grades";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo "<p>Grade: " . $row["grade"]. "</p>";
        }
    } else {
        echo "<p>No grades found</p>";
    }
    $conn->close();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
        }
        
        h1 {
            color: #333;
        }
        
        h2 {
            color: #666;
        }
        
        p {
            color: #333;
        }
        
        .blue-text {
            color: blue;
        }
        
        .red-text {
            color: red;
        }
        
        .button {
            background-color: #4CAF50;
            border: none;
            color: white;
            padding: 10px 20px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin: 4px 2px;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <h1>Welcome to the Dashboard</h1>
    <p>Logged in as: <?php echo $_SESSION['username']; ?></p>
    
    <h2>Classes</h2>
    <?php
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo "<p class='blue-text'>Class: " . $row["name"]. "</p>";
        }
    } else {
        echo "<p class='red-text'>No classes found</p>";
    }
    ?>
    
    <h2>Grades</h2>
    <?php showGrades(); ?>
    
    <button class="button" onclick="goToAddGradePage()">Add Grade</button>
    
    <script>
        function goToAddGradePage() {
            window.location.href = "add_grade.php";
        }
    </script>
</body>
</html>
