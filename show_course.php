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

// Retrieve all courses from the database
$sql = "SELECT * FROM course";
$result = mysqli_query($db_link, $sql);

if (mysqli_num_rows($result) > 0) {
    // Display all courses in a table
    echo "<table>";
    echo "<tr><th>Course Code</th><th>Course Name</th><th>Credit</th></tr>";
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>" . $row["course_id"] . "</td>";
        echo "<td>" . $row["course_name"] . "</td>";
        echo "<td>" . $row["credit"] . "</td>";
        echo "</tr>";
    }
    echo "</table>";
    echo "<a href='main.html'>Return to Main Page</a>";
} else {
    echo "No courses found";
    echo "<a href='main.html'>Return to Main Page</a>";
}

mysqli_close($db_link);
?>