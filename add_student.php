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
    $student_name = $_POST["student_name"];
    $dept_id = $_POST["dept_id"];
    
    // Check if dept_id exists in dept table
    $checkQuery = "SELECT * FROM dept WHERE dept_id='$dept_id'";
    $checkResult = mysqli_query($db_link, $checkQuery);
    if (mysqli_num_rows($checkResult) > 0) {
        // Check if student already exists
        $checkQuery = "SELECT * FROM student WHERE std_id='$student_id'";
        $checkResult = mysqli_query($db_link, $checkQuery);
        if (mysqli_num_rows($checkResult) > 0) {
            echo "Student already enrolled";
            echo "<a href='main.html'>Return to Main Page</a>";
        } else {
            // Add student to the database
            $sql = "INSERT INTO student (std_id, name, dept_id) VALUES ('$student_id', '$student_name', '$dept_id')";
            if (mysqli_query($db_link, $sql)) {
                echo "Student added successfully";
                echo "<a href='main.html'>Return to Main Page</a>";
            } else {
                echo "Error adding student: " . mysqli_error($db_link);
                echo "<a href='main.html'>Return to Main Page</a>";
            }
        }
    } else {
        echo "dept_id wrong, please re-enter";
        echo "<a href='main.html'>Return to Main Page</a>";
    }
}

mysqli_close($db_link);
?><?php
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
    $student_name = $_POST["student_name"];
    $dept_id = $_POST["dept_id"];
    
    // Check if dept_id exists in dept table
    $checkQuery = "SELECT * FROM dept WHERE dept_id='$dept_id'";
    $checkResult = mysqli_query($db_link, $checkQuery);
    if (mysqli_num_rows($checkResult) > 0) {
        // Check if student already exists
        $checkQuery = "SELECT * FROM student WHERE std_id='$student_id'";
        $checkResult = mysqli_query($db_link, $checkQuery);
        if (mysqli_num_rows($checkResult) > 0) {
            echo "Student already enrolled";
            echo "<a href='main.html'>Return to Main Page</a>";
        } else {
            // Add student to the database
            $sql = "INSERT INTO student (std_id, name, dept_id) VALUES ('$student_id', '$student_name', '$dept_id')";
            if (mysqli_query($db_link, $sql)) {
                echo "Student added successfully";
                echo "<a href='main.html'>Return to Main Page</a>";
            } else {
                echo "Error adding student: " . mysqli_error($db_link);
                echo "<a href='main.html'>Return to Main Page</a>";
            }
        }
    } else {
        echo "Inputted department ID not found, please re-enter";
        echo "<a href='main.html'>Return to Main Page</a>";
    }
}

mysqli_close($db_link);
?>