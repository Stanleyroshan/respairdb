<?php
include 'config.php';

$student_id = $_GET['student_id'];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $age = $_POST['age'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $law_college = $_POST['law_college'];
    $semester = $_POST['semester'];

    $stmt = $conn->prepare("UPDATE students SET name=?, age=?, email=?, phone=?, address=?, law_college=?, semester=? WHERE student_id=?");
    $stmt->bind_param("sissssss", $name, $age, $email, $phone, $address, $law_college, $semester, $student_id);
    $stmt->execute();
    $stmt->close();

    header("Location: students_list.php");
    exit();
}

$result = $conn->query("SELECT * FROM students WHERE student_id='$student_id'");
$student = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Student</title>
    <link rel="stylesheet" type="text/css" href="css/edit.css">
</head>
<body>
    <div class="container">
        <h1>Edit Student</h1>
        <form method="post" action="edit.php?student_id=<?php echo $student_id; ?>">
            <label for="student_id">Student ID:</label>
            <input type="text" id="student_id" name="student_id" value="<?php echo $student['student_id']; ?>" readonly>

            <label for="name">Name:</label>
            <input type="text" id="name" name="name" value="<?php echo $student['name']; ?>" required>

            <label for="age">Age:</label>
            <input type="number" id="age" name="age" value="<?php echo $student['age']; ?>" required>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" value="<?php echo $student['email']; ?>" required>

            <label for="phone">Phone:</label>
            <input type="text" id="phone" name="phone" value="<?php echo $student['phone']; ?>" required>

            <label for="address">Address:</label>
            <textarea id="address" name="address" required><?php echo $student['address']; ?></textarea>

            <label for="law_college">Law College:</label>
            <input type="text" id="law_college" name="law_college" value="<?php echo $student['law_college']; ?>" required>

            <label for="semester">Semester:</label>
            <select id="semester" name="semester" required>
                <?php for ($i = 1; $i <= 10; $i++) : ?>
                    <option value="<?php echo $i; ?>" <?php if ($i == $student['semester']) echo 'selected'; ?>><?php echo $i; ?></option>
                <?php endfor; ?>
            </select>

            <button type="submit">Update Student</button>
        </form>
    </div>
</body>
</html>
