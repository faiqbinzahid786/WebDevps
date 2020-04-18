<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

/* Change to the correct path if you copy this example! */
require __DIR__ . '/../../autoload.php';
use Mike42\Escpos\Printer;
//use Mike42\Escpos\GdEscposImage;
use Mike42\Escpos\PrintConnectors\NetworkPrintConnector;
//use Mike42\Escpos\CapabilityProfile;
use Mike42\Escpos\EscposImage;
use Mike42\Escpos\PrintConnectors\FilePrintConnector;

/* Most printers are open on port 9100, so you just need to know the IP
 * address of your receipt printer, and then fsockopen() it on that port.
 */
try {

$data = json_decode(file_get_contents("php://input"),true);


$json = json_encode($data['data']);
$array = json_decode( $json, true );

//echo $array[0]['product_name'];


foreach($array as $item) { //foreach element in $arr

$text = $item['food_table_name'];
     $text2 = $item['product_sale_num'].'  '.$item['product_name'];
     $text3 = 'note: '.$item['note_order'];
     $text4 = date("d-m-Y H:i:s",time()+25200).' by: '.$item['name'];

     $font_size = 50;
     $font_size2 = 35;
     $font_size3 = 35;
     $font_size4 = 25;
     $height = 200;
     $width = 570;

     $im = ImageCreate($width, $height);
     $grey = ImageColorAllocate($im, 255, 255, 255);
     $black = ImageColorAllocate($im, 0, 0, 0);


$text_bbox = ImageTTFBBox($font_size, 0, __DIR__."/THBold.ttf", $text);
$text_bbox2 = ImageTTFBBox($font_size, 0, __DIR__."/THBold.ttf", $text2);
$text_bbox3 = ImageTTFBBox($font_size, 0, __DIR__."/THBold.ttf", $text3);
$text_bbox4 = ImageTTFBBox($font_size, 0, __DIR__."/THBold.ttf", $text4);


     $image_centerx = $width / 4;
     $image_centerx2 = $width / 4;
     $image_centerx3 = $width / 4;
     $image_centerx4 = $width / 4;


	 $image_centery = $height / 3.8;
	 $image_centery2 = $height / 1.9;
	 $image_centery3 = $height / 1.5;
	 $image_centery4 = $height / 1.2;


     $text_x = $image_centerx - round(($text_bbox[4]/4));
     $text_x2 = $image_centerx2 - round(($text_bbox[4]/4));
     $text_x3 = $image_centerx3 - round(($text_bbox[4]/4));
     $text_x4 = $image_centerx4 - round(($text_bbox[4]/4));


	 $text_y = $image_centery;
	 $text_y2 = $image_centery2;
	 $text_y3 = $image_centery3;
	 $text_y4 = $image_centery4;


ImageTTFText($im, $font_size, 0, $text_x, $text_y, $black, __DIR__."/THBold.ttf", $text);
ImageTTFText($im, $font_size2, 0, $text_x2, $text_y2, $black, __DIR__."/THBold.ttf", $text2);
ImageTTFText($im, $font_size3, 0, $text_x3, $text_y3, $black, __DIR__."/THBold.ttf", $text3);
ImageTTFText($im, $font_size4, 0, $text_x4, $text_y4, $black, __DIR__."/THBold.ttf", $text4);


     ImagePng($im,"pic/order/".$item['product_id'].".png");
     ImageDestroy ($im);


echo $text;

    echo $item['printer_ip'].'<br />'; //etc


        if($item['printer_ip']!=''){

          $connector = new NetworkPrintConnector($item['printer_ip'], 9100);

          $printer = new Printer($connector);

          $tux = EscposImage::load("pic/order/".$item['product_id'].".png", false);

          //$printer -> graphics($tux);
           //$printer -> bitImageColumnFormat($tux);

          $printer -> beep(3,1);
          $printer -> bitImage($tux);
          $printer -> feed(2);
          $printer -> cut();
          $printer -> close();

        }

    /* Print a "Hello world" receipt" */


}






} catch (Exception $e) {
    echo "Couldn't print to this printer: " . $e -> getMessage() . "\n";
}
