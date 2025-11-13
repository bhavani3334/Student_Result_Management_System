<?php
include('adminpage.php');

// Connect to the correct database
$conn = mysqli_connect("localhost", "root", "", "stud-result-mgmt-sys");
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

error_reporting(0);

// Fetch data from URL to pre-fill the form
$sid = $_GET['sid'] ?? '';
$id = $_GET['id'] ?? '';
$cid = $_GET['cid'] ?? '';
$dc = $_GET['dc'] ?? '';
$sname = $_GET['sname'] ?? '';
$semid = $_GET['semid'] ?? '';
$m1 = $_GET['m1'] ?? '';
$m2 = $_GET['m2'] ?? '';
$m3 = $_GET['m3'] ?? '';
$m4 = $_GET['m4'] ?? '';
$m5 = $_GET['m5'] ?? '';
$m6 = $_GET['m6'] ?? '';
?>

<!DOCTYPE html>
<html>
<head>
    <title>Update Marks</title>
    <style>
        input[type=text], input[type=number], select { width: 100%; padding: 12px; margin: 8px 0; border: 1px solid #ccc; border-radius: 4px; box-sizing: border-box;}
        input[type=submit]{ width: 25%; background-color: #4CAF50; color: white; padding: 14px; border-radius: 20px; margin-left: 40%; }
        .add{ border-radius:5px; background-color:#f2f2f2; padding:20px; width:50%; margin:5% auto; }
        h3{ text-align:center; background-color:skyblue; padding:10px; border-radius:15px; }
    </style>
</head>
<body>
<div class="add">
    <h3>Update Marks</h3>
    <form action="" method="POST">
        <input type="hidden" name="marks_id" value="<?php echo $id; ?>">
        <label>Department Code</label>
        <input type="text" name="class_id" value="<?php echo $dc; ?>" readonly>

        <label>Semester</label>
        <input type="text" name="sem_id" value="<?php echo $semid; ?>" readonly>

        <label>Student Name</label>
        <input type="text" name="student_name" value="<?php echo $sname; ?>" readonly>

        <?php for($i=1;$i<=6;$i++): ?>
            <label>Subject-<?php echo $i; ?> Marks</label>
            <input type="number" name="marks<?php echo $i; ?>" value="<?php echo ${'m'.$i}; ?>">
        <?php endfor; ?>

        <input type="submit" name="submit" value="Update">
    </form>
</div>

<?php
// Handle form submission
if(isset($_POST['submit'])){
    $mid = $_POST['marks_id'];
    $marks = [];
    for($i=1;$i<=6;$i++){
        $marks[$i] = $_POST['marks'.$i] ?? 0;
    }

    // Use prepared statement to update safely
    $stmt = $conn->prepare("UPDATE marks_srms SET marks1=?, marks2=?, marks3=?, marks4=?, marks5=?, marks6=? WHERE id=?");
    $stmt->bind_param("iiiiiii", $marks[1], $marks[2], $marks[3], $marks[4], $marks[5], $marks[6], $mid);

    if($stmt->execute()){
        echo "<script>alert('Record Updated Successfully');</script>";
        echo "<meta http-equiv='refresh' content='0; URL=display_marks.php'>";
    } else {
        echo "<script>alert('Failed to Update');</script>";
        echo "<meta http-equiv='refresh' content='0; URL=display_marks.php'>";
    }

    $stmt->close();
    $conn->close();
}
?>
</body>
</html>
