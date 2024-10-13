<?php
include 'database.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') 
{
    $id = $_POST['id'];
    $name = $_POST['name'];
    $position = $_POST['position'];
    $basic_salary = $_POST['basic_salary'];
    $working_days = $_POST['working_days'];
    $overtime_hours = $_POST['overtime_hours'];
    $gross_pay = $_POST['gross_pay'];
    $deductions = $_POST['deductions'];
    $net_pay = $_POST['net_pay'];

    // Insert the data into the employee table
    $sql = "INSERT INTO employee (name, position, basic_salary, working_days, overtime_hours, sss, philhealth, pagibig, tax, gross_pay, net_pay)
            VALUES ('$name', '$position', '$basic_salary', '$working_days', '$overtime_hours', 0, 0, 0, 0, '$gross_pay', '$net_pay')";

    if (mysqli_query($conn, $sql)) 
    {
        echo "Payslip saved successfully!";
    } else 
    {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

    mysqli_close($conn);

    header('Location: payroll_history.php');
    exit();
}
?>