<!DOCTYPE html>
<html>
<head>
    <title>Show Departments</title>
</head>
<body>
    <h1>All Departments</h1>

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

    $select_departments_sql = "SELECT * FROM dept";
    $result = mysqli_query($db_link, $select_departments_sql);

    if (mysqli_num_rows($result) > 0) {
        echo "<table>";
        echo "<tr><th>Department ID</th><th>Department Name</th></tr>";

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
        echo "No departments found.";
        echo "<a href='main.html'>Return to Main Page</a>";
    }

    mysqli_close($db_link);
    ?>

    <a href="department.html">Go Back</a>
</body>
</html>