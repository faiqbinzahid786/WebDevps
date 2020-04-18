<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Chef_foranyone extends MY_Controller {

public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->model('sale/chef_foranyone_model');
    }


	public function index()
	{


$data['tab'] = 'chef_foranyone';
$data['title'] = 'Chef for anyone';
		$this->deshboardlayout('webbody/chef_foranyone',$data);



	}


  function Get_kitchen()
  {

    if(isset($_GET['id'])){
$data['id'] = $_GET['id'];
}else{
$data['id'] = '0';
}
  echo $this->chef_foranyone_model->Get_kitchen($data);

  }



  function Get_new()
  {

    if(isset($_GET['id'])){
$data['id'] = $_GET['id'];
}else{
$data['id'] = '0';
}


  echo $this->chef_foranyone_model->Get_new($data);

}


function Get_doing()
{

  if(isset($_GET['id'])){
$data['id'] = $_GET['id'];
}else{
$data['id'] = '0';
}


echo $this->chef_foranyone_model->Get_doing($data);

}


function Get_success()
{

  if(isset($_GET['id'])){
$data['id'] = $_GET['id'];
}else{
$data['id'] = '0';
}



echo $this->chef_foranyone_model->Get_success($data);

}



function Changestatus()
{

$data = json_decode(file_get_contents("php://input"),true);
if(!isset($data)){
exit();
}


if(isset($_GET['id'])){
$dataget['id'] = $_GET['id'];
}else{
$dataget['id'] = '0';
}



$this->chef_foranyone_model->Changestatus($data,$dataget);

}







}
