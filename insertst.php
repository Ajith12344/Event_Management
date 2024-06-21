<html>
<head>
<title>
Registration_status
</title>
<style>
         body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        .success-message {
            background-color: #2ecc71; /* Change to your desired color */
            color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            text-align: center;
            font-size: 18px; }
    </style>
</head>
<body>
<?php
$con= mysqli_connect("localhost","root","") or die(mysql_error());
mysqli_select_db($con,"student") or die(mysql_error());
$sql="Insert into register (name,srn,gender,class_name,email)
	values('$_POST[name]','$_POST[srn]','$_POST[gender]','$_POST[class_name]','$_POST[email]')";
if(!mysqli_query($con,$sql))
{
die("error:". mysql_error());
}
echo "You are successfully registered";
mysqli_close($con)
?>
<form action="Home.html" method="post">
    
    <input type="submit" value="Home" style="text-align: center;">

</form> 

</body>
</html>

