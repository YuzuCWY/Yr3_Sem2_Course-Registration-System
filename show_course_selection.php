<?php
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

// Fetch all records from the database
$sql = "SELECT * FROM edata";
$result = mysqli_query($db_link, $sql);

if (mysqli_num_rows($result) > 0) {
    echo "<table>
            <tr>
                <th>Student ID</th>
                <th>Course ID</th>
                <th>Result</th>
            </tr>";
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>
                <td>".$row['student_id']."</td>
                <td>".$row['course_id']."</td>
                <td>".$row['result']."</td>
            </tr>";
    }
    echo "</table>";
} else {
    echo "No course selections found.";
}

mysqli_close($db_link);
?>