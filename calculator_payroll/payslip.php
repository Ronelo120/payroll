<?php
$name = $_GET['name'];
$position = $_GET['position'];
$basic_salary = $_GET['basic_salary'];
$working_days = $_GET['working_days'];
$overtime_hours = $_GET['overtime_hours'];
$gross_pay = $_GET['gross_pay'];
$deductions = $_GET['deductions'];
$net_pay = $_GET['net_pay'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="payslip.css">
    <title>Payslip</title>
</head>
<body>
    <div class="container">
        <div id="content">    
            <h1>Employee Information</h1>
            <p><strong>Name:</strong> <?php echo $name; ?></p>
            <p><strong>Position:</strong> <?php echo $position; ?></p>
            <p><strong>Basic Salary:</strong> ₱<?php echo number_format($basic_salary, 2); ?></p>
            <p><strong>Working Days:</strong> <?php echo $working_days; ?></p>
            <p><strong>Overtime Hours:</strong> <?php echo $overtime_hours; ?></p>
        </div>
        
        <div id="content">
            <h1>Payslip Details</h1>
            <p><strong>Gross Pay:</strong> ₱<?php echo number_format($gross_pay, 2); ?></p>
            <p><strong>Deductions:</strong> ₱<?php echo number_format($deductions, 2); ?></p>
            <p><strong>Net Pay:</strong> ₱<?php echo number_format($net_pay, 2); ?></p>
        </div>

        <!-- Form to save data to history -->
        <form action="save_to_history.php" method="post">
            <input type="hidden" name="name" value="<?php echo $name; ?>">
            <input type="hidden" name="position" value="<?php echo $position; ?>">
            <input type="hidden" name="basic_salary" value="<?php echo $basic_salary; ?>">
            <input type="hidden" name="working_days" value="<?php echo $working_days; ?>">
            <input type="hidden" name="overtime_hours" value="<?php echo $overtime_hours; ?>">
            <input type="hidden" name="gross_pay" value="<?php echo $gross_pay; ?>">
            <input type="hidden" name="deductions" value="<?php echo $deductions; ?>">
            <input type="hidden" name="net_pay" value="<?php echo $net_pay; ?>">

            <button type="submit">Add to Payroll History</button>
        </form>

        <a href="calculate_payroll.php">Back to Payroll</a>
    </div>
</body>
</html>
