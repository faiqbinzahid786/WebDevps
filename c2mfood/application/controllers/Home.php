<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends MY_Controller {

public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->model('home_model');
    }


	public function index()
	{



if(isset($_SESSION['store_type']) && $_SESSION['store_type']=='0'){


$data['tab'] = 'deshboard';
$data['title'] = 'POS - manage';
		$this->deshboardlayout('deshboard/deshboard',$data);

}else{
	header("Location: ".$this->base_url."/login");

	}





	}



  function Saletodaytable()
  {

  echo $this->home_model->Saletodaytable();

}


function Saletoday()
{

echo $this->home_model->Saletoday();

}


function Productsaletoday()
{

echo $this->home_model->Productsaletoday();

}


function Customersaletoday()
{

echo $this->home_model->Customersaletoday();

}


function Productoutofstock()
{

echo $this->home_model->Productoutofstock();

}


function Productmatoutofstock()
{

echo $this->home_model->Productmatoutofstock();

}



















}
