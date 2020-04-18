<?php

class Food_list_model extends CI_Model {



        public function __construct()
        {
                // Call the CI_Model constructor
                parent::__construct();
                $this->load->library('session');


        }

        public function Add($data)
        {

$data2['food_image'] = $data['food_image'];
$data2['food_name'] = $data['food_name'];
$data2['food_price'] = $data['food_price'];
$data2['food_status'] = $data['food_status'];
$data2['food_category_id'] = $data['food_category_id'];
$data2['food_brand_id'] = $_SESSION['food_brand_id'];
$data2['user_id'] = $_SESSION['user_id'];
$data2['store_id'] = $_SESSION['store_id'];

if ($this->db->insert("food_list", $data2)){
		return true;
	}

  }


           public function Update($data)
        {

$data2['food_name'] = $data['food_name'];
$data2['food_image'] = $data['food_image'];
$data2['food_price'] = $data['food_price'];
$data2['food_status'] = $data['food_status'];
$data2['food_category_id'] = $data['food_category_id'];

$where = array(
        'food_brand_id' => $_SESSION['food_brand_id'],
        'food_id'  => $data['food_id']
);

$this->db->where($where);
if ($this->db->update("food_list", $data2)){
        return true;
    }

}



      



           public function Get($data)
        {

            $perpage = $data['perpage'];

            if($data['page'] && $data['page'] != ''){
$page = $data['page'];
            }else{
          $page = '1';      
            }


            $start = ($page - 1) * $perpage;

$querynum = $this->db->query('SELECT 
    fl.food_id as food_id,
    fl.food_name as food_name,
    fl.food_image as food_image,
    fl.food_price as food_price,
    fc.food_category_id as food_category_id,
    fc.food_category_name as food_category_name
    FROM food_list as fl
LEFT JOIN food_category as fc on fc.food_category_id=fl.food_category_id
    WHERE fl.food_brand_id="'.$_SESSION['food_brand_id'].'"  AND fl.food_name LIKE "%'.$data['searchtext'].'%" 
    ORDER BY fl.food_id DESC');


$query = $this->db->query('SELECT 
    fl.food_id as food_id,
    fl.food_name as food_name,
    fl.food_image as food_image,
    fl.food_price as food_price,
    fl.food_status as food_status,
    fc.food_category_id as food_category_id,
    fc.food_category_name as food_category_name
    FROM food_list as fl 
LEFT JOIN food_category as fc on fc.food_category_id=fl.food_category_id
    WHERE fl.food_brand_id="'.$_SESSION['food_brand_id'].'"  AND fl.food_name LIKE "%'.$data['searchtext'].'%" 
    ORDER BY fl.food_id DESC  LIMIT '.$start.' , '.$perpage.'  ');

$encode_data = json_encode($query->result(),JSON_UNESCAPED_UNICODE );


$num_rows = $querynum->num_rows();

$pageall = ceil($num_rows/$perpage);




$json = '{"list": '.$encode_data.',
"numall": '.$num_rows.',"perpage": '.$perpage.', "pageall": '.$pageall.'}';

return $json;

        }




        





    public function Delete($data)
        {

$query = $this->db->query('DELETE FROM food_list  WHERE food_id="'.$data['food_id'].'" and  food_brand_id="'.$_SESSION['food_brand_id'].'"');
return true;

        }




    }