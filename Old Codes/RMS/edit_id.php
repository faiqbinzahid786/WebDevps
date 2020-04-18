<?php

//html header file (linking styles sheets, JVScript and Bootstrap 4
include 'header.html';

//title of the page 
echo "<head><title>Edit Dish ID</title></head>";

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
    die('Wrong Credentials!');

// ok, valid username & password
//echo '<div  class="container"><div class="alert alert-dark">You are logged in as: ' . $data['username'].'</div></div>';
session_start();
$_SESSION['loggedin'] = true;
$_SESSION['username'] = $data['username'];

//phpinfo() external file;
include 'db_connect.php';

//navbar external file 
include 'nav_bar.php';

//
echo "<div class='container'><br><h1>Edit existing dish ID:</h1>";
echo "<form action='other_editId.php' method='post'>

	Dish to edit: <select name='dishId' class='form-control' required=true><option>Please choose an option below</option>";

	$sql="select dishId, dishName from menu";
	$result = $conn->query($sql);

	while ($row = $result->fetch_assoc()){
	  echo "<option value='".$row['dishId']."'> ".$row['dishId']."&nbsp;&nbsp;&nbsp;".$row['dishName']."</option>";
	}
	echo "</select> 
	<br>
	Dish ID: <input type='text' name='dishId2' class='form-control'> 
	<br><br>
	<button type='submit' class='btn btn-dark form-control'>Update</button>
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