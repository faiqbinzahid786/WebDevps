<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Salepic extends MY_Controller {


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


$data['tab'] = 'salepic';
$data['title'] = 'Sale Pic';
		$this->deshboardlayout('sale/salepic',$data);
}


 function Getproduct()
    {

$data = json_decode(file_get_contents("php://input"),true);
if(!isset($data)){
exit();
}
echo  $this->salepage_model->Getproduct($data);

}







function Openshiftnow()
    {

$data = json_decode(file_get_contents("php://input"),true);
echo  $this->salepage_model->Openshiftnow($data);

	}



  function Useproductpoint()
      {

  $data = json_decode(file_get_contents("php://input"),true);
  echo  $this->salepage_model->Useproductpoint($data);

  	}







  function Confirmcloseshiftnow()
      {

  $data = json_decode(file_get_contents("php://input"),true);
  echo  $this->salepage_model->Confirmcloseshiftnow($data);

  	}




function Getproductlist()
    {

$data = json_decode(file_get_contents("php://input"),true);
echo  $this->salepage_model->Getproductlist($data);

	}


  function Openbillclosedaylist_product()
    {

  $data = json_decode(file_get_contents("php://input"),true);
  echo  $this->salepage_model->Openbillclosedaylist_product($data);

  }



	function Openbillclosedaylista()
    {

$data = json_decode(file_get_contents("php://input"),true);
echo  $this->salepage_model->Openbillclosedaylista($data);

	}

	function Openbillclosedaylistb()
    {

$data = json_decode(file_get_contents("php://input"),true);
echo  $this->salepage_model->Openbillclosedaylistb($data);

	}

	function Openbillclosedaylistc()
    {

$data = json_decode(file_get_contents("php://input"),true);
echo  $this->salepage_model->Openbillclosedaylistc($data);

	}





  function Shiftclose_addwallet()
      {

  $data = json_decode(file_get_contents("php://input"),true);
  echo  $this->salepage_model->Shiftclose_addwallet($data);

    }



    


  function Settablestatusone()
    {

  $data = json_decode(file_get_contents("php://input"),true);
  echo  $this->salepage_model->Settablestatusone($data);

  }




	function Getproductlistcat()
    {

$data = json_decode(file_get_contents("php://input"),true);
echo  $this->salepage_model->Getproductlistcat($data);

	}


function Searchproductlist()
    {

$data = json_decode(file_get_contents("php://input"),true);
echo  $this->salepage_model->Searchproductlist($data);

	}


function Addproductlisttable()
    {

$data = json_decode(file_get_contents("php://input"),true);
echo  $this->salepage_model->Addproductlisttable($data);

	}




function Checkadminpass()
    {

$data = json_decode(file_get_contents("php://input"),true);

$md5password =  $data['adminpass'].$this->c2m_key;
$data['adminpass'] = md5($md5password);

echo  $this->salepage_model->Checkadminpass($data);

	}



function Editpushsavetable()
    {

$data = json_decode(file_get_contents("php://input"),true);
echo  $this->salepage_model->Editpushsavetable($data);

	}


function Delproductlisttable()
    {

$data = json_decode(file_get_contents("php://input"),true);
echo  $this->salepage_model->Delproductlisttable($data);

	}





function Getproductlistorder()
    {

$data = json_decode(file_get_contents("php://input"),true);
echo  $this->salepage_model->Getproductlistorder($data);
$this->salepage_model->Settablesopentime($data);
	}


function Getproductlistorder_cat()
    {

$data = json_decode(file_get_contents("php://input"),true);
echo  $this->salepage_model->Getproductlistorder_cat($data);

	}



	function Printproductlisttable()
    {

$data = json_decode(file_get_contents("php://input"),true);
echo  $this->salepage_model->Printproductlisttable($data);

	}


	function Checkproductlisttable()
    {

$data = json_decode(file_get_contents("php://input"),true);
echo  $this->salepage_model->Checkproductlisttable($data);

	}



  function Addwalletconfirm()
      {

  $data = json_decode(file_get_contents("php://input"),true);
  echo  $this->salepage_model->Addwalletconfirm($data);

  	}





function Moveproductlisttable()
    {

$data = json_decode(file_get_contents("php://input"),true);
echo  $this->salepage_model->Moveproductlisttable($data);

	}

function Delallproductlisttable()
    {

$data = json_decode(file_get_contents("php://input"),true);
echo  $this->salepage_model->Delallproductlisttable($data);

	}



function Getproductlisttable()
    {

$data = json_decode(file_get_contents("php://input"),true);
echo  $this->salepage_model->Getproductlisttable($data);

	}



	function Findproduct()
    {

$data = json_decode(file_get_contents("php://input"),true);
echo  $this->salepage_model->Findproduct($data);

	}




function Addproductranksave()
    {

$data = json_decode(file_get_contents("php://input"),true);
echo  $this->salepage_model->Addproductranksave($data);

	}


	function Delproductranksave()
    {

$data = json_decode(file_get_contents("php://input"),true);
echo  $this->salepage_model->Delproductranksave($data);

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

$header_code = time();

for($i=1;$i<=count($data['listsale']) ;$i++){


$data['sale_runno'] = $header_code;
$data['adddate'] = $header_code;

	if($data['listsale'][$i-1]['product_id']!='' && $data['listsale'][$i-1]['product_sale_num']!='0'){
$data['listsale'][$i-1]['sale_runno'] = $header_code;
$data['listsale'][$i-1]['adddate'] = $header_code;

if($this->salepage_model->Adddetail($data['listsale'][$i-1])){
	$this->salepage_model->Updateproductdeletestock($data['listsale'][$i-1]);
}




if($i==1){
$this->salepage_model->Addheader($data);
}

}

}



	}


	}
