<?php
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

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $student_id = $_POST["student_id"];
    $new_student_id = $_POST["new_student_id"];
    $new_student_name = $_POST["new_student_name"];
    $new_dept_id = $_POST["new_dept_id"];
    
    // Check if new_dept_id exists in dept table
    $checkQuery = "SELECT * FROM dept WHERE dept_id='$new_dept_id'";
    $checkResult = mysqli_query($db_link, $checkQuery);
    if (mysqli_num_rows($checkResult) > 0) {
        // Check if student already exists
        $checkQuery = "SELECT * FROM student WHERE std_id='$student_id'";
        $checkResult = mysqli_query($db_link, $checkQuery);
        if (mysqli_num_rows($checkResult) > 0) {
            // Update student information
            $updateQuery = "UPDATE student SET std_id = '$new_student_id', name='$new_student_name', dept_id='$new_dept_id' WHERE std_id='$student_id'";
            if (mysqli_query($db_link, $updateQuery)) {
                echo "Student information updated successfully";
                echo "<a href='main.html'>Return to Main Page</a>";
            } else {
                echo "Error updating student information: " . mysqli_error($db_link);
                echo "<a href='main.html'>Return to Main Page</a>";
            }
        } else {
            echo "Student does not exist";
            echo "<a href='main.html'>Return to Main Page</a>";
        }
    } else {
        echo "Department not found";
        echo "<a href='main.html'>Return to Main Page</a>";
    }
}

mysqli_close($db_link);
?>