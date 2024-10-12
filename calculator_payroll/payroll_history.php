<!-- payroll_history.php -->

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

$query = "SELECT name, position, basic_salary, working_days, overtime_hours, sss, philhealth, pagibig, tax, gross_pay, net_pay, created_at FROM employee";

// Check if the search query is set
$search_query = "";
if (isset($_GET['search'])) {
    $search_query = $_GET['search'];
    $sql = "SELECT * FROM employee WHERE name LIKE '%$search_query%' OR position LIKE '%$search_query%'";
} else {
    $sql = "SELECT * FROM employee";
}

$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payroll History</title>
    <link rel="stylesheet" href="payroll_history.css">
</head>
<body>

<div class="container">
    <h1>Payroll History</h1>

    <!-- Search form -->
    <form method="GET" action="payroll_history.php" class="search-form">
        <input type="text" name="search" placeholder="Search by Name or Position" value="<?php echo htmlspecialchars($search_query); ?>">
        <button type="submit">Search</button>
    </form>

    <div class="table-container">
    <table>
        <thead>
            <tr>
                <th>Name</th>
                <th>Position</th>
                <th>Basic Salary</th>
                <th>Working Days</th>
                <th>Overtime Hours</th>
                <th>SSS</th>
                <th>PhilHealth</th>
                <th>PAG-IBIG</th>
                <th>Tax</th>
                <th>Gross Pay</th>
                <th>Net Pay</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row['name'] . "</td>";
                    echo "<td>" . $row['position'] . "</td>";
                    echo "<td>" . $row['basic_salary'] . "</td>";
                    echo "<td>" . $row['working_days'] . "</td>";
                    echo "<td>" . $row['overtime_hours'] . "</td>";
                    echo "<td>" . $row['sss'] . "</td>";
                    echo "<td>" . $row['philhealth'] . "</td>";
                    echo "<td>" . $row['pagibig'] . "</td>";
                    echo "<td>" . $row['tax'] . "</td>";
                    echo "<td>" . $row['gross_pay'] . "</td>";
                    echo "<td>" . $row['net_pay'] . "</td>";
                    echo "<td><a href='edit_employee.php?id=" . $row['id'] . "'>Edit</a> | <a href='delete_employee.php?id=" . $row['id'] . "' onclick='return confirm(\"Are you sure you want to delete this record?\")'>Delete</a></td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='13'>No results found</td></tr>";
            }
            ?>
        </tbody>
    </table>
    </div>
</div>
<div class="last_button">
    <a href="index.php">Back to Payroll Calculator</a>
</div>

</body>
</html>

<?php
$conn->close();
?>
