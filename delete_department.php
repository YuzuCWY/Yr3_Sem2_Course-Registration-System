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

// Retrieve the department ID to delete
$departmentId = $_POST['departmentId'];

$update_department_sql = "DELETE FROM dept WHERE dept_id = '$departmentId'";
$result = mysqli_query($db_link, $update_department_sql);

if ($result) {
    echo "Department deleted successfully.";
    echo "<a href='main.html'>Return to Main Page</a>";
} else {
    echo "Failed to delete department.";
    echo "<a href='main.html'>Return to Main Page</a>";
}

mysqli_close($db_link);
?>


