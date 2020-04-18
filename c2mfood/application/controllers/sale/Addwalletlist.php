<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Addwalletlist extends MY_Controller {


 public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->model('sale/addwalletlist_model');

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


$data['tab'] = 'addwalletlist';
$data['title'] = 'Add wallet List';
		$this->salelayout('sale/addwalletlist',$data);
}




function Get()
    {

$data = json_decode(file_get_contents("php://input"),true);
echo  $this->addwalletlist_model->Get($data);

	}




	}
