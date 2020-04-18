<?php

//html header file (linking styles sheets, JVScript and Bootstrap 4
include 'header.html';

//title of the page 
echo "<head><title>RMS Management</title></head>";

$realm = 'Restricted area';

//user => password
$users = array('faiqbinzahid' => '1535531', 'guest' => 'guest');


if (empty($_SERVER['PHP_AUTH_DIGEST'])) {
    header('HTTP/1.1 401 Unauthorized');
    header('WWW-Authenticate: Digest realm="'.$realm.
           '",qop="auth",nonce="'.uniqid().'",opaque="'.md5($realm).'"');

    die('Text to send if user hits Cancel button');
}


// analyze the PHP_AUTH_DIGEST variable
if (!($data = http_digest_parse($_SERVER['PHP_AUTH_DIGEST'])) ||
    !isset($users[$data['username']]))
    die('Wrong Credentials!');


// generate the valid response
$A1 = md5($data['username'] . ':' . $realm . ':' . $users[$data['username']]);
$A2 = md5($_SERVER['REQUEST_METHOD'].':'.$data['uri']);
$valid_response = md5($A1.':'.$data['nonce'].':'.$data['nc'].':'.$data['cnonce'].':'.$data['qop'].':'.$A2);

if ($data['response'] != $valid_response)
    die('Wrong Credentials!');

//Heading of the Page
echo "<div class='container-fluidser'>
  <br>
  <h1><strong>The Restaurant Management System®</strong></h1> <br>
</div>";

//Nav Bar or Menu Bar
echo "<nav class='navbar navbar-expand-sm bg-dark navbar-dark sticky-top faiq'>
        <div class='container-fluid' id='1'>
        <span class='cover'>
        <ul class='navbar-nav'>
            <li class='nav-item active'>
                <a class='nav-link' href='index.php'>RST Managment</a>
            </li>
            <li class='nav-item'>
                <a class='nav-link' href='menu.php'>Menu</a>
            </li>
            <li class='nav-item'>
                <a class='nav-link' href='project.php'>Project</a>
            </li>
            <li class='nav-item'>
                <a class='nav-link' href='department.php'>Department</a>
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
            <!-- Dropdown -->
            <li class='nav-item dropdown nav navbar-nav navbar-right'>
                <a class='nav-link' href='documentation_main.html' id='navbardrop' data-toggle='dropdown'>Documentation</a>
                <div class='dropdown-menu'>
                    <a class='dropdown-item' href='doc/documentation_employee.html'>Employee</a>
                    <a class='dropdown-item' href='doc/documentation_project.html'>Project</a>
                    <a class='dropdown-item' href='doc/documentation_department.html'>Department</a>
                </div>
            </li>
        </ul>
    </div>
  </span>
</nav>";


// ok, valid username & password
//echo '<div  class="container"><div class="alert alert-dark">You are logged in as: ' . $data['username'].'</div></div>';
session_start();
$_SESSION['loggedin'] = true;
$_SESSION['username'] = $data['username'];

//phpinfo() external file;
include 'db_connect.php';

//
echo " <br><h3 class='design'>Welcome to The Employee Management System® </h3>

  <br> <p class='design'>This system is build in order to maintain employee's data is softcopy or databse. The user can only view the current employees, on going projects and existing departments.
  The admin or the head of deaprtments can <strong>add employees</strong>, <strong>add departments</strong> and <strong>add projects</strong>. What ever the user type in the input box, the box will then automatically add the inputted
  text into the sql query and execute it. The URL to the application is <kbd><a href='http://natto.mooo.com/~db4140669/ems/' target='_blank'>http://natto.mooo.com/~db4140669/ems/</a></kbd>.
  The application is username/password protected. This application contain 7 screens which include EM Management screen (home screen), Employee screen, Project screen, and Department screen.</p>
";

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
