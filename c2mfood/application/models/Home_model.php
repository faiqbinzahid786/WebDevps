<?php

class Home_model extends CI_Model {



        public function __construct()
        {
                // Call the CI_Model constructor
                parent::__construct();
                $this->load->library('session');


        }



public function Getlogo()
        {

$query = $this->db->query('SELECT
    owner_logo,owner_bgimg
    FROM owner  LIMIT 1  ');
return $query->result_array();
        }



  public function Saletodaytable()
        {


if(isset($_SESSION['shift_id'])){
$shift_id= $_SESSION['shift_id'];
}else{
  $shift_id= '0';
}


$query = $this->db->query('SELECT COUNT(*) as numtable
 FROM sale_list_header WHERE owner_id="'.$_SESSION['owner_id'].'"
 AND shift_id="'.$shift_id.'" ');

 $encode_data = json_encode($query->result(),JSON_UNESCAPED_UNICODE );
 return $encode_data;


        }



           public function Saletoday()
        {
          if(isset($_SESSION['shift_id'])){
          $shift_id= $_SESSION['shift_id'];
          }else{
            $shift_id= '0';
          }

$query = $this->db->query('SELECT
SUM(sumsale_num) as sumnum,
SUM(sumsale_price-discount_last) as sumprice
 FROM sale_list_header WHERE owner_id="'.$_SESSION['owner_id'].'"
 AND shift_id="'.$shift_id.'" ');

 $encode_data = json_encode($query->result(),JSON_UNESCAPED_UNICODE );
 return $encode_data;


        }



          public function Productsaletoday()
        {

          if(isset($_SESSION['shift_id'])){
          $shift_id= $_SESSION['shift_id'];
          }else{
            $shift_id= '0';
          }



$query = $this->db->query('SELECT
    wpl.product_code as product_code,
    wpl.product_name as product_name,
    (SELECT sum(sd.product_sale_num) FROM sale_list_datail as sd WHERE sd.product_id=wpl.product_id  AND sd.owner_id="'.$_SESSION['owner_id'].'" AND sd.shift_id="'.$shift_id.'") as product_numall

    FROM wh_product_list as wpl WHERE wpl.owner_id="'.$_SESSION['owner_id'].'" ORDER BY product_numall DESC LIMIT 7');

    $encode_data = json_encode($query->result(),JSON_UNESCAPED_UNICODE );
    return $encode_data;

        }



          public function Customersaletoday()
        {

$today = date('d-m-Y',time());

$dayfrom = strtotime($today);
$dayto = strtotime($today)+86400;

$query = $this->db->query('SELECT
    wpl.cus_name as name,
    (SELECT sum(sd.sumsale_num) FROM sale_list_header as sd WHERE sd.cus_id=wpl.cus_id  AND sd.owner_id="'.$_SESSION['owner_id'].'" AND sd.adddate BETWEEN "'.$dayfrom.'" AND "'.$dayto.'") as sumsale_num


    FROM customer_owner as wpl WHERE wpl.owner_id="'.$_SESSION['owner_id'].'" ORDER BY sumsale_num DESC LIMIT 5');

    $encode_data = json_encode($query->result(),JSON_UNESCAPED_UNICODE );
    return $encode_data;

        }



          public function Productoutofstock()
        {

$query = $this->db->query('SELECT
    product_name,product_stock_num
    FROM wh_product_list
    WHERE owner_id="'.$_SESSION['owner_id'].'" AND product_stock_num > "0"
    ORDER BY product_stock_num ASC  LIMIT 7  ');

    $encode_data = json_encode($query->result(),JSON_UNESCAPED_UNICODE );
    return $encode_data;

        }


 public function Productmatoutofstock()
        {

$query = $this->db->query('SELECT
    wl.product_name as product_name,
    wl.product_stock_num as product_stock_num
    FROM product_material as pm
    LEFT JOIN wh_product_list as wl on wl.product_id=pm.product_id_material
    GROUP BY pm.product_id_material
    ORDER BY wl.product_stock_num ASC  LIMIT 7  ');

    $encode_data = json_encode($query->result(),JSON_UNESCAPED_UNICODE );
    return $encode_data;

        }




    }
