<?php

//This file will ask user the ID of the book whose data they want to remove(delete the wole book)


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
    <form action='delete_all.php' method='GET'>
     <br><select name='title' class='form-control' required=true required>
     <option>Please choose an ID below</option>";

   
for ($i = 0; $i < count($catalog); $i++) {
    $faiq =    $catalog[$i]->attributes()->id;
    echo "<option name='". $faiq ."'>". $faiq. "</option>";
}

echo "</select> 
     <br><input type='submit' value='Delete Everything' class='btn btn-dark block'>
</form></tbody></table></div><br>

<form action = 'delete_all.php' >

</form>

</body>
</html>";
?>