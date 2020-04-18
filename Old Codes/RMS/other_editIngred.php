<?php

//html header file (linking styles sheets, JVScript and Bootstrap 4
include 'header.html';

//title of the page 
echo "<head><title>Edit Ingredients</title></head>";

session_start();

$dishId = $_POST['dishId'];
$ingred = $_POST['ingred'];

if ($_SESSION['loggedin'])
{

		//phpinfo() external file;
		include 'db_connect.php';
        $sql = "UPDATE menu SET ingred = '$ingred' WHERE dishId = '$dishId';";
		//$sql = "UPDATE menu SET price = '$price' WHERE dishId = '$dishId';";
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
