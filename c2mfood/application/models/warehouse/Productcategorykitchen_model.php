<?php

class Productcategorykitchen_model extends CI_Model {



        public function __construct()
        {
                // Call the CI_Model constructor
                parent::__construct();
                $this->load->library('session');


        }

        public function Add($data)
        {



$data2['kitchen_name'] = $data['kitchen_name'];
$data2['owner_id'] = $_SESSION['owner_id'];
$data2['user_id'] = $_SESSION['user_id'];
$data2['store_id'] = $_SESSION['store_id'];

if ($this->db->insert("wh_product_category_kitchen", $data2)){
		return true;
	}

  }


           public function Update($data)
        {



$data2['kitchen_name'] = $data['kitchen_name'];

$where = array(
        'owner_id' => $_SESSION['owner_id'],
        'kitchen_id'  => $data['kitchen_id']
);

$this->db->where($where);
if ($this->db->update("wh_product_category_kitchen", $data2)){
        return true;
    }

}







           public function Get()
        {

$query = $this->db->query('SELECT kitchen_id,kitchen_name FROM wh_product_category_kitchen WHERE owner_id="'.$_SESSION['owner_id'].'" ORDER BY kitchen_id DESC');
$encode_data = json_encode($query->result(),JSON_UNESCAPED_UNICODE );
return $encode_data;

        }




    public function Delete($data)
        {

$query = $this->db->query('DELETE FROM wh_product_category_kitchen  WHERE kitchen_id="'.$data['kitchen_id'].'" and  owner_id="'.$_SESSION['owner_id'].'"');
return true;

        }




    }
