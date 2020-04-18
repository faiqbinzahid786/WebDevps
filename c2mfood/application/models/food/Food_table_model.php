<?php

class Food_table_model extends CI_Model {



        public function __construct()
        {
                // Call the CI_Model constructor
                parent::__construct();
                $this->load->library('session');


        }

        public function Add($data)
        {



$data2['food_table_name'] = $data['food_table_name'];
$data2['food_table_seat'] = $data['food_table_seat'];
$data2['user_id'] = $_SESSION['user_id'];
$data2['store_id'] = $_SESSION['store_id'];

if ($this->db->insert("food_table", $data2)){
		return true;
	}

  }


           public function Update($data)
        {



$data2['food_table_name'] = $data['food_table_name'];
$data2['food_table_seat'] = $data['food_table_seat'];

$where = array(
        'food_table_id'  => $data['food_table_id']
);

$this->db->where($where);
if ($this->db->update("food_table", $data2)){
        return true;
    }

}



      



           public function Get()
        {

$query = $this->db->query('SELECT * FROM food_table ORDER BY food_table_id ASC');
$encode_data = json_encode($query->result(),JSON_UNESCAPED_UNICODE );
return $encode_data;

        }




    public function Delete($data)
        {

$query = $this->db->query('DELETE FROM food_table  WHERE food_table_id="'.$data['food_table_id'].'"');
return true;

        }




    }