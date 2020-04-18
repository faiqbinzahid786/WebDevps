<?php

//This file will allow user to inout the edited data.


$xml = simplexml_load_file('books.xml');

$catalog = $xml->book;

echo '<!DOCTYPE html>
<html>

<head>
    <title>Books</title>
    <script src="include.js"></script>

</head>

<body>
    <div w3-include-html="head.html"></div>
    <script>
        includeHTML();
    </script>
';

echo "<div class='container'>
    <br><h1>Edit from collection:</h1>
    <form method='POST' action='edit_target.php'>
     <br><select name='bookid' class='form-control' required=true>
     <option>Please choose an ID below</option>";

   
for ($i = 0; $i < count($catalog); $i++) {
    $faiq =    $catalog[$i]->attributes()->id;
    echo "<option name='". $faiq ."'>". $faiq. "</option>";
    //functionName($i);

}

echo '</select> <br> 
            <div class="form-group">
                <label for="Author">Book ID:</label>
                <input type="text" class="form-control" placeholder="Enter author name" name="bookidnew">
            </div>
            <div class="form-group">
                <label for="Author">Author:</label>
                <input type="text" class="form-control" placeholder="Enter author name" name="author">
            </div>
            <div class="form-group">
                <label for="title">Title:</label>
                <input type="text" class="form-control" placeholder="Enter title" name="title">
            </div>
            <div class="form-group">
                <label for="genre">Genre:</label>
                <input type="text" class="form-control" placeholder="Enter genre" name="genre">
            </div>
            <div class="form-group">
                <label for="price">Price:</label>
                <input type="text" class="form-control" placeholder="Enter price" name="price">
            </div>
            <div class="form-group">
                <label for="publish_date">Publish Date:</label>
                <input type="date" class="form-control" placeholder="Enter date" name="publish_date">
            </div>
            <div class="form-group">
                <label for="description">Description:</label><br>
                <textarea rows="5" cols="127" name="description" placeholder="Enter description here"></textarea>
            </div>
            
            <input name="submit" class="btn btn-dark block" type="submit" />
        </form>
    </div>


</body>

</html>';

