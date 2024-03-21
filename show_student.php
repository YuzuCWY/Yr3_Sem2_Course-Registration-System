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

// Retrieve student information
$studentQuery = "SELECT * FROM student";
$studentResult = mysqli_query($db_link, $studentQuery);

// Check if there are students in the database
if (mysqli_num_rows($studentResult) > 0) {
    // Display student information
    echo "<table>";
    echo "<tr><th>Student ID</th><th>Name</th><th>Department ID</th></tr>";
    while ($studentData = mysqli_fetch_assoc($studentResult)) {
        $studentId = $studentData["std_id"];
        $studentName = $studentData["name"];
        $deptId = $studentData["dept_id"];
        echo "<tr><td>$studentId</td><td>$studentName</td><td>$deptId</td></tr>";
    }
    echo "</table>";
    echo "<a href='main.html'>Return to Main Page</a>";
} else {
    echo "No students found";
    echo "<a href='main.html'>Return to Main Page</a>";
}

mysqli_close($db_link);
?>