<?php 

//This file is a target file for edit_all.php which will edit some nodes of the xml file.


    if (isset($_POST['submit'])) {
        $xml = new DOMDocument('1.0', 'utf-8');
        $xml->formatOutput = true; 
        $xml->preserveWhiteSpace = false;
        $xml->load('books.xml');

        $xpath = new DOMXPath($xml);
        $elements = $xpath->query('//book[@id="'.$_POST['bookid'].'"]');
        if ($elements->length >= 1) {
        $element = $elements->item(0);
        $element->setAttribute('id', $_POST['bookidnew']);
    
        //$element = $xml->getElementsByTagName('book')->item(0);  
        $element->getElementsByTagName('author')->item(0)->nodeValue = $_POST['author'];
        $element->getElementsByTagName('title')->item(0)->nodeValue = $_POST['title'];
        $element->getElementsByTagName('genre')->item(0)->nodeValue = $_POST['genre'];
        $element->getElementsByTagName('price')->item(0)->nodeValue = $_POST['price'];
        $element->getElementsByTagName('publish_date')->item(0)->nodeValue = $_POST['publish_date'];
        $element->getElementsByTagName('description')->item(0)->nodeValue = $_POST['description'];

    }

        //Log File for Editing
        //TIMESTAMP
        $log_time = date('l jS F Y h:i:sa');
        //$log_no += 1;
        //$log_no ++;
        //Write action to txt log
        $log  = "iBooks Collection Log® \n"
        //.$log_no. "\n"
        .$log_time."\n______________________________________________________\n\n"
        ."The ID of the Book that the information was editted:\n".
        "\n-> The Book ID: ".$_POST['bookid'].PHP_EOL.
        " \nThe new content of the Book added into the system:\n".
        "\n-> Book ID: ".$_POST['bookidnew'].PHP_EOL.
        "-> Author: ".$_POST['author'].PHP_EOL.
        "-> Title: ".$_POST['title'].PHP_EOL.
        "-> Genre: ".$_POST['genre'].PHP_EOL.
        "-> Price: ".$_POST['price'].PHP_EOL.
        "-> Published Date: ".$_POST['publish_date'].PHP_EOL.
        "-> Description: ".$_POST['description'].PHP_EOL. "\n\n";

        //Inseerting contents to the file and save it.
        file_put_contents('./log_'.date("Y").'.txt', $log, FILE_APPEND);
        //file_put_contents('logfile.txt' , $log, FILE_APPEND);



        $xml->save('books.xml');
        header("Location: display.php");
    }
?>