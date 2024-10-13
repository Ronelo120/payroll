<?php
include 'database.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $position = $_POST['position'];
    $basic_salary = $_POST['basic_salary'];
    $working_days = $_POST['working_days'];
    $overtime_hours = $_POST['overtime_hours'];
    $sss = $_POST['sss'];
    $philhealth = $_POST['philhealth'];
    $pagibig = $_POST['pagibig'];
    $tax = $_POST['tax'];

    // Calculations
    $daily_rate = $basic_salary / 22;
    $gross_pay = $daily_rate * $working_days + ($overtime_hours * $daily_rate / 8);
    $deductions = $sss + $philhealth + $pagibig + $tax;
    $net_pay = $gross_pay - $deductions;

    header("Location: payslip.php?name=$name&position=$position&basic_salary=$basic_salary&working_days=$working_days&overtime_hours=$overtime_hours&gross_pay=$gross_pay&deductions=$deductions&net_pay=$net_pay");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="calculate_payroll.css">
    <title>Calculate Payroll</title>
</head>
<body>
    <div class="container">
        <h1>Calculate Payroll</h1>
        <form method="post">
            Name: <input type="text" name="name" required><br>
            Position: <input type="text" name="position" required><br>
            Basic Salary: <input type="number" name="basic_salary" step="0.01" required><br>
            Working Days: <input type="number" name="working_days" required><br>
            Overtime Hours: <input type="number" name="overtime_hours" step="0.01"><br>
            SSS: <input type="number" name="sss" step="0.01" required><br>
            PhilHealth: <input type="number" name="philhealth" step="0.01" required><br>
            Pag-IBIG: <input type="number" name="pagibig" step="0.01" required><br>
            Tax: <input type="number" name="tax" step="0.01" required><br>
            <button type="submit">Calculate Payroll</button>
        </form>
        <a href="index.php">Back to Home</a>
    </div>
</body>
</html>
