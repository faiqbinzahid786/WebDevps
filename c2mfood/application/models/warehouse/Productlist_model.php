<?php

class Productlist_model extends CI_Model {



        public function __construct()
        {
                // Call the CI_Model constructor
                parent::__construct();
                $this->load->library('session');


        }

       public function Add($data)
        {

$data2['product_image'] = $data['product_image'];
$data2['product_code'] = $data['product_code'];
$data2['product_name'] = $data['product_name'];
$data2['product_price'] = $data['product_price'];
$data2['product_wholesale_price'] = $data['product_wholesale_price'];
$data2['product_pricebase'] = $data['product_pricebase'];
$data2['product_category_id'] = $data['product_category_id'];
//$data2['supplier_id'] = $data['supplier_id'];
$data2['owner_id'] = $_SESSION['owner_id'];
$data2['user_id'] = $_SESSION['user_id'];
$data2['store_id'] = $_SESSION['store_id'];
$data2['product_score'] = $data['product_score'];
//$data2['zone_id'] = $data['zone_id'];

if ($this->db->insert("wh_product_list", $data2)){
        return true;
    }

  }


           public function Update($data)
        {

$data2['product_code'] = $data['product_code'];
$data2['product_name'] = $data['product_name'];
$data2['product_image'] = $data['product_image'];
$data2['product_price'] = $data['product_price'];
$data2['product_wholesale_price'] = $data['product_wholesale_price'];
$data2['product_pricebase'] = $data['product_pricebase'];
$data2['product_category_id'] = $data['product_category_id'];
//$data2['supplier_id'] = $data['supplier_id'];
$data2['product_score'] = $data['product_score'];
//$data2['zone_id'] = $data['zone_id'];

$where = array(
        'owner_id' => $_SESSION['owner_id'],
        'product_id'  => $data['product_id']
);

$this->db->where($where);
if ($this->db->update("wh_product_list", $data2)){
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
    wl.product_id as product_id,
    wl.product_code as product_code,
    wl.product_name as product_name,
    wl.product_image as product_image,
    wl.product_price as product_price,
    wl.product_wholesale_price as product_wholesale_price,
    wl.product_pricebase as product_pricebase,
    wl.product_stock_num as product_stock_num,
    wl.product_price_value as product_price_value,
    wc.product_category_id as product_category_id,
    wc.product_category_name as product_category_name,
    sp.supplier_id as supplier_id,
    sp.supplier_name as supplier_name,
    z.zone_id as zone_id,
    z.zone_name as zone_name
    FROM wh_product_list  as wl
    LEFT JOIN wh_product_category as wc on wc.product_category_id=wl.product_category_id
    LEFT JOIN supplier as sp on sp.supplier_id=wl.supplier_id
    LEFT JOIN zone as z on z.zone_id=wl.zone_id
    WHERE wl.owner_id="'.$_SESSION['owner_id'].'"  AND wl.product_code LIKE "%'.$data['searchtext'].'%"
    OR wl.owner_id="'.$_SESSION['owner_id'].'" AND wl.product_name LIKE "%'.$data['searchtext'].'%"
    OR wl.owner_id="'.$_SESSION['owner_id'].'" AND wc.product_category_name="'.$data['searchtext'].'"
    ORDER BY wl.product_id DESC');


$query = $this->db->query('SELECT
    wl.product_id as product_id,
    wl.product_code as product_code,
    wl.product_name as product_name,
    wl.product_image as product_image,
    wl.product_price as product_price,
    wl.product_wholesale_price as product_wholesale_price,
    wl.product_score as product_score,
    wl.product_pricebase as product_pricebase,
    wl.product_stock_num as product_stock_num,
    wl.product_price_value as product_price_value,
    wc.product_category_id as product_category_id,
    wc.product_category_name as product_category_name,
    sp.supplier_id as supplier_id,
    sp.supplier_name as supplier_name,
    z.zone_id as zone_id,
    z.zone_name as zone_name,
    (SELECT count(*) FROM product_material as pm WHERE pm.product_id=wl.product_id) as material_num,
  (SELECT count(sd.potl_ID) FROM wh_product_other_list as sd WHERE sd.product_id=wl.product_id) as product_num_other
    FROM wh_product_list  as wl
    LEFT JOIN wh_product_category as wc on wc.product_category_id=wl.product_category_id
    LEFT JOIN supplier as sp on sp.supplier_id=wl.supplier_id
    LEFT JOIN zone as z on z.zone_id=wl.zone_id
    WHERE wl.owner_id="'.$_SESSION['owner_id'].'" AND wl.product_code LIKE "%'.$data['searchtext'].'%"
    OR wl.owner_id="'.$_SESSION['owner_id'].'" AND wl.product_name LIKE "%'.$data['searchtext'].'%"
    OR wl.owner_id="'.$_SESSION['owner_id'].'" AND wc.product_category_name="'.$data['searchtext'].'"
    ORDER BY wl.product_id DESC  LIMIT '.$start.' , '.$perpage.'  ');

$encode_data = json_encode($query->result(),JSON_UNESCAPED_UNICODE );


$num_rows = $querynum->num_rows();

$pageall = ceil($num_rows/$perpage);




$json = '{"list": '.$encode_data.',
"numall": '.$num_rows.',"perpage": '.$perpage.', "pageall": '.$pageall.'}';

return $json;

        }










    public function Delete($data)
        {

$query = $this->db->query('DELETE FROM wh_product_list  WHERE product_id="'.$data['product_id'].'" and  owner_id="'.$_SESSION['owner_id'].'"');
return true;

        }










          public function Getproduct($data)
        {




$query = $this->db->query('SELECT
*
FROM wh_product_list
    WHERE product_name LIKE "%'.$data['searchmattext'].'%"
    ORDER BY product_id DESC  LIMIT 3  ');

$encode_data = json_encode($query->result(),JSON_UNESCAPED_UNICODE );


echo $encode_data;

        }




 public function Getproductmaterial($data)
        {


$query = $this->db->query('SELECT
pm.m_id as m_id,
wl.product_name as product_name,
pm.num as num
FROM product_material as pm
LEFT JOIN wh_product_list as wl on wl.product_id=pm.product_id_material
WHERE pm.product_id="'.$data['product_id'].'"
    ORDER BY pm.m_id DESC');

$encode_data = json_encode($query->result(),JSON_UNESCAPED_UNICODE );


echo $encode_data;

        }






public function Addmaterial($data)
        {


if ($this->db->insert("product_material", $data)){
        return true;
    }

        }



public function Deletematerial($data)
        {

$query = $this->db->query('DELETE FROM product_material  WHERE m_id="'.$data['m_id'].'" ');
return true;

        }











                public function Searchpot($data)
             {

        $query = $this->db->query('SELECT *
         FROM wh_product_other
         WHERE product_ot_name LIKE "%'.$data['searchtext'].'%" AND show_all="0"
         ORDER BY pot_ID DESC  LIMIT 3  ');

        $encode_data = json_encode($query->result(),JSON_UNESCAPED_UNICODE );

        return $encode_data;

             }





             public function Getpotlist($data)
           {

             $query = $this->db->query('SELECT
               wol.potl_ID,
               wol.product_id,
               wol.pot_ID,
               wo.product_ot_name,
               wo.product_ot_price,
               wo.product_ot_image

             FROM wh_product_other_list as wol
             LEFT JOIN wh_product_other as wo on wo.pot_ID=wol.pot_ID
             WHERE wol.product_id="'.$data['product_id'].'"
             ORDER BY wol.potl_ID DESC');

           $encode_data = json_encode($query->result(),JSON_UNESCAPED_UNICODE );

           return $encode_data;

           }




           public function Getpotlistshowall($data)
         {

           $query = $this->db->query('SELECT *
           FROM wh_product_other
           WHERE show_all="1"
           ORDER BY pot_ID DESC');

         $encode_data = json_encode($query->result(),JSON_UNESCAPED_UNICODE );

         return $encode_data;

         }






           public function Addpot($data)
          {

        $this->db->insert("wh_product_other_list", $data);


          }





          public function Delpot($data)
        {
        $query1 = $this->db->query('DELETE FROM wh_product_other_list
          WHERE product_id="'.$data['product_id'].'" and  pot_ID="'.$data['pot_ID'].'"');


        }








    }
