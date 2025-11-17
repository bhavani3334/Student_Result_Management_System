<?php
include('adminpage.php');
$conn = mysqli_connect("localhost", "root", "", "stud-result-mgmt-sys");
if (!$conn) die("Connection failed: " . mysqli_connect_error());
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Marks</title>
    <style>
        input[type=text], input[type=number], select {
            width: 100%; padding: 12px; margin: 8px 0;
            border: 1px solid #ccc; border-radius: 4px; box-sizing: border-box;
        }
        input[type=submit] {
            width: 25%; background-color: #4CAF50; color: white;
            padding: 14px; border-radius: 20px; margin-left: 40%;
        }
        .add {
            border-radius:5px; background-color:#f2f2f2;
            padding:20px; width:50%; margin:5% auto;
        }
        h3 { text-align:center; background-color:skyblue; padding:10px; border-radius:15px; }
        .error { background:#ffcc00; color:#0c0101; padding:10px; width:95%; text-align:center; border-radius:5px; margin:20px auto;}
    </style>
</head>
<body>
<div class="add">
    <h3>Insert Marks</h3>
    <form action="add_marks_action.php" method="POST">

        <label>Student Id</label>
        <input type="text" name="student_id" placeholder="Enter Student USN" required>

        <label>Student Name</label>
        <input type="text" name="student_name" placeholder="Enter Student Name" required>

        <label>Semester</label>
        <input type="text" name="sem_id" placeholder="Enter Semester" required>

        <?php for($i=1;$i<=6;$i++): ?>
            <label>Subject-<?php echo $i; ?> Marks</label>
            <input type="number" name="marks<?php echo $i; ?>" placeholder="Enter Marks">
        <?php endfor; ?>

        <input type="submit" name="submit" value="Submit">
        <?php if(isset($_GET['error'])): ?>
            <p class="error"><?php echo htmlspecialchars($_GET['error']); ?></p>
        <?php endif; ?>
    </form>
</div>
</body>
</html>
