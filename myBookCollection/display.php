<?php

//This file will display the content of XML file in Table.

$xml = simplexml_load_file('books.xml');

$books = $xml->book;

echo "<!DOCTYPE html>
<html>

<head>
    <title>Books</title>

    <script src='include.js'></script>

</head>

<body>
    <div w3-include-html='head.html'></div>
    <script>
        includeHTML();
    </script>

    
    <div class='table-responsive-sm container'>
    <br><br><h1>Books Collections</h1><br>          
    <table class='table table-bordered'>
        <thead>
        <tr>
            <th>ID</th>
            <th>Author</th>
            <th>Title</th>
            <th>Genre</th>
            <th>Price</th>
            <th>Publish Date</th>
            <th>Description</th>
        </tr>
    </thead>
    <tbody>
        <tr>";

   

for ($i = 0; $i < count($books); $i++) {

    echo "
    <tr>
        <td>" . $books[$i]->attributes()->id      . "</td>
        <td>" . $books[$i]->author     . "</td>
        <td>" . $books[$i]->title . "</td>
        <td>". $books[$i]->genre ."</td>
        <td>". $books[$i]->price ."</td>
        <td>". $books[$i]->publish_date ."</td>
        <td>". $books[$i]->description ."</td>
    </tr>";
}
echo"
</tbody>
</table>
</div>";
?>