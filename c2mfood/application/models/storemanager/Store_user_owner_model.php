<?php

class Store_user_owner_model extends CI_Model {



        public function __construct()
        {
                // Call the CI_Model constructor
                parent::__construct();
                $this->load->library('session');
        }





public function Add($data)
        {

$this->db->where('user_email', $data['user_email']);
$query = $this->db->get('user_owner');
$count_row = $query->num_rows();

    if ($count_row > 0) {
      //if count row return any row; that means you have already this email address in the database. so you must set false in this sense.
        return FALSE; // here I change TRUE to false.
     } else {

$data['store_id'] = $_SESSION['store_id'];
$this->db->insert("user_owner", $data);
      // doesn't return any row means database doesn't have this email
        return TRUE; // And here false to TRUE
     }




  }


   public function Edit($data)
        {

$this->db->where('user_id',$data['user_id']);
$this->db->where('store_id',$_SESSION['store_id']);
if ($this->db->update("user_owner", $data)){
        return true;
    }


  }




   public function Get()
        {

$query = $this->db->query('SELECT
  uo.user_id,
  uo.name,
  uo.user_email,

  uo.user_type,
  ft.food_table_id,
  ft.food_table_name,
  wk.kitchen_id,
  wk.kitchen_name
FROM user_owner as uo
LEFT JOIN food_table as ft on ft.food_table_id=uo.food_table_id
LEFT JOIN wh_product_category_kitchen as wk on wk.kitchen_id=uo.kitchen_id
ORDER BY uo.user_id ASC
');

$encode_data = json_encode($query->result(),JSON_UNESCAPED_UNICODE );
return $encode_data;
        }


        public function Deleteuser($data)
                   {

               $query = $this->db->query('DELETE FROM user_owner  WHERE user_id="'.$data['user_id'].'" and  owner_id="'.$_SESSION['owner_id'].'"');
               return true;

                   }







}
