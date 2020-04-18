<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Food_order extends MY_Controller {


 public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->model('food/food_order_model');



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


$data['tab'] = 'food_order';
$data['title'] = 'Food Order';
		$this->deshboardlayout('food/food_order',$data);
}




    function Get_table()
    {


 $list = $this->food_order_model->Get_table();


		if($list)
		{
			echo '{ "list" : '.$list.'}';
		}
		else{
			echo 'no';
		}

}



function Get_table_reload()
{
echo 'Hi';

}




function Get_order()
    {

$data = json_decode(file_get_contents("php://input"),true);
if(!isset($data)){
exit();
}

		echo $this->food_order_model->Get_order($data);

}



function Get_food()
    {


 $list = $this->food_order_model->Get_food();

echo $list;

}


function Get_catfood()
    {

 $list = $this->food_order_model->Get_catfood();
echo $list;

}


function Get_food_from_cat()
    {

$data = json_decode(file_get_contents("php://input"),true);
if(!isset($data)){
exit();
}

		echo $this->food_order_model->Get_food_from_cat($data);

}


function Savefoodtablelist()
    {

$data = json_decode(file_get_contents("php://input"),true);
if(!isset($data)){
exit();
}

		$success = $this->food_order_model->Savefoodtablelist($data);

}


function Deletefoodtablelist()
    {

$data = json_decode(file_get_contents("php://input"),true);
if(!isset($data)){
exit();
}

		$success = $this->food_order_model->Deletefoodtablelist($data);

}





function Blanktable()
    {

$data = json_decode(file_get_contents("php://input"),true);
if(!isset($data)){
exit();
}

		$success = $this->food_order_model->Blanktable($data);

}


function Waitorder()
    {

$data = json_decode(file_get_contents("php://input"),true);
if(!isset($data)){
exit();
}

		$success = $this->food_order_model->Waitorder($data);

}



function Successorder()
    {

$data = json_decode(file_get_contents("php://input"),true);
if(!isset($data)){
exit();
}

		$success = $this->food_order_model->Successorder($data);

}



function Getorderyet()
    {

$data = json_decode(file_get_contents("php://input"),true);
if(!isset($data)){
exit();
}

		$success = $this->food_order_model->Getorderyet($data);

}




function Lastorder()
    {

$data = json_decode(file_get_contents("php://input"),true);
if(!isset($data)){
exit();
}

		$success = $this->food_order_model->Lastorder($data);

}





	}
