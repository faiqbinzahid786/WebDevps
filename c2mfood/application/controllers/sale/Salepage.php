<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Salepage extends MY_Controller {


 public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->model('sale/salepage_model');

     if(!isset($_SESSION['owner_id'])){
            header( "location: ".$this->base_url );
        }
        
    }
	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		

$data['tab'] = 'salepage';
$data['title'] = 'Sale Page';
		$this->deshboardlayout('sale/salepage',$data);
}




function Getproductlist()
    {

$data = json_decode(file_get_contents("php://input"),true);
echo  $this->salepage_model->Getproductlist($data);
        
	}

	function Findproduct()
    {

$data = json_decode(file_get_contents("php://input"),true);
echo  $this->salepage_model->Findproduct($data);
        
	}



function Customer()
    {

$data = json_decode(file_get_contents("php://input"),true);
echo  $this->salepage_model->Customer($data);
        
	}


	function Gettoday()
    {

$data = json_decode(file_get_contents("php://input"),true);
echo  $this->salepage_model->Gettoday($data);
        
	}


function Savesale()
    {

	$data = json_decode(file_get_contents("php://input"),true);
if(!isset($data)){
exit();
}	

$runnolast = $this->salepage_model->Getrunnolast();

if($runnolast){
	$runnonow = $runnolast[0]['sale_runno'];

$runnoplus = $runnonow + '1';
$header_code = str_pad($runnoplus, 10, "0", STR_PAD_LEFT);
}else{
	$header_code = '0000000001';
}

$adddate = time();
//$header_code = time();

for($i=1;$i<=count($data['listsale']) ;$i++){


$data['sale_runno'] = $header_code;
$data['adddate'] = $adddate;

	if($data['listsale'][$i-1]['product_id']!='' && $data['listsale'][$i-1]['product_sale_num']!='0'){
$data['listsale'][$i-1]['sale_runno'] = $header_code;
$data['listsale'][$i-1]['adddate'] = $adddate;
	
if($this->salepage_model->Adddetail($data['listsale'][$i-1])){
	$this->salepage_model->Updateproductdeletestock($data['listsale'][$i-1]);


	$getproductformat = $this->salepage_model->Getproductformat($data['listsale'][$i-1]);

//print_r($getproductformat); 

for($ix=1;$ix<=count($getproductformat) ;$ix++){

	$matnum = $getproductformat[$ix-1]['num']*$data['listsale'][$ix-1]['product_sale_num'];
$this->salepage_model->Productmaterialdeletestock($getproductformat[$ix-1]['product_id_material'],$matnum);
}





}





if($i==1){
$this->salepage_model->Addheader($data);

}

}

}


        
	}


	}

