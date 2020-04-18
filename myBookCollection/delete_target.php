<?php

//This file is a target file for delete.php which will delete some nodes of the xml file.


include 'delete.php';
$xml = new DOMDocument; 
    $xml->load('books.xml');
    $thedocument = $xml->documentElement;
    $list = $thedocument->getElementsByTagName('book');
    
    foreach ($list as $domElement){
      $attrValue = $domElement->getAttribute('id'); 
      
      //if statement for matching the id in book tags.
      if ($attrValue == $_GET["title"]) { 
        $valY = $domElement->getElementsByTagName($_GET["node"]);

        //$valY is a DOMNodeList, that you happen to know there is only one doesnt matter
        foreach($valY as  $delnode){
          $delnode->parentNode->removeChild( $delnode);
        }
      }
    }
    
    //LOG FILE
    //TIMESTAMP
    $log_time = date('l jS F Y h:i:sa');
    //$log_no += 1;
    //$log_no ++;
    //Write action to txt log
    $log  = "iBooks Collection Log® \n"
    //.$log_no. "\n"
    .$log_time."\n______________________________________________________\n\n"
    ."An information about the Book was removed from the system: 
    \n-> Book ID: ".$_GET['title'].PHP_EOL.
    "-> Tag: ".$_GET['node'].PHP_EOL."\n\n";

    //Inseerting contents to the file and save it.
    file_put_contents('./log_'.date("Y").'.txt', $log, FILE_APPEND);
  



$xml->save("books.xml");
header("Location: display.php");
?>