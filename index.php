<?php
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if form data exists and is not empty
    $name = isset($_POST['name']) ? mysqli_real_escape_string($conn, $_POST['name']) : '';
    $age = isset($_POST['age']) ? mysqli_real_escape_string($conn, $_POST['age']) : '';
    $email = isset($_POST['email']) ? mysqli_real_escape_string($conn, $_POST['email']) : '';
    $course = isset($_POST['course']) ? mysqli_real_escape_string($conn, $_POST['course']) : '';

    // Insert into database
    if (!empty($name) && !empty($age) && !empty($email) && !empty($course)) {
        $sql = "INSERT INTO students (name, age, email, course) VALUES ('$name', '$age', '$email', '$course')";
        if ($conn->query($sql) === TRUE) {
            echo "New record created successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    } else {
        echo "All fields are required.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Student Management System</title>
</head>
<body>
    <h2>Add Student</h2>
    <form method="POST" action="index.php">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required><br><br>
        <label for="age">Age:</label>
        <input type="number" id="age" name="age" required><br><br>
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required><br><br>
        <label for="course">Course:</label>
        <input type="text" id="course" name="course" required><br><br>
        <input type="submit" value="Add Student">
    </form>
</body>
</html>
