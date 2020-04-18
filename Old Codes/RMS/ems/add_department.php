<?php

echo "<head><link rel='shortcut icon' type='image/png' href='people.png'></head>";

$realm = 'Restricted area';

//user => password
$users = array('faiqbinzahid' => '1535531');


if (empty($_SERVER['PHP_AUTH_DIGEST'])) {
    header('HTTP/1.1 401 Unauthorized');
    header('WWW-Authenticate: Digest realm="'.$realm.
           '",qop="auth",nonce="'.uniqid().'",opaque="'.md5($realm).'"');

    die('Text to send if user hits Cancel button');
}


// analyze the PHP_AUTH_DIGEST variable
if (!($data = http_digest_parse($_SERVER['PHP_AUTH_DIGEST'])) ||
    !isset($users[$data['username']]))
    die('Not Authorized!');


// generate the valid response
$A1 = md5($data['username'] . ':' . $realm . ':' . $users[$data['username']]);
$A2 = md5($_SERVER['REQUEST_METHOD'].':'.$data['uri']);
$valid_response = md5($A1.':'.$data['nonce'].':'.$data['nc'].':'.$data['cnonce'].':'.$data['qop'].':'.$A2);

if ($data['response'] != $valid_response)
    die('Not Authorized!');

    // ok, valid username & password
    //echo '<div  class="container"><div class="alert alert-dark">You are logged in as: ' . $data['username'].'</div></div>';
    session_start();
    $_SESSION['loggedin'] = true;
    $_SESSION['username'] = $data['username'];


    //phpinfo();
    $dbhost = 'localhost';
    $dbuser = 'db4140669';
    $dbpass = 'db4140669';
    $dbname = 'db4140669';
    $conn = new mysqli($dbhost, $dbuser, $dbpass, $dbname);
    if ($conn->connect_error) {
        echo "Connection failed<br/>";
        die("Connection failed: " . $conn->connect_error);
    }

echo "<div class='container-fluids'>
  <br>
  <h1><strong>The Employee Management System®</strong></h1> <br>
</div>";

//Nav Bar or Menu Bar
echo "<nav class='navbar navbar-expand-sm bg-dark navbar-dark sticky-top'>
        <div class='container-fluid' id='1'>
        <span class='cover'>
        <ul class='navbar-nav'>
            <li class='nav-item active'>
                <a class='nav-link' href='index.php'>EM Managment</a>
            </li>
            <li class='nav-item'>
                <a class='nav-link' href='department.php'>Department</a>
            </li>
            <li class='nav-item'>
                <a class='nav-link' href='department.php'>Add Department</a>
            </li>
            <li>
                <a class='nav-link'>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;                
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                </a>
            </li>
            </li>
            <li class='nav-item'>
                <a class='nav-link' href='doc/documentation_department.html' target='_blank'>Add Department</a>
            </li>
        </ul>
    </div>
  </span>
</nav>";

echo "<div class='container'><br><h1>Add a new department:</h1><br>";
echo "<form action='target_department.php' method='post'>
  Department Name: <input type='text' name='dname' class='form-control' required='true' maxLenght='15'> <br>
  Department Number: <input type='text' name='dnumber' class='form-control' required='true' maxLenght='1'> <br>
  Manager: <select class='form-control' name='mgrssn' required='true'>";

  $sql="select fname, lname,ssn from employee";
  $result = $conn->query($sql);
  while ($row = $result->fetch_assoc()){
    echo "<option value='".$row['ssn']."'>".$row['fname']." ".$row['lname']."</option>";
  }
  echo " </select>";
 
  echo "<br>Manager Start Date: <input type='text' name='mgrstartdate' class='form-control' required='true'>
  <br>
  <button type='submit' class='btn btn-dark'>Submit</button>
</form></div>";


/**
*This is a function to parse the http auth header.
*
*This function recieves the HTTP auth header digest and then parses and then check for matches.
*
*@param int $txt this is the variable type string which the function recieves. It is a message digest.
*
*@return void
*/
function http_digest_parse($txt)
{
    // protect against missing data
    $needed_parts = array('nonce'=>1, 'nc'=>1, 'cnonce'=>1, 'qop'=>1, 'username'=>1, 'uri'=>1, 'response'=>1);
    $data = array();
    $keys = implode('|', array_keys($needed_parts));

    preg_match_all('@(' . $keys . ')=(?:([\'"])([^\2]+?)\2|([^\s,]+))@', $txt, $matches, PREG_SET_ORDER);

    foreach ($matches as $m) {
        $data[$m[1]] = $m[3] ? $m[3] : $m[4];
        unset($needed_parts[$m[1]]);
    }

    return $needed_parts ? false : $data;
}

//close the connection - to prevent server overflow
$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
  <title>Add Departments</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  
  <!--Linking Style Sheets-->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="style.css">

</head>
</html>
