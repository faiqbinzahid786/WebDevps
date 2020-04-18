<?php

//html header file (linking styles sheets, JVScript and Bootstrap 4
include 'header.html';

//title of the page 
echo "<head><title>Add Pendants</title></head>";

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
include 'navbar.html';

//accessing varible $counter from menu.php
ob_start();
require('menu.php');
$data = ob_get_clean();

//form for inserting data into the pendant table
echo "<div class='container'><br><h1>Add pendants details:</h1>";
echo "<form action='other.php' method='post'>
<br>No: <select name='No' class='form-control' required=true>";

for ($x = 0; $x <= 50; $x++) {
    echo"<option id=' "; echo "'>"; echo $counter++;echo"</option>";
}
echo"</select><br>
Code: <input type='text' name='Code' class='form-control' required=true> <br>
ID: <input type='text' name='ID' class='form-control' required=true> <br>
Description: <input type='text' name='Description' class='form-control' required=true> <br>
Net Weight: <input type='text' name='NetWeight' class='form-control'> <br>
Gross Weight: <input type='text' name='GrossWeight' class='form-control'> <br>
Labour: <input type='text' name='Labour' class='form-control'> <br><br>
<h5><strong>Diamond Detail - 1</strong></h5>
Shape: <input type='text' name='D1Shape' class='form-control'> <br>
Quantity: <input type='text' name='D1QTY' class='form-control'> <br>
Size(mm): <input type='text' name='D1Size' class='form-control'> <br>
Weight(ct): <input type='text' name='D1WT' class='form-control'> <br>

<button type='submit' class='btn btn-dark form-control'>Add</button>
</form></div>";

/*echo"
<h5><strong>Diamond Detail - 1</strong></h5>
Shape: <input type='text' name='D1Shape' class='form-control'> <br>
Quantity: <input type='text' name='D1QTY' class='form-control'> <br>
Size(mm): <input type='text' name='D1Size' class='form-control'> <br>
Weight(ct): <input type='text' name='D1WT' class='form-control'> <br>

<h5><strong>Diamond Detail - 2</strong></h5>
Shape: <input type='text' name='D2Shape' class='form-control'> <br>
Quantity: <input type='text' name='D2QTY' class='form-control'> <br>
Size(mm): <input type='text' name='D2Size' class='form-control'> <br>
Weight(ct): <input type='text' name='D2WT' class='form-control'> <br>

<h5><strong>Diamond Detail - 3</strong></h5>
Shape: <input type='text' name='D3Shape' class='form-control'> <br>
Quantity: <input type='text' name='D3QTY' class='form-control'> <br>
Size(mm): <input type='text' name='D3Size' class='form-control'> <br>
Weight(ct): <input type='text' name='D3WT' class='form-control'> <br>

<h5><strong>Diamond Detail - 4</strong></h5>
Shape: <input type='text' name='D4Shape' class='form-control'> <br>
Quantity: <input type='text' name='D4QTY' class='form-control'> <br>
Size(mm): <input type='text' name='D4Size' class='form-control'> <br>
Weight(ct): <input type='text' name='D4WT' class='form-control'> <br>

<h5><strong>Diamond Detail - 5</strong></h5>
Shape: <input type='text' name='D5Shape' class='form-control'> <br>
Quantity: <input type='text' name='D5QTY' class='form-control'> <br>
Size(mm): <input type='text' name='D5Size' class='form-control'> <br>
Weight(ct): <input type='text' name='D5WT' class='form-control'> <br>

<h5><strong>Diamond Detail - 6</strong></h5>
Shape: <input type='text' name='D6Shape' class='form-control'> <br>
Quantity: <input type='text' name='D6QTY' class='form-control'> <br>
Size(mm): <input type='text' name='D6Size' class='form-control'> <br>
Weight(ct): <input type='text' name='D6WT' class='form-control'> <br>

<h5><strong>Diamond Detail - 7</strong></h5>
Shape: <input type='text' name='D7Shape' class='form-control'> <br>
Quantity: <input type='text' name='D7QTY' class='form-control'> <br>
Size(mm): <input type='text' name='D7Size' class='form-control'> <br>
Weight(ct): <input type='text' name='D7WT' class='form-control'> <br>

<h5><strong>Gemstone Detail - 1</strong></h5>
Shape: <input type='text' name='G1Shape' class='form-control'> <br>
Quantity: <input type='text' name='G1QTY' class='form-control'> <br>
Size(mm): <input type='text' name='G1Size' class='form-control'> <br>
Weight(ct): <input type='text' name='G1WT' class='form-control'> <br>

<h5><strong>Gemstone Detail - 2</strong></h5>
Shape: <input type='text' name='G2Shape' class='form-control'> <br>
Quantity: <input type='text' name='G2QTY' class='form-control'> <br>
Size(mm): <input type='text' name='G2Size' class='form-control'> <br>
Weight(ct): <input type='text' name='G2WT' class='form-control'> <br>

<h5><strong>Gemstone Detail - 3</strong></h5>
Shape: <input type='text' name='G3Shape' class='form-control'> <br>
Quantity: <input type='text' name='G3QTY' class='form-control'> <br>
Size(mm): <input type='text' name='G3Size' class='form-control'> <br>
Weight(ct): <input type='text' name='G3WT' class='form-control'> <br>

<h5><strong>Total Weights</strong></h5>
Net Weight: <input type='text' name='NetWeight' class='form-control'> <br>
Gross Weight: <input type='text' name='GrossWeight' class='form-control'> <br>
Labour: <input type='text' name='Labour' class='form-control'> <br><br>

<button type='submit' class='btn btn-dark form-control'>Add</button>
</form></div>";
*/

//include 'form_addPen.html';

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
