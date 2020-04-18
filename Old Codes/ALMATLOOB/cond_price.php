<?php

//html header file (linking styles sheets, JVScript and Bootstrap 4
include 'header.html';

//title of the page 
echo "<head><title>Menu</title></head>";

session_start();

$price = $_POST['price'];

if ($_SESSION['loggedin'])
{
//phpinfo() external file;
include 'db_connect.php';

//navbar external file 
include 'nav_bar.php';

//SQL Query for displayijng the tuples and attributes from project relation
//$sql = "SELECT * FROM menu ORDER BY dishId;";
//$sql = "SELECT * FROM menu WHERE (ingred = $ingred AND price = $price);";
$sql = "SELECT * FROM menu WHERE price = $price;";
$result = $conn->query($sql);
$return_arr = array();


//Heading for Projects
echo "<div class='container'><form id='ssnform' style= 'display:none'>
<input type='text' name='ssn1' id='ssn1'></form><div class = 'NonPrintable'><br><br></div><h1>Shenanigans Irish Spors Bar</h1><br>
<h6>List of dishes with the price of ฿$price</h6><br></div>";

//Table that display the tuples and attributes from Project Table
echo "<div class='container'><table class='table table-bordered table-hover'>
<tr><td><strong>Dish ID</strong></td>
<td><strong>Dish Name<strong></td>
<td><strong>Ingredients<strong></td>
<td><strong>Price<strong></td>
<td><strong>Remarks<strong></td></tr>";

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
        echo "</td><td>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</td></tr></div>";
}

//Dispaying print button and making it invisible while printing	
echo" 
</table>
<input class='btn btn-dark form-control' id='printpagebutton' type='button' value='Print this page' onclick='printpage()'/>
<script type='text/javascript'>
    function printpage() {
        //Get the print button and put it into a variable
        var printButton = document.getElementById('printpagebutton');
        
		//Set the print button visibility to 'hidden' 
        printButton.style.visibility = 'hidden';
       
	   //Print the page content
        window.print()
       
	   //Set the print button to 'visible' again 
        //[Delete this line if you want it to stay hidden after printing]
        printButton.style.visibility = 'visible';
    }
</script>
<br><br>";
}


//Not Authenticated or Wrong Credentials
else
{
    echo "Not authenticated";
}

//close the connection - to prevent server overflow
$conn->close();
?>
