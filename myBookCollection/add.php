<?php

//This file is a target file for add_form.html which will add all the nodes in the xml file.

include "add_form.html";

$xmldoc = new DomDocument( '1.0' );
$xmldoc->preserveWhiteSpace = false;
$xmldoc->formatOutput = true;



if( $xml = file_get_contents( 'books.xml') ) {
    $xmldoc->loadXML( $xml, LIBXML_NOBLANKS );

    // find the headercontent tag
    $root = $xmldoc->getElementsByTagName('catalog')->item(0);

    // create the <product> tag
    //$CD = $xmldoc->createElement('book');

    $CD = $xmldoc->createElement('book');
    $root->appendChild($CD);
    $numAttribute = $xmldoc->createAttribute("id");
    $numAttribute->value = $_GET['book_id'];
    $CD->appendChild($numAttribute); 

    // add the product tag before the first element in the <CATALOG> tag
    $root->insertBefore( $CD, $root->firstChild );

    // create other elements and add it to the <book> tag.
    $titleElement = $xmldoc->createElement('author');
    $CD->appendChild($titleElement);
    $titleText = $xmldoc->createTextNode($_GET['author']);
    $titleElement->appendChild($titleText);

    $artistElement = $xmldoc->createElement('title');
    $CD->appendChild($artistElement);
    $artistText = $xmldoc->createTextNode($_GET['title']);
    $artistElement->appendChild($artistText);

    $countryElement = $xmldoc->createElement('genre');
    $CD->appendChild($countryElement);
    $countryText = $xmldoc->createTextNode($_GET['genre']);
    $countryElement->appendChild($countryText);

    $companyElement = $xmldoc->createElement('price');
    $CD->appendChild($companyElement);
    $companyText = $xmldoc->createTextNode($_GET['price']);
    $companyElement->appendChild($companyText);

    $priceElement = $xmldoc->createElement('publish_date');
    $CD->appendChild($priceElement);
    $priceText = $xmldoc->createTextNode($_GET['publish_date']);
    $priceElement->appendChild($priceText);

    $yearElement = $xmldoc->createElement('description');
    $CD->appendChild($yearElement);
    $yearText = $xmldoc->createTextNode($_GET['description']);
    $yearElement->appendChild($yearText);

    //Log File 
    //TIMESTAMP
    $log_time = date('l jS F Y h:i:sa');
    //Write action to txt log
    $log  = "iBooks Collection Log® \n"
    //.$log_no. "\n"
    .$log_time."\n______________________________________________________\n\n"
    ."A Book was added with the information below: 
    \n-> Book ID: ".$_GET['book_id'].PHP_EOL.
    "-> Author: ".$_GET['author'].PHP_EOL.
    "-> Title: ".$_GET['title'].PHP_EOL.
    "-> Genre: ".$_GET['genre'].PHP_EOL.
    "-> Price: ".$_GET['price'].PHP_EOL.
    "-> Published Date: ".$_GET['publish_date'].PHP_EOL.
    "-> Description: ".$_GET['description'].PHP_EOL. "\n\n";

    //Inseerting contents to the file and save it.
    //The Log File will save yearly
    $filename = './log_'.date("Y").'.txt';
    file_put_contents($filename , $log, FILE_APPEND);

    //The code snippet below will save file for each day
    //file_put_contents('logfile.txt' , $log, FILE_APPEND);

    $xmldoc->save('books.xml');
    header("Location: display.php");
}
?>