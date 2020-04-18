<?php

ini_set('display_errors', 1);
error_reporting(E_ALL);


$imagedata = base64_decode($_POST['imgdata']);
$filename = 'chef';
//path where you want to upload image
$file = 'pic/'.$filename.'.png';
$imageurl  = 'pic/'.$filename.'.png';
file_put_contents($file,$imagedata);

/* Change to the correct path if you copy this example! */
require __DIR__ . '/../../autoload.php';
use Mike42\Escpos\Printer;

    use Mike42\Escpos\PrintConnectors\WindowsPrintConnector;
    use Mike42\Escpos\PrintConnectors\NetworkPrintConnector;
//use Mike42\Escpos\GdEscposImage;
//use Mike42\Escpos\CapabilityProfile;
use Mike42\Escpos\EscposImage;
use Mike42\Escpos\PrintConnectors\FilePrintConnector;



/* Most printers are open on port 9100, so you just need to know the IP
 * address of your receipt printer, and then fsockopen() it on that port.
 */
try {


if($_POST['kitchen_printer_ip'] != ''){
    $connector = new NetworkPrintConnector($_POST['kitchen_printer_ip'], 9100);
    echo $_POST['kitchen_printer_ip'];


    //$profile = CapabilityProfile::load("TSP600");
$printer = new Printer($connector);

//$ticketim = imagecreatefrompng("pic/1.png");
//$ticketim = imagecreatefrompng("pic/".$filename.".png");

$tux = EscposImage::load("pic/".$filename.".png", false);

    //$printer -> graphics($tux);
     //$printer -> bitImageColumnFormat($tux);
     $printer -> beep(3,1);
     //$printer -> pulse();
    $printer -> bitImage($tux);
$printer -> feed(2);
$printer -> cut();
$printer -> close();
}


} catch (Exception $e) {
    echo "Couldn't print to this printer: " . $e -> getMessage() . "\n";
}
