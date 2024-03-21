<?php
// Retrieve form data
$student_id = $_POST['student_id'];
$course_id = $_POST['course_id'];

// Database connection
$db_host = "localhost";
$db_id = "user";
$db_pw = "user106118";
$db_name = "ai2";
$db_port = 3307;
$db_link = @mysqli_connect($db_host, $db_id, $db_pw, $db_name, $db_port);

if (!$db_link) {
    die("Connection failed: " . mysqli_connect_error());
}
mysqli_query($db_link, "SET NAMES 'UTF8'");

// Delete data from the database
$sql = "DELETE FROM edata WHERE student_id='$student_id' AND course_id='$course_id'";

if (mysqli_query($db_link, $sql)) {
    echo "Course selection dropped successfully!";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($db_link);
}

mysqli_close($db_link);
?>