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

// Retrieve the department ID, new code, new name, and new chair from the form submission
$departmentId = $_POST['departmentId'];
$newCode = $_POST['newCode'];
$newName = $_POST['newName'];
$newChair = $_POST['newChair'];

$select_department_sql = "SELECT * FROM dept WHERE dept_id = '$departmentId'";
$result = mysqli_query($db_link, $select_department_sql);

if (mysqli_num_rows($result) > 0) {
    $update_department_sql = "UPDATE dept SET dept_id = '$newCode', dept_name = '$newName', dept_man = '$newChair' WHERE dept_id = '$departmentId'";
    $update_result = mysqli_query($db_link, $update_department_sql);

    if ($update_result) {
        echo "Department modified successfully.";
        echo "<br>";
        echo "<a href='main.html'>Return to Main Page</a>";
    } else {
        echo "Failed to modify department.";
        echo "<br>";
        echo "<a href='main.html'>Return to Main Page</a>";
    }
} else {
    echo "No record found.";
    echo "<br>";
    echo "<a href='main.html'>Return to Main Page</a>";
}

mysqli_close($db_link);
?>