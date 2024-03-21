<?php
// Retrieve form data
$student_id = $_POST['student_id'];
$course_id = $_POST['course_id'];
$result = $_POST['result'];

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

// Insert data into the database
$sql = "INSERT INTO edata (student_id, course_id, result) VALUES ('$student_id', '$course_id', '$result')";

if (mysqli_query($db_link, $sql)) {
    echo "Course selection added successfully!";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($db_link);
}

mysqli_close($db_link);
?>