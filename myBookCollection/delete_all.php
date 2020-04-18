<?php

//This file is a target file for delete_everything.php which will delete all the nodes associated with the book ID that user choosed.


//including file in order to use _GET method and use input from form as the condition to remove.
include 'delete.php';

//loading the xml file and storing it in PHP variable.
$xml = new DOMDocument; 
$xml->load('books.xml');
$thedocument = $xml->documentElement;

//$list contain the tags data of book.
$list = $thedocument->getElementsByTagName('book');

//figuring out which ones we want and then assign it to a variable ($nodeToRemove)
$nodeToRemove = null;
foreach ($list as $domElement){
  $attrValue = $domElement->getAttribute('id');
  if ($attrValue == $_GET["title"]) {
    $nodeToRemove = $domElement; //now $domElement is now $nodeToRemove.
  }
}

//Now we will remove it.
if ($nodeToRemove != null)
$thedocument->removeChild($nodeToRemove);

//LOG FILE for Deleting
//TIMESTAMP
$log_time = date('l jS F Y h:i:sa');

//Write action to txt log
$log  = "iBooks Collection Log® \n"
.$log_time."\n______________________________________________________\n\n"
."A Book was removed from the system: 
\n-> Book ID: ".$_GET['title'].PHP_EOL."\n\n";

//Inseerting contents to the file and save it.
file_put_contents('./log_'.date("Y").'.txt', $log, FILE_APPEND);
  
//saving XML file
$xml->save("books.xml");

//redirecting the page to the View page so that the user will know that the node they wished to delete is deleted. 
header("Location: display.php");
?>