<?php
// Database connection
$conn = mysqli_connect("localhost", "root", "", "stud-result-mgmt-sys");
if (!$conn) die("Connection failed: " . mysqli_connect_error());

// Collect POST data
$student_name = isset($_POST['student_name']) ? trim($_POST['student_name']) : '';
$sem_id = isset($_POST['sem_id']) ? trim($_POST['sem_id']) : '';

// Collect marks 1-6
$marks = [];
for ($i = 1; $i <= 6; $i++) {
    $marks[$i] = isset($_POST['marks'.$i]) ? intval($_POST['marks'.$i]) : 0;
}

// Validate required fields
if (empty($student_name) || empty($sem_id)) {
    header("Location: add_marks.php?error=Student name and semester are required");
    exit;
}

// Prepare INSERT query
$sql = "INSERT INTO marks_srms 
(student_id, student_name, sem_id, marks1, marks2, marks3, marks4, marks5, marks6) 
VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
$stmt = $conn->prepare($sql);

if (!$stmt) {
    die("Prepare failed: (" . $conn->errno . ") " . $conn->error);
}

// Bind parameters
$stmt->bind_param(
    "siiiiiiii",
    $student_name,   //string
    $sem_id,       // int
    $student_id,         //int
    $marks[1],
    $marks[2],
    $marks[3],
    $marks[4],
    $marks[5],
    $marks[6]
);

// Execute
if ($stmt->execute()) {
    header("Location: add_marks.php?error=Marks inserted successfully");
} else {
    header("Location: add_marks.php?error=Failed to insert marks");
}

$stmt->close();
$conn->close();
