<?php
include 'config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $student_id = $_POST['student_id'];
    $name = $_POST['name'];
    $age = $_POST['age'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $law_college = $_POST['law_college'];
    $semester = $_POST['semester'];

    $stmt = $conn->prepare("INSERT INTO students (student_id, name, age, email, phone, address, law_college, semester) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssisssss", $student_id, $name, $age, $email, $phone, $address, $law_college, $semester);
    $stmt->execute();
    $stmt->close();

    header("Location: students_list.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Student</title>
    <link rel="stylesheet" type="text/css" href="css/add.css">
</head>
<body>
    <div class="container">
        <h1>Add Student</h1>
        <form method="post" action="add.php">
            <label for="student_id">Student ID:</label>
            <input type="text" id="student_id" name="student_id" required>

            <label for="name">Name:</label>
            <input type="text" id="name" name="name" required>

            <label for="age">Age:</label>
            <input type="number" id="age" name="age" required>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>

            <label for="phone">Phone:</label>
            <input type="text" id="phone" name="phone" required>

            <label for="address">Address:</label>
            <textarea id="address" name="address" required></textarea>

            <label for="law_college">Law College:</label>
            <input type="text" id="law_college" name="law_college" required>

            <label for="semester">Semester:</label>
            <select id="semester" name="semester" required>
                <?php for ($i = 1; $i <= 10; $i++) : ?>
                    <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                <?php endfor; ?>
            </select>

            <button type="submit">Add Student</button>
        </form>
    </div>
</body>
</html>
