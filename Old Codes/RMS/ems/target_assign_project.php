<?php

echo "<head><link rel='shortcut icon' type='image/png' href='people.png'></head>";

session_start();

$essn = $_POST['essn'];
$pno = $_POST['pno'];
$hours = $_POST['hours'];

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
        $sql = "insert into works_on values('$essn', '$pno', '$hours');";
        $result = $conn->query($sql);
        $return_arr = array();

        header ("Location: employee.php");
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
  <title>Assign Projects</title>
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