<?php

//html header file (linking styles sheets, JVScript and Bootstrap 4
include 'header.html';

//title of the page 
echo "<head><title>Menu</title></head>";

session_start();

//accessing varible $counter from menu.php
ob_start();
require('menu.php');
$data = ob_get_clean();

//variables to get the contents of the for
//$No = $_POST['No'];
$NewCode = $_POST['NewCode'];
$ID = $_POST['ID'];
$Description = $_POST['Description'];
$NetWeight = $_POST['NetWeight'];
$GrossWeight = $_POST['GrossWeight'];
$Labour = $_POST['Labour'];

//Diamond Details 1
$D1Shape = $_POST['D1Shape'];
$D1QTY = $_POST['D1QTY'];
$D1Size = $_POST['D1Size'];
$D1WT = $_POST['D1WT'];


/*
//Diamond Details 1
$D1Shape = $_POST['D1Shape'];
$D1QTY = $_POST['D1QTY'];
$D1Size = $_POST['D1Size'];
$D1WT = $_POST['D1WT'];
//Diamond Details 2
$D2Shape = $_POST['D2Shape'];
$D2QTY = $_POST['D2QTY'];
$D2Size = $_POST['D2Size'];
$D2WT = $_POST['D2WT'];
//Diamond Details 3
$D3Shape = $_POST['D3Shape'];
$D3QTY = $_POST['D3QTY'];
$D3Size = $_POST['D3Size'];
$D3WT = $_POST['D3WT'];
//Diamond Details 4
$D4Shape = $_POST['D4Shape'];
$D4QTY = $_POST['D4QTY'];
$D4Size = $_POST['D4Size'];
$D4WT = $_POST['D4WT'];
//Diamond Details 5
$D5Shape = $_POST['D5Shape'];
$D5QTY = $_POST['D5QTY'];
$D5Size = $_POST['D5Size'];
$D5WT = $_POST['D5WT'];
//Diamond Details 6
$D6Shape = $_POST['D6Shape'];
$D6QTY = $_POST['D6QTY'];
$D6Size = $_POST['D6Size'];
$D6WT = $_POST['D6WT'];
//Diamond Details 7
$D7Shape = $_POST['D7Shape'];
$D7QTY = $_POST['D7QTY'];
$D7Size = $_POST['D7Size'];
$D7WT = $_POST['D7WT'];
//Gemstone Details 1
$G1Shape = $_POST['G1Shape'];
$G1QTY = $_POST['G1QTY'];
$G1Size = $_POST['G1Size'];
$G1WT = $_POST['G1WT'];
//Gemstone Details 2
$G2Shape = $_POST['G2Shape'];
$G2QTY = $_POST['G2QTY'];
$G2Size = $_POST['G2Size'];
$G2WT = $_POST['G2WT'];
//Gemstone Details 3
$G3Shape = $_POST['G3Shape'];
$G3QTY = $_POST['G3QTY'];
$G3Size = $_POST['G3Size'];
$G3WT = $_POST['G3WT'];
//Total Weights
$NetWeight = $_POST['NetWeight'];
$GrossWeight = $_POST['GrossWeight'];
$Labour = $_POST['Labour'];
*/

if ($_SESSION['loggedin'])
{
        //phpinfo() external file;
		include 'db_connect.php';
        /*$sql = "insert into 'table 1' values('$NewCode', '$ID', '$Description', 
        '$D1Shape', '$D1QTY', '$D1Size', '$D1WT', 
        '$D2Shape', '$D2QTY', '$D2Size', '$D2WT', 
        '$D3Shape', '$D3QTY', '$D3Size', '$D3WT', 
        '$D4Shape', '$D4QTY', '$D4Size', '$D4WT', 
        '$D5Shape', '$D5QTY', '$D5Size', '$D5WT',
        '$D6Shape', '$D6QTY', '$D6Size', '$D6WT',
        '$D7Shape', '$D7QTY', '$D7Size', '$D7WT', 
        '$G1Shape', '$G1QTY', '$G1Size', '$G1WT',
        '$G2Shape', '$G2QTY', '$G2Size', '$G2WT',
        '$G3Shape', '$G3QTY', '$G3Size', '$G3WT', 
        '$NetWeight', '$GrossWeight', '$Labour')";*/

        $sql = "INSERT INTO `description` VALUES ('$counter' '$NewCode', '$ID', '$Description','$NetWeight', '$GrossWeight', '$Labour')";
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
