<?php
  
     $text = $_GET['food_table_name'];
     $text2 = ''.$_GET['product_sale_num'].'  '.$_GET['product_name'];
     $text3 = 'Note: '.$_GET['note_order'];
     $text4 = date("d-m-Y H:i:s",time());

     $font_size = 50;
     $font_size2 = 25;
     $font_size3 = 25;
     $font_size4 = 15;
     $height = 200;
     $width = 570;
   
     $im = ImageCreate($width, $height);
     $grey = ImageColorAllocate($im, 255, 255, 255);
     $black = ImageColorAllocate($im, 0, 0, 0);
   
$text_bbox = ImageTTFBBox($font_size, 0, "Sumalee14.TTF", $text);
$text_bbox2 = ImageTTFBBox($font_size, 0, "Sumalee14.TTF", $text2);
$text_bbox3 = ImageTTFBBox($font_size, 0, "Sumalee14.TTF", $text3);
$text_bbox4 = ImageTTFBBox($font_size, 0, "Sumalee14.TTF", $text4);


     $image_centerx = $width / 2;

	 $image_centery = $height / 4;
	 $image_centery2 = $height / 2.3;
	 $image_centery3 = $height / 1.7;
	 $image_centery4 = $height / 1.3;

     $text_x = $image_centerx - round(($text_bbox[4]/1));
	 $text_y = $image_centery;
	 $text_y2 = $image_centery2;
	 $text_y3 = $image_centery3;
	 $text_y4 = $image_centery4;
   
ImageTTFText($im, $font_size, 0, $text_x, $text_y, $black, "Sumalee14.TTF", $text);
ImageTTFText($im, $font_size2, 0, $text_x, $text_y2, $black, "Sumalee14.TTF", $text2);
ImageTTFText($im, $font_size3, 0, $text_x, $text_y3, $black, "Sumalee14.TTF", $text3);
ImageTTFText($im, $font_size4, 0, $text_x, $text_y4, $black, "Sumalee14.TTF", $text4);


     ImagePng($im,"pic/order/1.png");
     ImageDestroy ($im);

	 echo "<img src=pic/order/1.png>";
?>