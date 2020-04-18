<?php

class Food_category_model extends CI_Model {



        public function __construct()
        {
                // Call the CI_Model constructor
                parent::__construct();
                $this->load->library('session');


        }

        public function Add($data)
        {



$data2['food_category_name'] = $data['food_category_name'];
$data2['food_brand_id'] = $_SESSION['food_brand_id'];
$data2['user_id'] = $_SESSION['user_id'];
$data2['store_id'] = $_SESSION['store_id'];

if ($this->db->insert("food_category", $data2)){
		return true;
	}

  }


           public function Update($data)
        {



$data2['food_category_name'] = $data['food_category_name'];

$where = array(
        'food_brand_id' => $_SESSION['food_brand_id'],
        'food_category_id'  => $data['food_category_id']
);

$this->db->where($where);
if ($this->db->update("food_category", $data2)){
        return true;
    }

}



      



           public function Get()
        {

$query = $this->db->query('SELECT food_category_id,food_category_name FROM food_category WHERE food_brand_id="'.$_SESSION['food_brand_id'].'" ORDER BY food_category_id DESC');
$encode_data = json_encode($query->result(),JSON_UNESCAPED_UNICODE );
return $encode_data;

        }




    public function Delete($data)
        {

$query = $this->db->query('DELETE FROM food_category  WHERE food_category_id="'.$data['food_category_id'].'" and  food_brand_id="'.$_SESSION['food_brand_id'].'"');
return true;

        }




    }