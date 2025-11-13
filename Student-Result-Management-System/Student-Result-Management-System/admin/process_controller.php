<?php
require_once 'data_controller.php';
$data = new DataController();

// Fetch semesters for a department
if (isset($_POST['classId'])) {
    $classId = $_POST['classId'];
    $semesters = $data->semListingByClass($classId); // function should return semesters for this department
    echo json_encode($semesters);
    exit;
}

// Fetch students for a semester
if (isset($_POST['semIdForStudents'])) {
    $semId = $_POST['semIdForStudents'];
    $students = $data->studentListing($semId); // function should return students for this semester
    echo json_<?php
require_once 'data_controller.php';
$data = new DataController();

// Fetch semesters for a department
if (isset($_POST['classId'])) {
    $classId = $_POST['classId'];
    $semesters = $data->semListingByClass($classId); // function should return semesters for this department
    echo json_encode($semesters);
    exit;
}

// Fetch students for a semester
if (isset($_POST['semIdForStudents'])) {
    $semId = $_POST['semIdForStudents'];
    $students = $data->studentListing($semId); // function should return students for this semester
    echo json_encode($students);
    exit;
}
encode($students);
    exit;
}
