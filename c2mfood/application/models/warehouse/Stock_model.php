<?php

class Stock_model extends CI_Model {



        public function __construct()
        {
                // Call the CI_Model constructor
                parent::__construct();
                $this->load->library('session');


        }






         public function Getstock($data)
        {


 $perpage = $data['perpage'];

            if($data['page'] && $data['page'] != ''){
$page = $data['page'];
            }else{
          $page = '1';
            }


            $start = ($page - 1) * $perpage;


$querynum = $this->db->query('SELECT
    wl.product_id as product_id,
    wl.product_code as product_code,
    wl.product_name as product_name,
    wl.product_wholesale_price as product_wholesale_price,
    wl.product_price_discount as product_price_discount,
    wl.product_stock_num as product_stock_num,
    wl.product_price_value as product_price_value,
    wc.product_category_id as product_category_id,
    wc.product_category_name as product_category_name,
    z.zone_name as zone_name
    FROM wh_product_list  as wl
    LEFT JOIN zone as z on z.zone_id=wl.zone_id
    LEFT JOIN wh_product_category as wc on wc.product_category_id=wl.product_category_id
    WHERE wl.owner_id="'.$_SESSION['owner_id'].'" AND wl.product_stock_num >= "1"   AND wl.product_code LIKE "%'.$data['searchtext'].'%"
    OR wl.owner_id="'.$_SESSION['owner_id'].'" AND wl.product_stock_num >= "1" AND wl.product_name LIKE "%'.$data['searchtext'].'%"
    OR wl.owner_id="'.$_SESSION['owner_id'].'" AND wl.product_stock_num >= "1" AND z.zone_name LIKE "%'.$data['searchtext'].'%"
    OR wl.owner_id="'.$_SESSION['owner_id'].'" AND wl.product_stock_num >= "1" AND wc.product_category_name LIKE "%'.$data['searchtext'].'%"
    ORDER BY wl.product_stock_num ASC');


$query = $this->db->query('SELECT
    wl.product_id as product_id,
    wl.product_code as product_code,
    wl.product_name as product_name,
    wl.product_price as product_price,
    wl.product_wholesale_price as product_wholesale_price,
    wl.product_price_discount as product_price_discount,
    wl.product_stock_num as product_stock_num,
    wl.product_price_value as product_price_value,
    wc.product_category_id as product_category_id,
    wc.product_category_name as product_category_name,
    z.zone_name as zone_name
    FROM wh_product_list  as wl
    LEFT JOIN zone as z on z.zone_id=wl.zone_id
    LEFT JOIN wh_product_category as wc on wc.product_category_id=wl.product_category_id
    WHERE wl.owner_id="'.$_SESSION['owner_id'].'" AND wl.product_stock_num >= "1"   AND wl.product_code LIKE "%'.$data['searchtext'].'%"
    OR wl.owner_id="'.$_SESSION['owner_id'].'" AND wl.product_stock_num >= "1" AND wl.product_name LIKE "%'.$data['searchtext'].'%"
    OR wl.owner_id="'.$_SESSION['owner_id'].'" AND wl.product_stock_num >= "1" AND z.zone_name LIKE "%'.$data['searchtext'].'%"
    OR wl.owner_id="'.$_SESSION['owner_id'].'" AND wl.product_stock_num >= "1" AND wc.product_category_name LIKE "%'.$data['searchtext'].'%"
    ORDER BY wl.product_stock_num ASC  LIMIT '.$start.' , '.$perpage.'  ');



$encode_data = json_encode($query->result(),JSON_UNESCAPED_UNICODE );

$encode_data = json_encode($query->result(),JSON_UNESCAPED_UNICODE );


$num_rows = $querynum->num_rows();

$pageall = ceil($num_rows/$perpage);




$json = '{"list": '.$encode_data.',
"numall": '.$num_rows.',"perpage": '.$perpage.', "pageall": '.$pageall.'}';

return $json;

        }

















  public function Getstockmat($data)
        {


 $perpage = $data['perpage'];

            if($data['page'] && $data['page'] != ''){
$page = $data['page'];
            }else{
          $page = '1';
            }


            $start = ($page - 1) * $perpage;


$querynum = $this->db->query('SELECT
    wl.product_id as product_id,
    wl.product_code as product_code,
    wl.product_name as product_name,
    wl.product_wholesale_price as product_wholesale_price,
    wl.product_price_discount as product_price_discount,
    wl.product_stock_num as product_stock_num,
    wl.product_price_value as product_price_value
    FROM  product_material as pm
    LEFT JOIN wh_product_list  as wl on wl.product_id=pm.product_id_material
    WHERE wl.owner_id="'.$_SESSION['owner_id'].'"   AND wl.product_code LIKE "%'.$data['searchtext'].'%" OR wl.owner_id="'.$_SESSION['owner_id'].'" AND wl.product_name LIKE "%'.$data['searchtext'].'%"
    GROUP BY pm.product_id_material
    ORDER BY wl.product_stock_num ASC');


$query = $this->db->query('SELECT
    wl.product_id as product_id,
    wl.product_code as product_code,
    wl.product_name as product_name,
    wl.product_wholesale_price as product_wholesale_price,
    wl.product_price_discount as product_price_discount,
    wl.product_stock_num as product_stock_num,
    wl.product_price_value as product_price_value
    FROM  product_material as pm
    LEFT JOIN wh_product_list  as wl on wl.product_id=pm.product_id_material
    WHERE wl.owner_id="'.$_SESSION['owner_id'].'"   AND wl.product_code LIKE "%'.$data['searchtext'].'%" OR wl.owner_id="'.$_SESSION['owner_id'].'" AND wl.product_name LIKE "%'.$data['searchtext'].'%"
    GROUP BY pm.product_id_material
    ORDER BY wl.product_stock_num ASC  LIMIT '.$start.' , '.$perpage.'  ');



$encode_data = json_encode($query->result(),JSON_UNESCAPED_UNICODE );

$encode_data = json_encode($query->result(),JSON_UNESCAPED_UNICODE );


$num_rows = $querynum->num_rows();

$pageall = ceil($num_rows/$perpage);




$json = '{"list": '.$encode_data.',
"numall": '.$num_rows.',"perpage": '.$perpage.', "pageall": '.$pageall.'}';

return $json;

        }













   public function Updatematok($data)
        {


$where = array(
        'product_id'  => $data['product_id']
);

$this->db->where($where);
if ($this->db->update("wh_product_list", $data)){
        return true;
    }

}




public function Additemok($data)
     {

$this->db->query('UPDATE wh_product_list
           SET product_stock_num=product_stock_num + '.$data['product_stock_num'].'
           WHERE product_id="'.$data['product_id'].'" ');

}









    }
