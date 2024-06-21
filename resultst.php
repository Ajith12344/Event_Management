<!DOCTYPE html>
<html>
<head>
    <title>Student Details</title>
    <style>
         body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f2f2f2;
            margin: 0;
            padding: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        div {
            background-color: #ffffff;
            border-radius: 10px;
            width: 80%;
            margin: 20px;
            padding: 30px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            overflow-x: auto; /* Add horizontal scrollbar if needed */
        }

        table {
            width: 100%;
            border-collapse: collapse;
            border: 1px solid #ccc;
            margin-top: 20px;
        }

        th, td {
            border: 1px solid #ccc;
            padding: 10px;
            text-align: left;
        }

        th {
            background-color: #4caf50; /* Green background color for table headers */
            color: #fff;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9; /* Light gray background color for even rows */
        }

        tr:hover {
            background-color: #e0e0e0; /* Darker gray background color on hover */
        }

        h2 {
            color: #333;
            font-size: 24px;
            margin-bottom: 20px;
        }

        p {
            color: black;
            font-weight: bold;
        }

        .no-results {
            color: #f44336; /* Red color for no results message */
            font-weight: bold;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div>
        <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $con = mysqli_connect("localhost", "root", "") or die(mysqli_error());
                mysqli_select_db($con, "student") or die(mysqli_error());

                $class_name = mysqli_real_escape_string($con, $_POST['class_name']); // Sanitize input

                $sql = "SELECT * FROM register WHERE class_name = '$class_name'";

                if ($res = mysqli_query($con, $sql)) {
                    echo "<p>Students who have registered are: </p>";

                    if (mysqli_num_rows($res) > 0) {
                        echo "<table>";
                        echo "<tr><th>Name</th><th>SRN</th><th>Gender</th><th>Class_Name</th><th>Email</th></tr>";

                        while ($row = mysqli_fetch_array($res)) {
                            echo "<tr>";
                            echo "<td>" . $row['name'] . "</td>";
                            echo "<td>" . $row['srn'] . "</td>";
                            echo "<td>" . $row['gender'] . "</td>";
                            echo "<td>" . $row['class_name'] . "</td>";
                            echo "<td>" . $row['email'] . "</td>";
                            echo "</tr>";
                        }

                        echo "</table>";
                    } else {
                        echo "No results found for class: " . htmlspecialchars($class_name);
                    }

                    mysqli_close($con);
                } else {
                    die('Error: ' . mysqli_error($con));
                }
            } else {
                echo "Invalid request. Please use the search form.";
            }
        ?>
    </div>
    <form action="Home.html" method="post">
    
            <input type="submit" value="Home" style="text-align: center;">
        
    </form> 
</body>
</html>
