<?php
include('adminpage.php'); // Include your admin panel header

// Connect to the database
$con = mysqli_connect("localhost", "root", "", "stud-result-mgmt-sys");
if ($con === false) {
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

// Fetch Department Codes
include_once 'data_controller.php';
$data = new DataController();
$deptcode = $data->getdeptcode();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add Student</title>
    <style>
        input[type=text], input[type=date], select {
            width: 100%;
            padding: 12px 20px;
            margin: 8px 0;
            display: inline-block;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        input[type=submit] {
            width: 25%;
            background-color: #4CAF50;
            color: white;
            padding: 14px 20px;
            margin: 8px 0;
            border-radius: 20px;
            margin-left: 40%;
            cursor: pointer;
        }

        .add {
            border-radius: 5px;
            background-color: #f2f2f2;
            padding: 20px;
            width: 50%;
            margin: 5% auto;
        }

        h3 {
            text-align: center;
            background-color: skyblue;
            padding: 10px;
            border-radius: 15px;
        }

        .error {
            background: #ffcc00;
            color: #0c0101;
            padding: 10px;
            width: 95%;
            text-align: center;
            border-radius: 5px;
            margin: 20px auto;
        }
    </style>
</head>
<body>
    <div class="add">
        <h3>Insert Student</h3>
        <form action="add_std_action.php" method="POST">
            <label for="student_name">Student Name</label>
            <input type="text" id="student_name" name="student_name" placeholder="Enter student name" required>

            <label for="student_usn">Student USN</label>
            <input type="text" id="student_usn" name="student_usn" placeholder="Enter student USN" required>

            <label for="class_id">Department Code</label>
            <select name="class_id" id="class_id" required>
                <option selected disabled>Select Department Code</option>
                <?php foreach ($deptcode as $language) : ?>
                    <option value="<?php echo $language['class_id']; ?>"><?php echo $language['class_code']; ?></option>
                <?php endforeach; ?>
            </select>

            <label for="sem_id">Semester</label>
            <input type="text" name="sem_id" id="sem_id" placeholder="Enter Semester" required>

            <label for="student_email">Student Email ID</label>
            <input type="text" id="student_email" name="student_email" placeholder="Enter student Email ID" required>

            <label for="student_gender">Student Gender</label>
            <input type="text" id="student_gender" name="student_gender" placeholder="Enter student gender" required>

            <label for="student_dob">Student DOB</label>
            <input type="date" id="student_dob" name="student_dob" required>

            <input type="submit" value="Submit" name="submit">
        </form>
    </div>
</body>
</html>
