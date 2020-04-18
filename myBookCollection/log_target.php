<?php

//This file will check for user input for username and password. If they are correct then it will show the log file.

if($_GET["username"] == "faiqbinzahid" && $_GET["password"] == "faiq123"){
    
    //it will open the file that is the latest
    $filename = './log_'.date("Y").'.txt';
    header("Location: $filename");
    
}

//If they are wrong then it will show the error message.

else {
echo '
<head>
    <title>Add Collection</title>

    <script src="include.js"></script>

</head>

<body>
    <div w3-include-html="head.html"></div>
    <script>
        includeHTML();
    </script>';
    
echo '<br><br><br><br><br><br><br><br><br><br><br><b><h1 style="margin-left: 700px; font-size: 50px;">
Wrong credentials.<h1> <h1 style="margin-left: 470px; font-size: 50px;"><br> You are not authorized to view the Log File.</h1>';
}
?>

