<?php
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $age = $_POST['age'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $law_college = $_POST['law_college'];
    $semester = $_POST['semester'];
    $student_id = generateStudentID($conn);

    $sql = "INSERT INTO students (name, age, email, phone, address, law_college, semester, student_id)
            VALUES ('$name', $age, '$email', '$phone', '$address', '$law_college', $semester, '$student_id')";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
    header("Location: index.php");
    exit();
}
?>
