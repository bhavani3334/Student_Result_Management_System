<?php
include_once('admin/db_conn.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve student_id and sem_id from POST request
    $student_id = trim($_POST['student_id']);
    $sem_id = trim($_POST['sem_id']);

    // Fetch student details by student_id
    $stmt = $conn->prepare("SELECT * FROM student_srms WHERE student_id = ?");
    $stmt->execute([$student_id]);
    $student = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($student) {
        echo "<h2 style='text-align:center;'>Result for {$student['student_name']}</h2>";
        echo "<p style='text-align:center;'>Student ID: {$student['student_id']}</p>";

        // Fetch marks for the student and semester
        $stmt_marks = $conn->prepare("SELECT * FROM marks_srms WHERE student_id = ? AND sem_id = ?");
        $stmt_marks->execute([$student_id, $sem_id]);
        $marks = $stmt_marks->fetch(PDO::FETCH_ASSOC);

        if ($marks) {
            echo "<table border='1' cellpadding='10' style='margin:20px auto; border-collapse: collapse; text-align:center;'>";
            echo "<tr style='background-color:#f2f2f2;'>
                    <th>Subject 1</th>
                    <th>Subject 2</th>
                    <th>Subject 3</th>
                    <th>Subject 4</th>
                    <th>Subject 5</th>
                    <th>Subject 6</th>
                  </tr>";
            echo "<tr>
                    <td>{$marks['marks1']}</td>
                    <td>{$marks['marks2']}</td>
                    <td>{$marks['marks3']}</td>
                    <td>{$marks['marks4']}</td>
                    <td>{$marks['marks5']}</td>
                    <td>{$marks['marks6']}</td>
                  </tr>";
            echo "</table>";
        } else {
            echo "<p style='text-align:center; color:red;'>Marks not available yet for this semester.</p>";
        }
    } else {
        echo "<p style='text-align:center; color:red;'>Student ID not found.</p>";
    }
}
?>