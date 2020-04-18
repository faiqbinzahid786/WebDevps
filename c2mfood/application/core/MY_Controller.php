<?php
 class MY_Controller extends CI_Controller {


 	 public function __construct()
    {
        parent::__construct();
         $this->load->library('session');

        $this->base_url = 'http://localhost/c2mfood';
        $this->base_lang = 'th';


        $this->aff_income = '500';

$this->c2m_key = 'S#b*7&&@sDFR+=2!@3Bmcd';

    }

 public function weblayout($view,$data) {
 // Page local resource
$data['base_url'] = $this->base_url;
include 'lang/'.$this->base_lang.'.php';


$this->load->view('layout/web/header.php',$data);
 $this->load->view('layout/web/left.php',$data);
  $this->load->view($view,$data);
 $this->load->view('layout/web/right.php',$data);
 $this->load->view('layout/web/footer.php',$data);
 }



 public function adminlayout($view,$data) {

include 'lang/'.$this->base_lang.'.php';


$data['base_url'] = $this->base_url;

$this->load->view('layout/admin/header.php',$data);
 $this->load->view('layout/admin/left.php',$data);
   $this->load->view($view,$data);
 $this->load->view('layout/admin/right.php',$data);
 $this->load->view('layout/warehouse/footer.php',$data);
 }




  public function ownerlayout($view,$data) {
 // Page local resource
include 'lang/'.$this->base_lang.'.php';


$data['base_url'] = $this->base_url;

$this->load->view('layout/warehouse/header.php',$data);
 $this->load->view('layout/owner/left.php',$data);
   $this->load->view($view,$data);
 $this->load->view('layout/owner/right.php',$data);
 $this->load->view('layout/warehouse/footer.php',$data);
 }



  public function warehouselayout($view,$data) {
 // Page local resource
include 'lang/'.$this->base_lang.'.php';


$data['base_url'] = $this->base_url;

$this->load->view('layout/warehouse/header.php',$data);
 $this->load->view('layout/warehouse/left.php',$data);
   $this->load->view($view,$data);
 $this->load->view('layout/warehouse/right.php',$data);
 $this->load->view('layout/warehouse/footer.php',$data);
 }

  public function barcodelayout($view,$data) {
 // Page local resource
$data['base_url'] = $this->base_url;

$this->load->view($view,$data);

 }



  public function warehousebiglayout($view,$data) {
 // Page local resource
include 'lang/'.$this->base_lang.'.php';


$data['base_url'] = $this->base_url;

$this->load->view('layout/warehousebig/header.php',$data);
 $this->load->view('layout/warehousebig/left.php',$data);
   $this->load->view($view,$data);
 $this->load->view('layout/warehousebig/right.php',$data);
 $this->load->view('layout/warehouse/footer.php',$data);
 }





  public function salelayout($view,$data) {
include 'lang/'.$this->base_lang.'.php';


$data['base_url'] = $this->base_url;

$this->load->view('layout/warehouse/header.php',$data);
 $this->load->view('layout/sale/left.php',$data);
   $this->load->view($view,$data);
 $this->load->view('layout/sale/right.php',$data);
 $this->load->view('layout/warehouse/footer.php',$data);
 }


  public function salereservlayout($view,$data) {
include 'lang/'.$this->base_lang.'.php';


$data['base_url'] = $this->base_url;

$this->load->view('layout/warehouse/header.php',$data);
 $this->load->view('layout/salereserv/left.php',$data);
   $this->load->view($view,$data);
 $this->load->view('layout/salereserv/right.php',$data);
 $this->load->view('layout/warehouse/footer.php',$data);
 }



 public function salesettinglayout($view,$data) {

include 'lang/'.$this->base_lang.'.php';

$data['base_url'] = $this->base_url;

$this->load->view('layout/warehouse/header.php',$data);
 $this->load->view('layout/salesetting/left.php',$data);
   $this->load->view($view,$data);
 $this->load->view('layout/salesetting/right.php',$data);
 $this->load->view('layout/warehouse/footer.php',$data);
 }



 public function marketinglayout($view,$data) {
include 'lang/'.$this->base_lang.'.php';

$data['base_url'] = $this->base_url;

$this->load->view('layout/warehouse/header.php',$data);
 $this->load->view('layout/marketing/left.php',$data);
   $this->load->view($view,$data);
 $this->load->view('layout/marketing/right.php',$data);
 $this->load->view('layout/warehouse/footer.php',$data);
 }



  public function affiliatelayout($view,$data) {
 // Page local resource

include 'lang/'.$this->base_lang.'.php';

$data['base_url'] = $this->base_url;

$this->load->view('layout/warehouse/header.php',$data);
 $this->load->view('layout/affiliate/left.php',$data);
   $this->load->view($view,$data);
 $this->load->view('layout/affiliate/right.php',$data);
 $this->load->view('layout/affiliate/footer.php',$data);
 }




 public function brandlayout($view,$data) {
include 'lang/'.$this->base_lang.'.php';

$data['base_url'] = $this->base_url;

$this->load->view('layout/brand/header.php',$data);
 $this->load->view('layout/brand/left.php',$data);
   $this->load->view($view,$data);
 $this->load->view('layout/brand/right.php',$data);
 $this->load->view('layout/web/footer.php',$data);
 }




 public function deshboardlayout($view,$data) {
 // Page local resource

if(!isset($_SESSION['store_type'])){
            header( "location: ".$this->base_url );
        }
include 'lang/'.$this->base_lang.'.php';

$data['base_url'] = $this->base_url;
$this->load->view('layout/warehouse/header.php',$data);
$this->load->view('layout/deshboard/left.php',$data);
$this->load->view($view,$data);
$this->load->view('layout/deshboard/right.php',$data);
$this->load->view('layout/warehouse/footer.php',$data);
 }


  public function storemanagerlayout($view,$data) {

if(!isset($_SESSION['store_id'])){
            header( "location: ".$this->base_url );
        }
include 'lang/'.$this->base_lang.'.php';

$data['base_url'] = $this->base_url;

$this->load->view('layout/warehouse/header.php',$data);
 $this->load->view('layout/storemanager/left.php',$data);
   $this->load->view($view,$data);
 $this->load->view('layout/storemanager/right.php',$data);
 $this->load->view('layout/warehouse/footer.php',$data);
 }



 public function foodmanagerlayout($view,$data) {

if(!isset($_SESSION['store_id'])){
            header( "location: ".$this->base_url );
        }
include 'lang/'.$this->base_lang.'.php';

$data['base_url'] = $this->base_url;

$this->load->view('layout/warehouse/header.php',$data);
 $this->load->view('layout/foodmanager/left.php',$data);
   $this->load->view($view,$data);
 $this->load->view('layout/foodmanager/right.php',$data);
 $this->load->view('layout/warehouse/footer.php',$data);
 }



  public function foodlayout($view,$data) {

if(!isset($_SESSION['store_id'])){
            header( "location: ".$this->base_url );
        }
include 'lang/'.$this->base_lang.'.php';

$data['base_url'] = $this->base_url;

$this->load->view('layout/warehouse/header.php',$data);
 $this->load->view('layout/food/left.php',$data);
   $this->load->view($view,$data);
 $this->load->view('layout/food/right.php',$data);
 $this->load->view('layout/warehouse/footer.php',$data);
 }


 public function foodbrandlayout($view,$data) {

include 'lang/'.$this->base_lang.'.php';

$data['base_url'] = $this->base_url;

$this->load->view('layout/warehouse/header.php',$data);
 $this->load->view('layout/foodbrand/left.php',$data);
   $this->load->view($view,$data);
 $this->load->view('layout/foodbrand/right.php',$data);
 $this->load->view('layout/web/footer.php',$data);
 }



public function apartmentmanagerlayout($view,$data) {

include 'lang/'.$this->base_lang.'.php';

$data['base_url'] = $this->base_url;

$this->load->view('layout/warehouse/header.php',$data);
 $this->load->view('layout/apartmentmanager/left.php',$data);
   $this->load->view($view,$data);
 $this->load->view('layout/apartmentmanager/right.php',$data);
 $this->load->view('layout/web/footer.php',$data);
 }



 public function apartmentlayout($view,$data) {

include 'lang/'.$this->base_lang.'.php';

$data['base_url'] = $this->base_url;

$this->load->view('layout/apartment/header.php',$data);
 $this->load->view('layout/apartment/left.php',$data);
   $this->load->view($view,$data);
 $this->load->view('layout/apartment/right.php',$data);
 $this->load->view('layout/web/footer.php',$data);
 }


public function to_excel($array, $filename) {
	header('Content-Encoding: UTF-8');
    header('Content-Disposition: attachment; filename='.$filename.'.xls');
    header('Content-type: application/force-download');
    header('Content-Transfer-Encoding: binary');
    header('Pragma: public');


    echo '<meta http-equiv="Content-type" content="text/html;charset=utf-8" />';
    $h = array();
    foreach($array->result_array() as $row){
        foreach($row as $key=>$val){
            if(!in_array($key, $h)){
                $h[] = $key;
            }
        }
    }
    echo '<table><tr style="background-color:#ccc">';
    foreach($h as $key) {
        $key = ucwords($key);
        echo '<th>'.$key.'</th>';
    }
    echo '</tr>';

    foreach($array->result_array() as $row){
        echo '<tr>';
        foreach($row as $val)
            $this->writeRow($val);
    }
    echo '</tr>';
    echo '</table>';


}

 public function writeRow($val) {
    echo '<td>'.$val.'</td>';
}







public function sendmailfunc($to,$subject,$data)
  {
ob_start();

$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
$headers .= "From: noreply@gmail.com\r\n";
  $Send = mail($to,$subject,$data,$headers);  // @ = No Show Error //
  if($Send)
  {

  }
  else
  {

  }



  }





 }
