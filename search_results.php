<?php
include 'config.php';

$name = $_GET['name'];

// Fetch matching student data
$sql = "SELECT * FROM students WHERE name LIKE '%$name%'";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Search Results</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
    <header>
        <img src="images/logo.png" alt="Company Logo">
        <h1>Student Management System</h1>
        <nav>
            <a href="students_list.php">Home</a>
            <a href="add.php">Add Student</a>
            <a href="search.php">Search Student</a>
        </nav>
    </header>
    <main>
        <h2>Search Results</h2>
        <div class="table-container">
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Age</th>
                        <th>Email</th>
                        <th>Course</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if ($result->num_rows > 0) {
                        // Output data for each row
                        while($row = $result->fetch_assoc()) {
                            echo "<tr>
                                    <td>{$row['id']}</td>
                                    <td>{$row['name']}</td>
                                    <td>{$row['age']}</td>
                                    <td>{$row['email']}</td>
                                    <td>{$row['course']}</td>
                                  </tr>";
                        }
                    } else {
                        echo "<tr><td colspan='5'>No results found</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </main>
</body>
</html>

<?php
$conn->close();
?>
