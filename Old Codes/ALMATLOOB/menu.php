<?php

//html header file (linking styles sheets, JVScript and Bootstrap 4
include 'header.html';

//title of the page 
echo "<head><title>Pendants</title></head>";

session_start();

//if ($_SESSION['loggedin'])
//{
//phpinfo() external file;
include 'db_connect.php';

//navbar external file 
include 'navbar.html';

//Project Heading - Hidden while printing
/*
echo "<div class='container-fluidser NonPrintable'>
  <br>
  <h1><strong>Almatloob Gems and Jewelry®</strong></h1> 
</div>
<!--Hiding element while printing-->
 <style type='text/css' media='print'>
    .NonPrintable
    {
      display: none;
    }
  </style>

";*/


//SQL Query for displayijng the tuples and attributes from project relation
/*$sql = "SELECT No, NewCode, D_ID, Description,
D1_Shape, D1_Quantity, D1_Size, D1_Weight, 
D2_Shape, D2_Quantity, D2_Size, D2_Weight, 
D3_Shape, D3_Quantity, D3_Size, D3_Weight,  
D4_Shape, D4_Quantity, D4_Size, D4_Weight, 
D5_Shape, D5_Quantity, D5_Size, D5_Weight, 
D6_Shape, D6_Quantity, D6_Size, D6_Weight, 
D7_Shape, D7_Quantity, D7_Size, D7_Weight,
G1_Shape, G1_Quantity, G1_Size, G1_Weight,
G2_Shape, G2_Quantity, G2_Size, G2_Weight,
G3_Shape, G3_Quantity, G3_Size, G3_Weight, 
NetWeight, GrossWeight, Labour
FROM Description, Diamond_1, Diamond_2, Diamond_3, Diamond_4, Diamond_5, Diamond_6, Diamond_7,
Gemstone_1, Gemstone_2, Gemstone_3 
WHERE No = D1_ID AND No = D2_ID
AND No = D3_ID AND No = D4_ID 
AND No = D5_ID AND No = D6_ID 
AND No = D7_ID AND No = G1_ID 
AND No = G2_ID AND No = G3_ID";


$sql = "SELECT *
FROM Description, Diamond_1, Diamond_2, Diamond_3, Diamond_4, Diamond_5, Diamond_6, Diamond_7,
Gemstone_1, Gemstone_2, Gemstone_3 
WHERE No = D1_ID AND No = D2_ID
AND No = D3_ID AND No = D4_ID 
AND No = D5_ID AND No = D6_ID 
AND No = D7_ID AND No = G1_ID 
AND No = G2_ID AND No = G3_ID;  ";
*/
$sql = "SELECT *
FROM ((((((((((Description
INNER JOIN Diamond_1 ON No = D1_ID)
INNER JOIN Diamond_2 ON No = D2_ID) 
INNER JOIN Diamond_3 ON No = D3_ID)
INNER JOIN Diamond_4 ON No = D4_ID)
INNER JOIN Diamond_5 ON No = D5_ID)
INNER JOIN Diamond_6 ON No = D6_ID) 
INNER JOIN Diamond_7 ON No = D7_ID)
INNER JOIN Gemstone_1 ON No = G1_ID)
INNER JOIN Gemstone_2 ON No = G2_ID)
INNER JOIN Gemstone_3 ON No = G3_ID);
";

$result = $conn->query($sql);
$return_arr = array();


//Heading for Projects
echo "<div class='container-fluidser'>
<form id='menu' style= 'display:none'>
<input type='text'></form>";

//include navbar here 

echo"<div class = 'NonPrintable'><br></div>
<h1>Pendants</h1><br></div>";

//Table that display the tuples and attributes from Project Table
echo "<div class='container-fluidser'>
<table class='table table-bordered table-hover'><tr>
<tr>
  <th rowspan='2' style='text-align:center; padding-top:40px'>No.</th>
  <th rowspan='2' style='text-align:center; padding-top:40px'>Code</th>
  <th rowspan='2' style='text-align:center; padding-top:40px'>ID</th>
  <th rowspan='2' style='text-align:center; padding:40px'>Description</th>
  <th colspan='4' scope='colgroup'>Diamond Details 1</th>
  <th colspan='4' scope='colgroup'>Diamond Details 2</th>
  <th colspan='4' scope='colgroup'>Diamond Details 3</th>
  <th colspan='4' scope='colgroup'>Diamond Details 4</th>
  <th colspan='4' scope='colgroup'>Diamond Details 5</th>
  <th colspan='4' scope='colgroup'>Diamond Details 6</th>
  <th colspan='4' scope='colgroup'>Diamond Details 7</th>
  <th colspan='4' scope='colgroup'>Gemstone Details 1</th>
  <th colspan='4' scope='colgroup'>Gemstone Details 2</th>
  <th colspan='4' scope='colgroup'>Gemstone Details 3</th>
  <th rowspan='2' style='text-align:center; padding-top:30px'>Net Weight</th>
  <th rowspan='2' style='text-align:center; padding-top:30px'>Gross Weight</th>
  <th rowspan='2' style='text-align:center; padding-top:40px'>Labour</th>
</tr>
<tr>
  <th scope='col'>Shape</th>
  <th scope='col'>Quantity</th>
  <th scope='col'>Size(mm)</th>
  <th scope='col'>Weight(ct)</th>
  <th scope='col'>Shape</th>
  <th scope='col'>Quantity</th>
  <th scope='col'>Size(mm)</th>
  <th scope='col'>Weight(ct)</th>
  <th scope='col'>Shape</th>
  <th scope='col'>Quantity</th>
  <th scope='col'>Size(mm)</th>
  <th scope='col'>Weight(ct)</th>
  <th scope='col'>Shape</th>
  <th scope='col'>Quantity</th>
  <th scope='col'>Size(mm)</th>
  <th scope='col'>Weight(ct)</th>
  <th scope='col'>Shape</th>
  <th scope='col'>Quantity</th>
  <th scope='col'>Size(mm)</th>
  <th scope='col'>Weight(ct)</th>
  <th scope='col'>Shape</th>
  <th scope='col'>Quantity</th>
  <th scope='col'>Size(mm)</th>
  <th scope='col'>Weight(ct)</th>
  <th scope='col'>Shape</th>
  <th scope='col'>Quantity</th>
  <th scope='col'>Size(mm)</th>
  <th scope='col'>Weight(ct)</th>
  <th scope='col'>Shape</th>
  <th scope='col'>Quantity</th>
  <th scope='col'>Size(mm)</th>
  <th scope='col'>Weight(ct)</th>
  <th scope='col'>Shape</th>
  <th scope='col'>Quantity</th>
  <th scope='col'>Size(mm)</th>
  <th scope='col'>Weight(ct)</th>
  <th scope='col'>Shape</th>
  <th scope='col'>Quantity</th>
  <th scope='col'>Size(mm)</th>
  <th scope='col'>Weight(ct)</th>
</tr>";

/*
echo"
<th>D1 Shape</th>
<th>D1 QTY</th>
<th>D1 Size(mm)</th>
<th>D1 WT(CT)</th>
<th>D2 Shape</th>
<th>D2 QTY</th>
<th>D2 Size(mm)</th>
<th>D2 WT(CT)</th>
<th>D3 Shape</th>
<th>D3 QTY</th>
<th>D3 Size(mm)</th>
<th>D3 WT(CT)</th>
<th>D4 Shape</th>
<th>D4 QTY</th>
<th>D4 Size(mm)</th>
<th>D4 WT(CT)</th>
<th>D5 Shape</th>
<th>D5 QTY</th>
<th>D5 Size(mm)</th>
<th>D5 WT(CT)</th>
<th>D6 Shape</th>
<th>D6 QTY</th>
<th>D6 Size(mm)</th>
<th>D6 WT(CT)</th>
<th>D7 Shape</th>
<th>D7 QTY</th>
<th>D7 Size(mm)</th>
<th>D7 WT(CT)</th>
<th>G1 Shape</th>
<th>G1 QTY</th>
<th>G1 Size(mm)</th>
<th>G1 WT(CT)</th>
<th>G2 Shape</th>
<th>G2 QTY</th>
<th>G2 Size(mm)</th>
<th>G2 WT(CT)</th>
<th>G3 Shape</th>
<th>G3 QTY</th>
<th>G3 Size(mm)</th>
<th>G3 WT(CT)</th>
<th>Net Weight</th>
<th>Gross Weight</th>
<th>Labour</th>
<th></th></tr>";

//fetching rows from the database 
while($row = $result->fetch_assoc())
{

        echo "<tr><td>";

        echo $row['No'];
        echo "</td><td>";


        echo $row['New Code'];
        echo "</td><td>";

        echo $row["P24340PN"];
        echo "</td><td>";

        echo $row["DESCRIPTION"];
        echo "</td><td>";

        echo $row["D1 SHAPE"];
        echo "</td><td>";

        echo $row["D1 QTY"];
        echo "</td><td>";

        echo $row["D1 SIZE(mm)"];
        echo "</td><td>";

        echo $row["D1 WT(CT)"];
        echo "</td><td>";

        echo $row["D2 SHAPE"];
        echo "</td><td>";

        echo $row["D2 QTY"];
        echo "</td><td>";

        echo $row["D2 SIZE(mm)"];
        echo "</td><td>";

        echo $row["D2 WT(CT)"];
        echo "</td><td>";

        echo $row["D3 SHAPE"];
        echo "</td><td>";

        echo $row["D3 QTY"];
        echo "</td><td>";

        echo $row["D3 SIZE(mm)"];
        echo "</td><td>";

        echo $row["D3 WT(CT)"];
        echo "</td><td>";

        echo $row["D4 SHAPE"];
        echo "</td><td>";

        echo $row["D4 QTY"];
        echo "</td><td>";

        echo $row["D4 SIZE(mm)"];
        echo "</td><td>";

        echo $row["D4 WT(CT)"];
        echo "</td><td>";

        echo $row["D5 SHAPE"];
        echo "</td><td>";

        echo $row["D5 QTY"];
        echo "</td><td>";

        echo $row["D5 SIZE(mm)"];
        echo "</td><td>";

        echo $row["D5 WT(CT)"];
        echo "</td><td>";

        echo $row["D6 SHAPE"];
        echo "</td><td>";

        echo $row["D6 QTY"];
        echo "</td><td>";

        echo $row["D6 SIZE(mm)"];
        echo "</td><td>";

        echo $row["D6 WT(CT)"];
        echo "</td><td>";

        echo $row["D7 SHAPE"];
        echo "</td><td>";

        echo $row["D7 QTY"];
        echo "</td><td>";

        echo $row["D7 SIZE(mm)"];
        echo "</td><td>";

        echo $row["D7 WT(CT)"];
        echo "</td><td>";
        
        echo $row["G1 SHAPE"];
        echo "</td><td>";

        echo $row["G1 QTY"];
        echo "</td><td>";

        echo $row["G1 SIZE(mm)"];
        echo "</td><td>";

        echo $row["G1 WT(CT)"];
        echo "</td><td>";

        echo $row["G2 SHAPE"];
        echo "</td><td>";

        echo $row["G2 QTY"];
        echo "</td><td>";

        echo $row["G2 SIZE(mm)"];
        echo "</td><td>";

        echo $row["G2 WT(CT)"];
        echo "</td><td>";

        echo $row["G3 SHAPE"];
        echo "</td><td>";

        echo $row["G3 QTY"];
        echo "</td><td>";

        echo $row["G3 SIZE(mm)"];
        echo "</td><td>";

        echo $row["G4 WT(CT)"];
        echo "</td><td>";

        echo $row["NET WEIGHT"];
        echo "</td><td>";

        echo $row["GROSS WEIGHT"];
        echo "</td><td>";
        
        echo $row["LABOUR"];
        echo "</td><td>";

        //echo "<a href='remove_menu.php' id='".$row["dishId"]."'>Delete</a>" 
        //include 'button.html';
        //echo"<button type='button' onclick='alert('Hello world!')'>Click Me!</button>";
        
        echo"</td></tr></div>";
}
*/
$counter = 0;
while($row = $result->fetch_assoc())
{
  $counter++;
  
  echo "<tr><td>";

  echo $row["No"]; 
  echo "</td><td>"; 

  echo $row['NewCode']; 
  echo "</td><td>"; 
  
  echo $row['D_ID']; 
  echo "</td><td>"; 
  
  echo $row['Description'];
  echo "</td><td>";
  
  echo $row['D1_Shape']; 
  echo "</td><td>";
  
  echo $row['D1_Quantity']; 
  echo "</td><td>";
  
  echo $row['D1_Size']; 
  echo "</td><td>";
  
  echo $row['D1_Weight']; 
  echo "</td><td>"; 
  
  echo $row['D2_Shape']; 
  echo "</td><td>"; 
  
  echo $row['D2_Quantity']; 
  echo "</td><td>"; 
  
  echo $row['D2_Size']; 
  echo "</td><td>"; 
  
  echo $row['D2_Weight']; 
  echo "</td><td>"; 
  
  echo $row['D3_Shape']; 
  echo "</td><td>";
  
  echo $row['D3_Quantity']; 
  echo "</td><td>"; 
  
  echo $row['D3_Size']; 
  echo "</td><td>"; 
  
  echo $row['D3_Weight']; 
  echo "</td><td>";  
  
  echo $row['D4_Shape']; 
  echo "</td><td>"; 
  
  echo $row['D4_Quantity']; 
  echo "</td><td>"; 
  
  echo $row['D4_Size']; 
  echo "</td><td>"; 
  
  echo $row['D4_Weight']; 
  echo "</td><td>"; 
  
  echo $row['D5_Shape']; 
  echo "</td><td>"; 
  
  echo $row['D5_Quantity']; 
  echo "</td><td>"; 
  
  echo $row['D5_Size']; 
  echo "</td><td>"; 
  
  echo $row['D5_Weight']; 
  echo "</td><td>"; 
  
  echo $row['D6_Shape']; 
  echo "</td><td>"; 
  
  echo $row['D6_Quantity']; 
  echo "</td><td>"; 
  
  echo $row['D6_Size']; 
  echo "</td><td>"; 
  
  echo $row['D6_Weight']; 
  echo "</td><td>"; 
  
  echo $row['D7_Shape']; 
  echo "</td><td>"; 
  
  echo $row['D7_Quantity']; 
  echo "</td><td>"; 
  
  echo $row['D7_Size']; 
  echo "</td><td>"; 
  
  echo $row['D7_Weight']; 
  echo "</td><td>";
  
  echo $row['G1_Shape'];
  echo "</td><td>"; 
  
  echo $row['G1_Quantity']; 
  echo "</td><td>"; 
  
  echo $row['G1_Size']; 
  echo "</td><td>"; 
  
  echo $row['G1_Weight']; 
  echo "</td><td>";
  
  echo $row['G2_Shape']; 
  echo "</td><td>";
  
  echo $row['G2_Quantity']; 
  echo "</td><td>"; 
  
  echo $row['G2_Size']; 
  echo "</td><td>"; 
  
  echo $row['G2_Weight']; 
  echo "</td><td>";
  
  echo $row['G3_Shape']; 
  echo "</td><td>";
  
  echo $row['G3_Quantity']; 
  echo "</td><td>";
  
  echo $row['G3_Size']; 
  echo "</td><td>"; 
  
  echo $row['G3_Weight']; 
  echo "</td><td>"; 
  
  echo $row['NetWeight']; 
  echo "</td><td>"; 
  
  echo $row['GrossWeight']; 
  echo "</td><td>";
  
  echo $row['Labour'];
  echo "</td><td>";
  
  echo"</td></tr></div>";

}


//printing button 	
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

echo $counter;
//}

//Not Authenticated or Wrong Credentials
/*else
{
    echo "Not authenticated";
}

//close the connection - to prevent server overflow
//$conn->close();
*/
?>


