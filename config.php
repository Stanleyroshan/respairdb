<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "respair";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

function generateStudentID($conn) {
    $result = $conn->query("SELECT student_id FROM students ORDER BY id DESC LIMIT 1");
    if ($result->num_rows > 0) {
        $lastID = $result->fetch_assoc()['student_id'];
        $num = (int)substr($lastID, 2) + 1;
        return 'RA' . str_pad($num, 7, '0', STR_PAD_LEFT);
    } else {
        return 'RA2024001';
    }
}

function isAdmin() {
    return isset($_SESSION['role']) && $_SESSION['role'] === 'admin';
}

function isAdmissions() {
    return isset($_SESSION['role']) && $_SESSION['role'] === 'admissions';
}
?>
