<?php

//This file will allow user to delete perticular nodes from the system.


$xml = simplexml_load_file('books.xml');

$catalog = $xml->book;

echo'<!DOCTYPE html>
<html>

<head>
    <title>Delete Books</title>
    <script src="include.js"></script>

    </head>
    
    <body>
        <div w3-include-html="head.html"></div>
        <script>
            includeHTML();
        </script>
    ';

    echo "<div class='container'>
    <br><h1>Remove from collection:</h1>
    <form action='delete_target.php' method='GET'>
     <br><select name='title' class='form-control' required=true>
     <option>Please choose an ID below</option>";

   
for ($i = 0; $i < count($catalog); $i++) {
    $faiq =    $catalog[$i]->attributes()->id;
    echo "<option name='". $faiq ."'>". $faiq. "</option>";
    //functionName($i);

}

echo "</select> <br> 
<select name='node' class='form-control' required=true>
     <option>Please choose a Tag below</option>
     
     <option name = 'author'>author</option>
     <option name = 'title'>title</option>
     <option name = 'genre'>genre</option>
     <option name = 'price'>price</option>
     <option name = 'publish_date'>publish_date</option>
     <option name = 'description'>description</option></select>
     <br><input type='submit' value='Delete' class='btn btn-dark block'><br>
</form></tbody></table></div><br>


</body>
</html>";
?>