
<html>
<head>
    <title>Attendance Display</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }

        h2 {
            color: #333;
        }

        ul {
            list-style-type: none;
            padding: 0;
        }

        li {
            margin-bottom: 10px;
            padding: 5px;
            border: 1px solid #ccc;
            border-radius: 5px;
            color: #000;
        }
    </style>
</head>
<body>
    <h2>Students Marked Present Today</h2>
    <?php
    $con = mysqli_connect("localhost", "root", "") or die(mysql_error());
    mysqli_select_db($con, "student") or die(mysql_error());

    // Retrieve the current date
    $current_date = date("Y-m-d");

    // Retrieve students marked present for the current date
    $attendance_query = "SELECT DISTINCT register.name, register.srn 
                        FROM register 
                        INNER JOIN attendance 
                        ON register.srn = attendance.srn
                        WHERE attendance.date = '$current_date'";

    $result = mysqli_query($con, $attendance_query);

    if (mysqli_num_rows($result) > 0) {
        echo "<ul>";
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<li>Name: " . $row["name"] . " - SRN: " . $row["srn"] . "</li>";
        }
        echo "</ul>";
    } else {
        echo "<p>No students have been marked present today.</p>";
    }

    mysqli_close($con);
    ?>
</body>
</html>
