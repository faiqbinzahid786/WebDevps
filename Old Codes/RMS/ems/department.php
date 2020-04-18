<?php

echo "<head><link rel='shortcut icon' type='image/png' href='people.png'></head>";

session_start();

if ($_SESSION['loggedin'])
{
        $dbhost = 'localhost';
        $dbuser = 'db4140669';
        $dbpass = 'db4140669';
        $dbname = 'db4140669';
        $conn = new mysqli($dbhost, $dbuser, $dbpass, $dbname);
        if ($conn->connect_error) {
            echo "Connection failed<br/>";
            die("Connection failed: " . $conn->connect_error);
        }

//Navigation Bar or Menu Bar
echo "<div class='container-fluidser'>
  <br>
  <h1><strong>The Employee Management System®</strong></h1> <br>
</div>";

//Nav Bar or Menu Bar
echo "<nav class='navbar navbar-expand-sm bg-dark navbar-dark sticky-top'>
        <div class='container-fluid' id='1'>
        <span class='cover'>
        <ul class='navbar-nav'>
            <li class='nav-item active'>
                <a class='nav-link' href='index.php'>EM Managment</a>
            </li>
            <li class='nav-item'>
                <a class='nav-link' href='department.php'>Department</a>
            </li>
            <li class='nav-item'>
                <a class='nav-link' href='add_department.php'>Add Department</a>
            </li>
            <li>
                <a class='nav-link'>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;                
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                </a>
            </li>
            <li class='nav-item'>
                <a class='nav-link' href='doc/documentation_department.html' target='_blank'>Add Department</a>
            </li>
        </ul>
    </div>
  </span>
</nav>";


//SQL Query for displayijng the tuples and attributes from project relation
$sql = "SELECT dname, dnumber, mgrstartdate, fname, lname, CONCAT(fname,' ',lname) as Manager FROM employee, department WHERE (mgrssn = ssn);";
$result = $conn->query($sql);
$return_arr = array();

//Heading for Projects
echo "<div class='container'><br><h1>Current Departments</h1></div>";

//Table that display the tuples and attributes from Project Table
echo "<div class='container'><table class='table table-bordered table-hover'>
<td><strong>Department Name<strong></td>
<td><strong>Department Number<strong></td>
<td><strong>Manager<strong></td>
<td><strong>Manager Start Date<strong></td></tr>";

while($row = $result->fetch_assoc())
{

        echo "<tr><td>";

        echo $row["dname"];
        echo "</td><td>";

        echo $row["dnumber"];
        echo "</td><td>";

        echo $row["Manager"];
        echo "</td><td>";

	      echo $row["mgrstartdate"];
        echo "</td>";

        echo "</tr></div>";
}

}

//Not Authenticated or Wrong Credentials
else
{
    echo "Not authenticated";
}

//close the connection - to prevent server overflow
$conn->close();
?>

<!-HTML code with styles for the Webpage->
<!DOCTYPE html>
<html>
<head>
  <title>Departments</title>
  <link rel="shortcut icon" type="image/png" href="people.png">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
   
<!-Bootstrap 4 Linked CSS File->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="style.css">

</head>
</html>
