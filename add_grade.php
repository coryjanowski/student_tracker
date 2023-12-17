<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $student_id = $_POST['student_id'];
    $class_id = $_POST['class_id'];
    $grade = $_POST['grade'];

    // Connect to MySQL
    $conn = new mysqli("localhost", "coryj", "Poland86!", "StudentTracker");

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "INSERT INTO Grades (student_id, class_id, grade) VALUES ('$student_id', '$class_id', '$grade')";

    if ($conn->query($sql) === TRUE) {
        echo "New grade recorded successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Grade</title>
</head>
<body>
    <h1>Add Grade</h1>
    <form method="POST" action="add_grade.php">
        <label for="student_id">Student ID:</label>
        <input type="text" name="student_id" id="student_id" required><br><br>
        
        <label for="class_id">Class ID:</label>
        <input type="text" name="class_id" id="class_id" required><br><br>
        
        <label for="grade">Grade:</label>
        <input type="text" name="grade" id="grade" required><br><br>
        
        <input type="submit" value="Add Grade">
    </form>
    
    <br>
    <a href="dashboard.php">Return to Dashboard</a>
</body>
</html>
