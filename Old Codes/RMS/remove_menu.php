<?php

//html header file (linking styles sheets, JVScript and Bootstrap 4
include 'header.html';

//title of the page 
echo "<head><title>Remove</title></head>";

session_start();

$dishId = $_POST['dishId'];
//$dishName = $_POST['dishName'];
//$ingred = $_POST['ingred'];
//$price = $_POST['price'];

if ($_SESSION['loggedin'])
{

        //phpinfo() external file;
		include 'db_connect.php';
        $sql = "delete from menu WHERE dishId = '$dishId';";
        $result = $conn->query($sql);
        $return_arr = array();

        header("Location: menu.php");
}

//Not Authenticated or Wrong Credentials
else
{
    echo "Not authenticated";
}

//close the connection - to prevent server overflow
$conn->close();
?>