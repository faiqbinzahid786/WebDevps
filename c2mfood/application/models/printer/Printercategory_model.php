<?php

class Printercategory_model extends CI_Model {



        public function __construct()
        {
                // Call the CI_Model constructor
                parent::__construct();
                $this->load->library('session');


        }




           public function Update($data)
        {


$where = array(
        'owner_id' => $_SESSION['owner_id'],
        'product_category_id'  => $data['product_category_id']
);

$this->db->where($where);
if ($this->db->update("wh_product_category", $data)){
        return true;
    }

}







           public function Get()
        {

$query = $this->db->query('SELECT wc.product_category_id,
  wc.product_category_name,
  wc.printer_ip,
  wk.kitchen_name
  FROM wh_product_category as wc
  LEFT JOIN  wh_product_category_kitchen as wk on wk.kitchen_id=wc.kitchen_id
  WHERE wc.owner_id="'.$_SESSION['owner_id'].'"
  ORDER BY wc.product_category_id DESC');
$encode_data = json_encode($query->result(),JSON_UNESCAPED_UNICODE );
return $encode_data;

        }


   public function Getcashier()
        {

$query = $this->db->query('SELECT cashier_printer_ip,printer_type,printer_order_type,printer_ul,printer_name FROM owner WHERE owner_id="'.$_SESSION['owner_id'].'"');
$encode_data = json_encode($query->result(),JSON_UNESCAPED_UNICODE );
return $encode_data;

        }




   public function Cashierprinteripupdate($data)
        {


$where = array(
        'owner_id' => $_SESSION['owner_id']
);


$newdata = array(
  'printer_type' => $data['printer_type'],
  'printer_ul' => $data['printer_ul'],
  'printer_name' => $data['printer_name']
);

$this->session->set_userdata($newdata);




$this->db->where($where);
if ($this->db->update("owner", $data)){
        return true;
    }

}









public function Update_kitchen($data)
{


$where = array(
'owner_id' => $_SESSION['owner_id'],
'kitchen_id'  => $data['kitchen_id']
);

$this->db->where($where);
if ($this->db->update("wh_product_category_kitchen", $data)){
return true;
}

}







public function Get_kitchen()
{

$query = $this->db->query('SELECT
printer_ip,
kitchen_name,
kitchen_id
FROM wh_product_category_kitchen
WHERE owner_id="'.$_SESSION['owner_id'].'"
ORDER BY kitchen_id DESC');
$encode_data = json_encode($query->result(),JSON_UNESCAPED_UNICODE );
return $encode_data;

}





    }
