<?php

echo "<head><link rel='shortcut icon' type='image/png' href='people.png'></head>";

session_start();

if ($_SESSION['loggedin'])
{
	//phpinfo();
	$dbhost = 'localhost';
	$dbuser = 'faiq';
	$dbpass = '1535531';
	$dbname = 'rms';
	$conn = new mysqli($dbhost, $dbuser, $dbpass, $dbname);
	if ($conn->connect_error) {
		echo "Connection failed<br/>";
		die("Connection failed: " . $conn->connect_error);
	}

//Navigation Bar or Menu Bar
echo "<div class='container-fluidser'>
  <br>
  <h1><strong>The Restaurant Management System®</strong></h1> <br>
</div>";

//Nav Bar or Menu Bar
echo "<nav class='navbar navbar-expand-sm bg-dark navbar-dark sticky-top'>
        <div class='container-fluid' id='1'>
        <span class='cover'>
        <ul class='navbar-nav'>
            <li class='nav-item active'>
                <a class='nav-link' href='index.php'>RST Managment</a>
            </li>
            <li class='nav-item'>
                <a class='nav-link' href='employee.php'>Menu</a>
            </li>
            <li class='nav-item'>
                <a class='nav-link' href='add_employee.php'>&nbsp;Add Menu</a>
            </li>
			<li class='nav-item'>
                <a class='nav-link' href='rem_menu.php'>Remove Menu</a>
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
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a>
            </li>
            <li class='nav-item'>
                <a class='nav-link' href='doc/documentation_employee.html' target='_blank'>Add Department</a>
            </li>
        </ul>
    </div>
  </span>
</nav>";


//SQL Query for displayijng the tuples and attributes from project relation
$sql = "SELECT * FROM menu ORDER BY dishId;";
$result = $conn->query($sql);
$return_arr = array();


//Heading for Projects
echo "<div class='container'><form id='ssnform' style= 'display:none'>
<input type='text' name='ssn1' id='ssn1'></form><br><br><h1>Shenanigans Irish Spors Bar</h1><br></div>";

//Table that display the tuples and attributes from Project Table
echo "<div class='container'><table class='table table-bordered table-hover'>
<tr><td><strong>Dish ID</strong></td>
<td><strong>Dish Name<strong></td>
<td><strong>Ingredients<strong></td>
<td><strong>Price<strong></td></tr>";

//fetching rows from the database 

while($row = $result->fetch_assoc())
{

        echo "<tr><td>";

        echo $row["dishId"];
        echo "</td><td>";

        echo $row["dishName"];
        echo "</td><td>";

        echo $row["ingred"];
        echo "</td><td> ฿";

        echo $row["price"];
        echo "</td>";

        //echo "<button class='ssnbtn btn btn-dark' value=".$row['ssn'].">Projects</button>";
        //echo "</td>";

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

<!DOCTYPE html>
<html>
<head>


<!--Linking Stylesheets [Boostrap 4 and Personal]-->    
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    
</head>
</html>

<!-HTML code with styles for the Webpage->
<!DOCTYPE html>
<html>
<head>
  <title>Employees</title>
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
