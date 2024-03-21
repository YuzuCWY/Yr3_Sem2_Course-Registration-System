<?php
$db_host = "localhost";
$db_id = "user";
$db_pw = "user106118";
$db_name = "ai2";
$db_port = 3307;
$db_link = @mysqli_connect($db_host, $db_id, $db_pw, $db_name, $db_port);
if (!$db_link) {
    die("連線失敗!");
}
mysqli_query($db_link, "SET NAMES 'UTF8'");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $departmentId = $_POST["departmentId"];

    // Query the department by ID
    $query_department_sql = "SELECT * FROM dept WHERE dept_id = '$departmentId'";
    $result = mysqli_query($db_link, $query_department_sql);

    if (mysqli_num_rows($result) > 0) {
        echo "<h2>Query Results:</h2>";
        echo "<table>";
        echo "<tr><th>Department ID</th><th>Department Name</th><th>Department Chair</th></tr>";

        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>" . $row['dept_id'] . "</td>";
            echo "<td>" . $row['dept_name'] . "</td>";
            echo "<td>" . $row['dept_man'] . "</td>";
            echo "</tr>";
        }

        echo "</table>";
        echo "<a href='main.html'>Return to Main Page</a>";
    } else {
        echo "No department found with the given ID.";
        echo "<a href='main.html'>Return to Main Page</a>";
    }
}

mysqli_close($db_link);
?>