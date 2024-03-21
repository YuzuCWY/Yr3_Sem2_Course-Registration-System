<?php
// Retrieve the department code, name, and chair from the form submission
$code = $_POST['code'];
$name = $_POST['name'];
$chair = $_POST['chair'];

// Connect to the ai2.dept database
$servername = "localhost";
$username = "user";
$password = "user106118";
$dbname = "ai2";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Perform the INSERT command to add the department
$sql = "INSERT INTO dept (dept_id, dept_name, dept_man) VALUES ('$code', '$name', '$chair')";

if ($conn->query($sql) === TRUE) {
    echo "Department added successfully!";
} else {
    echo "Error adding department: " . $conn->error;
}

$conn->close();
?>