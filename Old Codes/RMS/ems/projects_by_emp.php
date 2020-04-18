<?php

echo "<head><link rel='shortcut icon' type='image/png' href='people.png'></head>";

session_start();

$ssn1 = $_POST['ssn1'];

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
                <a class='nav-link' href='project.php'>Project</a>
            </li>
            <li class='nav-item'>
                <a class='nav-link' href='add_project.php'>Add Project</a>
            </li>
            <li class='nav-item'>
              <a class='nav-link' href='assign_project.php'>Assign to Project</a>
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
                </a>
            </li>
            <li class='nav-item'>
                <a class='nav-link' href='doc/documentation_project.html' target='_blank'>Add Department</a>
            </li>
        </ul>
    </div>
  </span>
</nav>";


//Heading for Projects
$sql = "SELECT fname, lname from employee where ssn = '$ssn1';";
$result = $conn->query($sql);
while ($row = $result->fetch_assoc()){
  echo "<div class='container'><br><h1> Assigned projects for ".$row['fname']." ".$row['lname']."</h1></div>";
}

//SQL Query for displayijng the tuples and attributes from project relation
$sql = "SELECT  w.pno, p.pname, p.plocation, d.dname, w.hours  FROM project p, works_on w, department d WHERE w.pno=p.pnumber and w.essn='$ssn1' and (p.dnum=d.dnumber);";
$result = $conn->query($sql);
$return_arr = array();

//Table that display the tuples and attributes from Project Table
echo "<div class='container'><table class='table table-bordered table-hover'>
<td><strong>Project Number<strong></td>
<td><strong>Project Name<strong></td>
<td><strong>Project Location<strong></td>
<td><strong>Department<strong></td>
<td><strong>Hours<strong></td></tr>";

while($row = $result->fetch_assoc())
{

        echo "<tr><td>";

        echo $row["pno"];
        echo "</td><td>";

        echo $row["pname"];
        echo "</td><td>";

	      echo $row["plocation"];
        echo "</td><td>";

        echo $row["dname"];
        echo "</td><td>";

        echo $row["hours"];
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
  <title>Employee's Projects</title>
  <link rel="shortcut icon" type="image/png" href="people.png">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
    
<!-Bootstrap 4 Linked CSS File->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
  <script type="text/javascript" src="project.js"></script>
   <link rel="stylesheet" type="text/css" href="style.css">


</head>
</html>