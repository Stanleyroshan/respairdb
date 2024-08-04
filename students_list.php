<?php
include 'config.php';
?>
<!DOCTYPE html>
<html>
<head>
    <title>Student List</title>
    <link rel="stylesheet" type="text/css" href="css/students_list.css">
</head>
<body>
    <div class="container">
        <div class="navbar">
            <h1>Student List</h1>
            <div>
                <a href="logout.php">Logout</a>
                <?php if (isAdmin()) : ?>
                    <a href="add.php">Add Student</a>
                <?php endif; ?>
                <a href="search.php">Search Student</a>
            </div>
        </div>
        <div class="table-container">
            <table>
                <thead>
                    <tr>
                        <th>Student ID</th>
                        <th>Name</th>
                        <th>Age</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Address</th>
                        <th>Law College</th>
                        <th>Semester</th>
                        <?php if (isAdmin()) : ?>
                            <th>Actions</th>
                        <?php endif; ?>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $result = $conn->query("SELECT * FROM students");
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>
                                    <td>{$row['student_id']}</td>
                                    <td>{$row['name']}</td>
                                    <td>{$row['age']}</td>
                                    <td>{$row['email']}</td>
                                    <td>{$row['phone']}</td>
                                    <td>{$row['address']}</td>
                                    <td>{$row['law_college']}</td>
                                    <td>{$row['semester']}</td>";
                            if (isAdmin()) {
                                echo "<td>
                                        <a href='edit.php?student_id={$row['student_id']}'>Edit</a> | 
                                        <a href='delete.php?student_id={$row['student_id']}' onclick='return confirm(\"Are you sure?\")'>Delete</a>
                                    </td>";
                            }
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='9'>No students found</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>
<?php
$conn->close();
?>
