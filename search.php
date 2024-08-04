<?php
include 'config.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $searchName = $_POST['search_name'] ?? '';
    if ($searchName) {
        $sql = "SELECT * FROM students WHERE name LIKE '%$searchName%'";
        $result = $conn->query($sql);
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Search Student</title>
</head>
<body>
    <h1>Search Student</h1>
    <form method="POST" action="search.php">
        <label>Name:</label>
        <input type="text" name="search_name" required>
        <input type="submit" value="Search">
    </form>
    <?php if (isset($result)): ?>
        <table border="1">
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Age</th>
                <th>Email</th>
                <th>Course</th>
            </tr>
            <?php
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>
                            <td>{$row['id']}</td>
                            <td>{$row['name']}</td>
                            <td>{$row['age']}</td>
                            <td>{$row['email']}</td>
                            <td>{$row['course']}</td>
                          </tr>";
                }
            } else {
                echo "<tr><td colspan='5'>No students found</td></tr>";
            }
            ?>
        </table>
    <?php endif; ?>
    <a href="students_list.php">Back to Student List</a>
</body>
</html>
<?php $conn->close(); ?>
