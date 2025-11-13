<?php
include('adminpage.php');

// Connect to database
$con = mysqli_connect("localhost", "root", "", "stud-result-mgmt-sys");
if ($con === false) {
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

// Delete functionality
if (isset($_GET['del'])) {
    $id = intval($_GET['del']);
    mysqli_query($con, "DELETE FROM marks_srms WHERE id=$id");
    $_SESSION['message'] = "Marks deleted!";
    header('location: display_marks.php');
    exit();
}

// Fetch all marks
$sql = "SELECT * FROM marks_srms ORDER BY id DESC";
$result = mysqli_query($con, $sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Marks Details</title>
    <style>
        table {
            margin: 0 auto;
            font-size: large;
            border: 1px solid #FF0000;
            background-color: #ffff66;
            margin-left: 25%;
        }

        .tablehead {
            text-align: center;
            font-size: xx-large;
            font-family: 'Gill Sans', 'Gill Sans MT', 'Calibri', 'Trebuchet MS', 'sans-serif';
        }

        td {
            background-color: #E4F5D4;
            border: 1px solid #FF0000;
        }

        th, td {
            font-weight: bold;
            border: 1px solid #FF0000;
            padding: 10px;
            text-align: center;
        }

        td {
            font-weight: lighter;
        }
    </style>
</head>
<body>
    <section>
        <h1 class="tablehead">Marks Details</h1>
        <table>
            <tr>
                <th>Sem</th>
                <th>Student Name</th>
                <th>Sub1</th>
                <th>Sub2</th>
                <th>Sub3</th>
                <th>Sub4</th>
                <th>Sub5</th>
                <th>Sub6</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
            <?php while ($row = $result->fetch_assoc()) { ?>
                <tr>
                    <td><?php echo htmlspecialchars($row['sem_id']); ?></td>
                    <td><?php echo htmlspecialchars($row['student_name']); ?></td>
                    <td><?php echo $row['marks1']; ?></td>
                    <td><?php echo $row['marks2']; ?></td>
                    <td><?php echo $row['marks3']; ?></td>
                    <td><?php echo $row['marks4']; ?></td>
                    <td><?php echo $row['marks5']; ?></td>
                    <td><?php echo $row['marks6']; ?></td>
                    <td>
                        <a href="update_marks.php?id=<?php echo $row['id']; ?>&sname=<?php echo urlencode($row['student_name']); ?>&semid=<?php echo urlencode($row['sem_id']); ?>&m1=<?php echo $row['marks1']; ?>&m2=<?php echo $row['marks2']; ?>&m3=<?php echo $row['marks3']; ?>&m4=<?php echo $row['marks4']; ?>&m5=<?php echo $row['marks5']; ?>&m6=<?php echo $row['marks6']; ?>">Edit</a>
                    </td>
                    <td>
                        <a href="display_marks.php?del=<?php echo $row['id']; ?>" onclick="return confirm('Are you sure you want to delete this record?');">Delete</a>
                    </td>
                </tr>
            <?php } ?>
        </table>
    </section>
</body>
</html>
