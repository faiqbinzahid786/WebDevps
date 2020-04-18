<?php

//html header file (linking styles sheets, JVScript and Bootstrap 4
include 'header.html';

//title of the page 
echo "<head><title>Menu</title></head>";

session_start();

$dishId = $_POST['dishId'];
$dishName = $_POST['dishName'];
$ingred = $_POST['ingred'];
$price = $_POST['price'];
$dishId2 = $_POST['dishId2'];
$dishName2 = $_POST['dishName2'];
$ingred2 = $_POST['ingred2'];
$price2 = $_POST['price2'];


if ($_SESSION['loggedin'])
{

       //phpinfo() external file;
		include 'db_connect.php';
		
        //$sql = "insert into menu values('$dishId', '$dishName', '$ingred' ,'$price');";
        $sql = "SELECT $dishId, $dishName, $ingred $price FROM menu WHERE dishId = $dishId2, dishName = $dishName2, ingred = $ingred2 price = $price2;";
		$result = $conn->query($sql);
        $return_arr = array();

        header("Location: conditional_display.php");
}

//Not Authenticated or Wrong Credentials
else
{
    echo "Not authenticated";
}

//close the connection - to prevent server overflow
$conn->close();
?>
