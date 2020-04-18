<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Food_list extends MY_Controller {


 public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->model('food/food_list_model');

     if(!isset($_SESSION['food_brand_id'])){
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
		

$data['tab'] = 'food_list';
$data['title'] = 'Food List';
		$this->foodlayout('food/food_list',$data);
}





 function Add()
    {
 
if(!isset($_POST['food_name']) || $_POST['food_name']==''){
exit();
}  
if(isset($_FILES["food_image"]["name"]) && $_FILES["food_image"]["name"] != ''){

if(!file_exists("pic/food_image/".$_SESSION['owner_id'])){
	mkdir("pic/food_image/".$_SESSION['owner_id'],0777,true);
}

    $upload = move_uploaded_file($_FILES["food_image"]["tmp_name"],"pic/food_image/".$_SESSION['owner_id']."/".time().md5($_FILES["food_image"]["name"]).'.jpg');

    $data['food_image'] = 'pic/food_image/'.$_SESSION['owner_id'].'/'.time().md5($_FILES["food_image"]["name"]).'.jpg';

}else{
$data['food_image'] = '';
}

$data['food_name'] = $_POST['food_name'];
$data['food_price'] = $_POST['food_price'];
$data['food_status'] = $_POST['food_status'];
$data['food_category_id'] = $_POST['food_category_id'];

		$success = $this->food_list_model->Add($data);
      
}



 function Update()
    {
 
if(!isset($_POST['food_name']) || $_POST['food_name']==''){
exit();
}  
if(isset($_FILES["food_image"]["name"]) && $_FILES["food_image"]["name"] != ''){

if(!file_exists("pic/food_image/".$_SESSION['owner_id'])){
	mkdir("pic/food_image/".$_SESSION['owner_id'],0777,true);
}

    $upload = move_uploaded_file($_FILES["food_image"]["tmp_name"],"pic/food_image/".$_SESSION['owner_id']."/".time().md5($_FILES["food_image"]["name"]).'.jpg');

    $data['food_image'] = 'pic/food_image/'.$_SESSION['owner_id'].'/'.time().md5($_FILES["food_image"]["name"]).'.jpg';

}else{
 $data['food_image']  = $_POST['food_image2'];
}

$data['food_id'] =  $_POST['food_id'];
$data['food_name'] = $_POST['food_name'];
$data['food_price'] = $_POST['food_price'];
$data['food_status'] = $_POST['food_status'];
$data['food_category_id'] = $_POST['food_category_id'];

		$success = $this->food_list_model->Update($data);
      
}



    function Get()
    {


$data = json_decode(file_get_contents("php://input"),true);
if(!isset($data)){
exit();
}
echo  $this->food_list_model->Get($data);

}





    function Uploadexcel()
    {
$time = time().$_SESSION['owner_id'];

if(move_uploaded_file($_FILES["excel"]["tmp_name"], "upload/" . $time.'.csv'))
{
$file = 'upload/'.$time.'.csv';

$fileopen = fopen($file, "r");  
//$data = fgetcsv( $fileopen , 3, ',' );

$i=0;
while (($dataexcel = fgetcsv($fileopen, 1000, ",")) !== FALSE) {
if($i>0){
 
if(!isset($dataexcel[2])){
	$data['product_pricebase'] = '0';
}else{
	$data['product_pricebase']  = $dataexcel[2];
}

if($dataexcel[3] ==null){
$data['product_price'] = '0';
}else{
	$data['product_price'] = $dataexcel[3];
}

if($dataexcel[1] ==null){
$data['product_name'] = '0';
}else{
	$data['product_name'] = $dataexcel[1];
}

if($dataexcel[0] ==null){
$data['product_code'] = '0';
}else{
	$data['product_code'] = $dataexcel[0];
}

$data['product_category_id'] = '1';

 $success = $this->food_list_model->Add($data);

}
$i=1;
}

fclose($fileopen);



}else{
	echo 'no';
}

}

	






    function Delete()
    {
 
$data = json_decode(file_get_contents("php://input"),true);
if(!isset($data)){
exit();
}

$success = $this->productlist_model->Delete($data);
      if($success){
      	return true;
      }else{
      	return false;
      }

}





	}

