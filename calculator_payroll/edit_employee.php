<?php
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
    
    $sql = "SELECT * FROM employee WHERE id = $id";
    $result = $conn->query($sql);
    $employee = $result->fetch_assoc();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $position = $_POST['position'];
    $basic_salary = $_POST['basic_salary'];
    $working_days = $_POST['working_days'];
    $overtime_hours = $_POST['overtime_hours'];

    $sql = "UPDATE employee SET name='$name', position='$position', basic_salary='$basic_salary', working_days='$working_days', overtime_hours='$overtime_hours' WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        header("Location: payroll_history.php");
    } else {
        echo "Error updating record: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Employee</title>
    <link rel="stylesheet" href="edit_employee.css">
</head>
<body>

<div class="container">
    <h1>Edit Employee</h1>

    <form method="POST">
        <label for="name">Name</label>
        <input type="text" id="name" name="name" value="<?php echo $employee['name']; ?>">

        <label for="position">Position</label>
        <input type="text" id="position" name="position" value="<?php echo $employee['position']; ?>">

        <label for="basic_salary">Basic Salary</label>
        <input type="text" id="basic_salary" name="basic_salary" value="<?php echo $employee['basic_salary']; ?>">

        <label for="working_days">Working Days</label>
        <input type="text" id="working_days" name="working_days" value="<?php echo $employee['working_days']; ?>">

        <label for="overtime_hours">Overtime Hours</label>
        <input type="text" id="overtime_hours" name="overtime_hours" value="<?php echo $employee['overtime_hours']; ?>">

        <button type="submit">Update</button>
        <a href="payroll_history.php" class="cancel-btn">Cancel</a>
    </form>
</div>

</body>
</html>

<?php
$conn->close();
?>
