<?php
$xml = simplexml_load_file('cd_catalog.xml');

//echo '<h2>CD Listing</h2>';

$catalog = $xml->CD;

echo "<!DOCTYPE html>
<html>

<head>
    <title>Movies</title>

    <script src='include.js'></script>

    </head>
    
    <body>
        <div w3-include-html='head.html'></div>
        <script>
            includeHTML();
        </script>
    
    
    <div class='table-responsive-sm container'>
    <br><h1>CD Listing</h1><br>          
    <table class='table table-bordered'>
        <thead>
        <tr>
            <th>ID</th>
            <th>Title</th>
            <th>Artist</th>
            <th>Country</th>
            <th>Company</th>
            <th>Price</th>
            <th>Year</th>
        </tr>
    </thead>
    <tbody>
        <tr>";


for ($i = 0; $i < count($catalog); $i++) {

    echo "
    <tr>
        <td>" . $i     . "</td>
        <td>" . $catalog[$i]->TITLE     . "</td>
        <td>" . $catalog[$i]->ARTIST . "</td>
        <td>". $catalog[$i]->COUNTRY ."</td>
        <td>". $catalog[$i]->COMPANY ."</td>
        <td>". $catalog[$i]->PRICE ."</td>
        <td>". $catalog[$i]->YEAR ."</td>
    </tr>";

    /*echo '<b>Title: </b>' . $catalog[$i]->TITLE     . '<br>';

    echo '<b>Artist: </b>' . $catalog[$i]->ARTIST . '<br>';

    echo '<b>Country</b>: ' . $catalog[$i]->COUNTRY . '<br>';

    echo '<b>Company: </b>' . $catalog[$i]->COMPANY . '<br>';

    echo '<b>Price</b>: ' . $catalog[$i]->PRICE . '<br>';

    echo '<b>Year: </b>' . $catalog[$i]->YEAR . '<br><br>';*/

}
echo"
</tbody>
</table>
</div>";
?>