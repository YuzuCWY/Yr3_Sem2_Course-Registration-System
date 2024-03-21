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
    $code = $_POST["course_id"];
    
    // Check if course exists
    $checkQuery = "SELECT * FROM course WHERE course_id='$code'";
    $checkResult = mysqli_query($db_link, $checkQuery);
    if (mysqli_num_rows($checkResult) > 0) {
        // Delete course from the database
        $sql = "DELETE FROM course WHERE course_id='$code'";
        if (mysqli_query($db_link, $sql)) {
            echo "Course deleted successfully";
            echo "<a href='main.html'>Return to Main Page</a>";
        } else {
            echo "Error deleting course: " . mysqli_error($db_link);
            echo "<a href='main.html'>Return to Main Page</a>";
        }
    } else {
        echo "Course not found";
        echo "<a href='main.html'>Return to Main Page</a>";
    }
}

mysqli_close($db_link);
?>