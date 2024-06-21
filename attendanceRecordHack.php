
<html lang="en">
    <style>  body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        h2 {
            text-align: center;
            margin-top: 20px;
            color: #333;
        }

        .stu-att input[type="submit"] {
            background-color: #6cb1e1;
            border: none;
            color: white;
            padding: 10px 20px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin: 4px 2px;
            transition-duration: 0.4s;
            cursor: pointer;
            border-radius: 4px;
        }

        .stu-att input[type="submit"]:hover {
            background-color: #4a8ab7;
        }</style>
<body>
<?php
$con = mysqli_connect("localhost", "root", "", "student") or die(mysqli_connect_error());

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $attendance_id = $_POST['attendance_id'];
    $srn = $_POST['srn'];
    $date = $_POST['date'];

    $query = "INSERT INTO attendanceH (attendance_id, srn, date) VALUES (?, ?, ?)";

    if ($stmt = mysqli_prepare($con, $query)) {
        mysqli_stmt_bind_param($stmt, "sss", $attendance_id, $srn, $date);

        if (mysqli_stmt_execute($stmt)) {
            echo "Attendance record inserted successfully.";
        } else {
            echo "Error: " . mysqli_error($con);
        }

        mysqli_stmt_close($stmt);
    }
}

mysqli_close($con);
?>
 <form action="attendanceha.php" method="post">
        <div class="stu-att">
            <input type="submit" value="students Present list" style="text-align: center;">
        </div>
    </form> 
</body>
</html>
