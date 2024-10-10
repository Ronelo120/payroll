<?php
// Connect to database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "payroll_db";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


if (isset($_GET['id'])) {
    $id = $_GET['id'];
    
    $sql = "DELETE FROM employee WHERE id = $id";

    if ($conn->query($sql) === TRUE) {
        header("Location: payroll_history.php");
    } else {
        echo "Error deleting record: " . $conn->error;
    }
}

$conn->close();
?>
