<?php

class Salepage_model extends CI_Model {



        public function __construct()
        {
                // Call the CI_Model constructor
                parent::__construct();
                $this->load->library('session');


        }

        public function Openshiftnow($data)
               {
                 $data['shift_start_time'] = time();
                 $data['user_id'] = $_SESSION['user_id'];
                 $data['user_name'] = $_SESSION['name'];
                 if ($this->db->insert("shift", $data)){

                   $query = $this->db->query('SELECT
                   shift_id,shift_start_time,shift_end_time,user_id
                   FROM shift WHERE shift_start_time="'.$data['shift_start_time'].'" LIMIT 1 ');

                  //print_r($query->result_array());
                  $shift_id = $query->result_array();
//echo $shift_id[0]['shift_id'];

                  $newdata = array(
                    'shift_id' => $shift_id[0]['shift_id'],
                    'shift_start_time' => $shift_id[0]['shift_start_time'],
                    'shift_end_time' => $shift_id[0]['shift_end_time'],
                    'shift_user_id' => $shift_id[0]['user_id']
                  );

                  $this->session->set_userdata($newdata);


                     }


               }




               public function Confirmcloseshiftnow($data)
              {
      $query = $this->db->query('UPDATE shift
          SET shift_end_time='.time().',shift_money_end="'.$data['shift_money_end'].'"
          WHERE shift_id="'.$_SESSION['shift_id'].'" ');



 $queryshiftend = $this->db->query('SELECT
 shift_id,shift_start_time,shift_end_time,shift_money_start,shift_money_end
FROM shift WHERE shift_id="'.$_SESSION['shift_id'].'" LIMIT 1 ');
$shift_end = $queryshiftend->result_array();



          $newdata = array(
            'shift_id_old' => $shift_end[0]['shift_id'],
            'shift_start_time_old' => date('d/m/Y H:i:s', $shift_end[0]['shift_start_time']),
            'shift_end_time_old' => date('d/m/Y H:i:s', $shift_end[0]['shift_end_time']),
            'shift_money_start_old' => $shift_end[0]['shift_money_start'],
            'shift_money_end_old' => $shift_end[0]['shift_money_end'],
          );

          $this->session->set_userdata($newdata);


      $this->session->unset_userdata('shift_id','shift_start_time','shift_end_time');


              }





 public function Checkadminpass($data)
        {

        $query =  $this->db->get_where('user_owner' , array('user_type' => '4' , 'user_password' => $data['adminpass']));

    $count_row = $query->num_rows();

return $count_row;


        }




 public function Getrunnolast()
        {

$query = $this->db->query('SELECT sale_runno
    FROM sale_list_header
    WHERE owner_id="'.$_SESSION['owner_id'].'"
    ORDER BY ID DESC LIMIT 1');
$encode_data = $query->result_array();
return $encode_data;


        }

           public function Getproductlist()
        {

$query = $this->db->query('SELECT
    wl.product_id as product_id,
    wl.product_code as product_code,
    wl.product_name as product_name,
    wl.product_score as product_score,
    wl.product_image as product_image,
    wl.product_price as product_price,
    wl.product_wholesale_price as product_wholesale_price,
    wl.product_price_discount as product_price_discount,
    wl.product_stock_num as product_stock_num,
    wl.product_price_value as product_price_value,
    wc.product_category_id as product_category_id,
    wc.product_category_name as product_category_name,
    wl.product_rank as product_rank
    FROM wh_product_list  as wl
    LEFT JOIN wh_product_category as wc on wc.product_category_id=wl.product_category_id
    WHERE wl.owner_id="'.$_SESSION['owner_id'].'" AND wl.product_rank !="0"
    ORDER BY wl.product_rank ASC');
$encode_data = json_encode($query->result(),JSON_UNESCAPED_UNICODE );
return $encode_data;

        }


          public function Getproductlistcat($data)
        {

$query = $this->db->query('SELECT
    wl.product_id as product_id,
    wl.product_code as product_code,
    wl.product_name as product_name,
    wl.product_score as product_score,
    wl.product_image as product_image,
    wl.product_price as product_price,
    wl.product_price_discount as product_price_discount,
    wl.product_stock_num as product_stock_num,
    wl.product_price_value as product_price_value,
    wc.product_category_id as product_category_id,
    wc.product_category_name as product_category_name,
    wl.product_rank as product_rank
    FROM wh_product_list  as wl
    LEFT JOIN wh_product_category as wc on wc.product_category_id=wl.product_category_id
    WHERE wl.owner_id="'.$_SESSION['owner_id'].'" AND wc.product_category_id="'.$data['product_category_id'].'"
    ORDER BY wl.product_id DESC');
$encode_data = json_encode($query->result(),JSON_UNESCAPED_UNICODE );
return $encode_data;

        }




        public function Openbillclosedaylist_product($data)
               {

        $query = $this->db->query('SELECT
          wl.product_name as product_name2,
           wl.product_category_id as product_category_id2,
           sum(sd.product_sale_num*(sd.product_price-sd.product_price_discount)) as product_price2,
           sum(sd.product_sale_num) as product_sale_num2,
           sum(sd.product_price_discount) as product_price_discount2
           FROM sale_list_datail  as sd
           LEFT JOIN wh_product_list as wl on sd.product_id=wl.product_id

            WHERE sd.shift_id="'.$_SESSION['shift_id_old'].'"
            GROUP BY sd.product_id DESC
            ');


        $encode_data = json_encode($query->result(),JSON_UNESCAPED_UNICODE );

        return $encode_data;

               }




 public function Openbillclosedaylista($data)
        {

//$dayfrom = strtotime($data['daynow']);
//$dayto = strtotime($data['daynow'])+86400;

$query = $this->db->query('SELECT
    wc.product_category_name as product_category_name2,
    wc.product_category_id as product_category_id2,
    sum(sd.product_sale_num*(sd.product_price-sd.product_price_discount)) as product_price2,
    sum(sd.product_sale_num) as product_sale_num2,
    sum(sd.product_price_discount) as product_price_discount2
    FROM wh_product_category  as wc
    LEFT JOIN wh_product_list as wl on wl.product_category_id=wc.product_category_id
    LEFT JOIN sale_list_datail as sd on sd.product_id=wl.product_id

     WHERE sd.shift_id="'.$_SESSION['shift_id_old'].'"
     GROUP BY wc.product_category_name
     ');


$encode_data = json_encode($query->result(),JSON_UNESCAPED_UNICODE );

return $encode_data;

        }




        public function Openbillclosedaylistb($data)
        {
//$dayfrom = strtotime($data['daynow']);
//$dayto = strtotime($data['daynow'])+86400;

$query2 = $this->db->query('SELECT
    sum(sumsale_price) as sumsale_price2,
    sum(sumsale_discount) as sumsale_discount2,
    sum(sumsale_num) as sumsale_num2,
    sum(discount_last) as discount_last2
    FROM sale_list_header
WHERE shift_id="'.$_SESSION['shift_id_old'].'"
     ');

$encode_data2 = json_encode($query2->result(),JSON_UNESCAPED_UNICODE );
return $encode_data2;

        }





        public function Openbillclosedaylistc($data)
        {
//$dayfrom = strtotime($data['daynow']);
//$dayto = strtotime($data['daynow'])+86400;

$query3 = $this->db->query('SELECT
    pay_type,
    sum(sumsale_price) as sumsale_price2,
    sum(sumsale_discount) as sumsale_discount2,
    sum(sumsale_num) as sumsale_num2,
    sum(discount_last) as discount_last2
    FROM sale_list_header

    WHERE shift_id="'.$_SESSION['shift_id_old'].'"
     GROUP BY pay_type
     ');

$encode_data3 = json_encode($query3->result(),JSON_UNESCAPED_UNICODE );

return $encode_data3;

        }





 public function Searchproductlist($data)
        {

$query = $this->db->query('SELECT
    wl.product_id as product_id,
    wl.product_code as product_code,
    wl.product_name as product_name,
    wl.product_score as product_score,
    wl.product_image as product_image,
    wl.product_price as product_price,
    wl.product_wholesale_price as product_wholesale_price,
    wl.product_price_discount as product_price_discount,
    wl.product_stock_num as product_stock_num,
    wl.product_price_value as product_price_value,
    wc.product_category_id as product_category_id,
    wc.product_category_name as product_category_name,
    wl.product_rank as product_rank
    FROM wh_product_list  as wl
    LEFT JOIN wh_product_category as wc on wc.product_category_id=wl.product_category_id
    WHERE wl.owner_id="'.$_SESSION['owner_id'].'" AND wl.product_name LIKE "%'.$data['searchproduct'].'%"
    ORDER BY wl.product_id DESC');
$encode_data = json_encode($query->result(),JSON_UNESCAPED_UNICODE );
return $encode_data;

        }





        public function Findproduct($data)
        {

$query_p_cus = $this->db->query('SELECT *
    FROM product_price_cus
    WHERE owner_id="'.$_SESSION['owner_id'].'" AND cus_id="'.$data['cus_id'].'" AND product_code="'.$data['product_code'].'"
    ORDER BY product_id DESC');




$query = $this->db->query('SELECT
    wl.product_id as product_id,
    wl.product_code as product_code,
    wl.product_name as product_name,
    wl.product_score as product_score,
    wl.product_price as product_price,
    wl.product_wholesale_price as product_wholesale_price,
    wl.product_price_discount as product_price_discount,
    wl.product_stock_num as product_stock_num,
    wl.product_price_value as product_price_value,
    wc.product_category_id as product_category_id,
    wc.product_category_name as product_category_name
    FROM wh_product_list  as wl
    LEFT JOIN wh_product_category as wc on wc.product_category_id=wl.product_category_id
    WHERE wl.owner_id="'.$_SESSION['owner_id'].'" AND  wl.product_code="'.$data['product_code'].'"
    ORDER BY wl.product_id DESC');



$query_p = $this->db->query('SELECT
    wl.product_id as product_id,
    wl.product_code as product_code,
    wl.product_name as product_name,
    wl.product_score as product_score,
    pc.product_price_cus as product_price,
    wl.product_wholesale_price as product_wholesale_price,
    wl.product_price_discount as product_price_discount,
    wl.product_stock_num as product_stock_num,
    wl.product_price_value as product_price_value,
    wc.product_category_id as product_category_id,
    wc.product_category_name as product_category_name
    FROM wh_product_list  as wl
    LEFT JOIN product_price_cus as pc on pc.product_id=wl.product_id
    LEFT JOIN wh_product_category as wc on wc.product_category_id=wl.product_category_id
    WHERE wl.owner_id="'.$_SESSION['owner_id'].'" AND  wl.product_code="'.$data['product_code'].'" AND pc.cus_id="'.$data['cus_id'].'"
    ORDER BY wl.product_id DESC');


$query_p_cus_num_rows = $query_p_cus->num_rows();


if($query_p_cus_num_rows > 0){

  $encode_data = json_encode($query_p->result(),JSON_UNESCAPED_UNICODE );

}else{
   $encode_data = json_encode($query->result(),JSON_UNESCAPED_UNICODE );

}



return $encode_data;

        }





  public function Customer($data)
        {

$query = $this->db->query('SELECT  co.cus_id as cus_id,
  co.cus_name as cus_name, co.cus_tel as cus_tel,
  co.cus_address as cus_address,
  co.wallet as wallet,
co.product_score_all as product_score_all,

  co.cus_address_postcode as cus_address_postcode,
  co.cus_add_time as cus_add_time
    FROM customer_owner as co
    LEFT JOIN owner as ow on ow.owner_id=co.owner_id

    WHERE ow.owner_id="'.$_SESSION['owner_id'].'" and co.cus_name LIKE "%'.$data['cus_name'].'%"
    OR ow.owner_id="'.$_SESSION['owner_id'].'" and co.cus_add_time LIKE "%'.$data['cus_name'].'%"
    OR ow.owner_id="'.$_SESSION['owner_id'].'" and co.cus_tel LIKE "%'.$data['cus_name'].'%"
    ORDER BY co.cus_id DESC LIMIT 5');

$encode_data = json_encode($query->result(),JSON_UNESCAPED_UNICODE );
return $encode_data;

        }



        public function Addwalletconfirm($data)
                {

        $data2['money_add'] = $data['wallet'];
        $data2['add_time'] = time();
        $data2['cus_id'] = $data['cus_id'];
        $data2['user_id'] = $_SESSION['user_id'];
        $data2['shift_id'] = $_SESSION['shift_id'];





        if ($this->db->insert("customer_add_wallet", $data2)){

          $this->db->query('UPDATE customer_owner
              SET wallet=wallet + '.$data['wallet'].' WHERE cus_id="'.$data['cus_id'].'" and  owner_id="'.$_SESSION['owner_id'].'"');



                return true;
            }

          }









          public function Useproductpoint($data)
                  {

          $data['user_id'] = $_SESSION['user_id'];
          $data['shift_id'] = $_SESSION['shift_id'];
          $data['add_time'] = time();

          if ($this->db->insert("customer_use_point_gift_list", $data)){

            $this->db->query('UPDATE customer_owner
                SET product_score_all=product_score_all - '.$data['point_use'].'
                WHERE cus_id="'.$data['cus_id'].'" and  owner_id="'.$_SESSION['owner_id'].'"');




                  return true;
              }

            }








public function Adddetail($data)
        {

$data['owner_id'] = $_SESSION['owner_id'];
$data['user_id'] = $_SESSION['user_id'];
$data['store_id'] = $_SESSION['store_id'];
$data['shift_id'] = $_SESSION['shift_id'];

if ($this->db->insert("sale_list_datail", $data)){
        return true;
    }

  }


      public function Addheader($data)
        {
$data2['table_id'] = $data['table_id'];
$data2['table_name'] = $data['table_name'];
$data2['cus_name'] = $data['cus_name'];
    $data2['cus_id'] = $data['cus_id'];
    $data2['cus_address_all'] = $data['cus_address_all'];
    $data2['sumsale_discount'] = $data['sumsale_discount'];
    $data2['sumsale_num '] = $data['sumsale_num'];
    $data2['sumsale_price'] = $data['sumsale_price'];
    $data2['money_from_customer'] =  $data['money_from_customer'];
    $data2['money_changeto_customer'] = $data['money_changeto_customer'];
    $data2['vat'] = $data['vat'];
    $data2['product_score_all'] = $data['product_score_all'];
    $data2['sale_runno'] = $data['sale_runno'];
    $data2['adddate'] = $data['adddate'];

    $data2['sale_type'] = $data['sale_type'];
    $data2['pay_type'] = $data['pay_type'];
    $data2['reserv'] = $data['reserv'];
    $data2['discount_last'] = $data['discount_last'];

$data2['owner_id'] = $_SESSION['owner_id'];
$data2['user_id'] = $_SESSION['user_id'];
$data2['store_id'] = $_SESSION['store_id'];
$data2['shift_id'] = $_SESSION['shift_id'];

if ($this->db->insert("sale_list_header", $data2)){

$this->db->query('UPDATE customer_owner
    SET product_score_all=product_score_all + '.$data2['product_score_all'].' WHERE cus_id="'.$data2['cus_id'].'" and  owner_id="'.$_SESSION['owner_id'].'"');


    $querysetzero = $this->db->query('UPDATE food_table
    SET food_table_status="0"
    WHERE food_table_id="'.$data['table_id'].'"');

    $querysetzero = $this->db->query('UPDATE food_table
    SET food_table_opentime=""
    WHERE food_table_id="'.$data['table_id'].'"');






if($data2['pay_type']=='6'){
    $usewallet['shift_id'] = $_SESSION['shift_id'];
    $usewallet['user_id'] = $_SESSION['user_id'];
    $usewallet['cus_id'] = $data2['cus_id'];
    $usewallet['add_time'] = time();
    $usewallet['money_use'] = $data2['money_from_customer'];
    $usewallet['sale_runno'] = $data2['sale_runno'];
    $this->db->insert("customer_use_wallet", $usewallet);

    $delwalletofcus = $this->db->query('UPDATE customer_owner
    SET wallet=wallet - '.$data2['money_from_customer'].'
    WHERE cus_id="'.$data2['cus_id'].'"
    and  owner_id="'.$_SESSION['owner_id'].'"');
}


if($data2['cus_id']!='0'){

$query_mpr = $this->db->query('SELECT * FROM money_to_point_rule ORDER BY id DESC');
$data_mpr = $query_mpr->result_array();


$cusaddpoint = (($data2['sumsale_price']-$data2['discount_last'])*$data_mpr[0]['point_will'])/$data_mpr[0]['cus_money_if'];

$this->db->query('UPDATE customer_owner
    SET product_score_all=product_score_all + '.ceil($cusaddpoint).'
    WHERE cus_id="'.$data2['cus_id'].'" and  owner_id="'.$_SESSION['owner_id'].'"');


}






    }



}


         public function Updateproductdeletestock($data2)
        {
$price_value = $data2['product_sale_num'] * $data2['product_price'];
$query = $this->db->query('UPDATE wh_product_list
    SET product_stock_num=product_stock_num - '.$data2['product_sale_num'].'
    WHERE product_id="'.$data2['product_id'].'" and  owner_id="'.$_SESSION['owner_id'].'"');
return true;

        }



 public function Productmaterialdeletestock($product_id,$num)
        {

$query = $this->db->query('UPDATE wh_product_list
    SET product_stock_num=product_stock_num - '.$num.'
    WHERE product_id="'.$product_id.'"');
return true;

        }





        public function Productmaterialaddstock($product_id,$num)
        {

$query = $this->db->query('UPDATE wh_product_list
    SET product_stock_num=product_stock_num + '.$num.'
    WHERE product_id="'.$product_id.'"');
return true;

        }


 public function Getproductformat($data)
        {

$query = $this->db->query('SELECT product_id_material,num FROM product_material
    WHERE product_id="'.$data['product_id'].'"');
return $query->result_array();

        }





        public function Shiftclose_addwallet($data)
               {

       $query = $this->db->query('SELECT
         sum(money_add) as money_add
         FROM customer_add_wallet
           WHERE shift_id="'.$_SESSION['shift_id_old'].'"');

       $encode_data = json_encode($query->result(),JSON_UNESCAPED_UNICODE );
       return $encode_data;
               }






 public function Addproductranksave($data)
        {

$query = $this->db->query('UPDATE wh_product_list
    SET product_rank='.$data['product_rank'].'
    WHERE product_id="'.$data['product_id'].'" ');
return true;

        }


 public function Delproductranksave($data)
        {

$query = $this->db->query('UPDATE wh_product_list
    SET product_rank="0"
    WHERE product_id="'.$data['product_id'].'" ');
return true;

        }








public function Gettoday($data)
        {


 $perpage = $data['perpage'];

            if($data['page'] && $data['page'] != ''){
$page = $data['page'];
            }else{
          $page = '1';
            }


            $start = ($page - 1) * $perpage;

$today = date('d-m-Y',time());

$querynum = $this->db->query('SELECT *, from_unixtime(adddate,"%d-%m-%Y %H:%i:%s") as adddate
    FROM sale_list_header
    WHERE owner_id="'.$_SESSION['owner_id'].'" AND shift_id="'.$_SESSION['shift_id'].'" AND sale_runno LIKE "%'.$data['searchtext'].'%"
    ORDER BY ID DESC LIMIT 30');


$query = $this->db->query('SELECT *,sh.product_score_all as product_score_all,cw.product_score_all as cus_score, from_unixtime(adddate,"%d-%m-%Y %H:%i:%s") as adddate
    FROM sale_list_header as sh
    LEFT JOIN customer_owner as cw on cw.cus_id=sh.cus_id
    WHERE sh.owner_id="'.$_SESSION['owner_id'].'" AND sh.shift_id="'.$_SESSION['shift_id'].'" AND sh.sale_runno LIKE "%'.$data['searchtext'].'%"
    ORDER BY sh.ID DESC LIMIT '.$start.' , '.$perpage.' ');
$encode_data = json_encode($query->result(),JSON_UNESCAPED_UNICODE );


$num_rows = $querynum->num_rows();

$pageall = ceil($num_rows/$perpage);




$json = '{"list": '.$encode_data.',
"numall": '.$num_rows.',"perpage": '.$perpage.', "pageall": '.$pageall.'}';

return $json;


        }




public function Addproductlisttable($data)
        {

$data['owner_id'] = $_SESSION['owner_id'];
$data['user_id'] = $_SESSION['user_id'];
$data['store_id'] = $_SESSION['store_id'];
$data['adddate'] = time();
if ($this->db->insert("sale_list_table", $data)){


$this->db->insert("sale_list_order", $data);


$query = $this->db->query('SELECT  MAX(st.s_ID) as s_ID,
    st.product_id,
    st.owner_id,
    st.product_code,
    st.product_name,
    st.product_score,
    st.note_order,
    st.store_id,
    st.table_id,
    st.user_id,
    st.status,
     sum(st.product_sale_num) as product_sale_num,
    st.product_price,
    st.product_price_discount,
    (SELECT count(*) FROM sale_list_order as so WHERE so.product_id=st.product_id and so.table_id=st.table_id AND so.s_ID=MAX(st.s_ID)) as so_order
    FROM sale_list_table as st
    WHERE st.owner_id="'.$_SESSION['owner_id'].'"
        AND st.table_id="'.$data['table_id'].'"
         GROUP BY st.product_name
      ORDER BY st.s_ID ASC ');

$encode_data = json_encode($query->result(),JSON_UNESCAPED_UNICODE );
return $encode_data;


    }

  }




public function Editpushsavetable($data)
        {


$querydel = $this->db->query('DELETE FROM sale_list_table
    WHERE owner_id="'.$_SESSION['owner_id'].'"
        AND table_id="'.$data['table_id'].'"
        AND s_ID="'.$data['s_ID'].'"
        AND product_id="'.$data['product_id'].'"');



$data['owner_id'] = $_SESSION['owner_id'];
$data['user_id'] = $_SESSION['user_id'];
$data['store_id'] = $_SESSION['store_id'];
$data['adddate'] = time();
if ($this->db->insert("sale_list_table", $data)){



  $querymoveorder_kitchen = $this->db->query('UPDATE sale_list_order_kitchen
                        SET note_order="'.$data['note_order'].'"
                        WHERE product_id="'.$data['product_id'].'"
                        AND s_ID="'.$data['s_ID'].'"
                        AND  owner_id="'.$_SESSION['owner_id'].'"');




$query = $this->db->query('SELECT  MAX(st.s_ID),
    st.product_id,
    st.owner_id,
    st.product_code,
    st.product_name,
    st.product_score,
    st.note_order,
    st.store_id,
    st.table_id,
    st.user_id,
    st.status,
     sum(st.product_sale_num) as product_sale_num,
    st.product_price,
    st.product_price_discount,
    (SELECT count(*) FROM sale_list_order as so WHERE so.product_id=st.product_id and so.table_id=st.table_id AND so.s_ID=MAX(st.s_ID)) as so_order
    FROM sale_list_table as st
    WHERE st.owner_id="'.$_SESSION['owner_id'].'"
        AND st.table_id="'.$data['table_id'].'"
         GROUP BY st.product_name
      ORDER BY st.s_ID ASC ');


$encode_data = json_encode($query->result(),JSON_UNESCAPED_UNICODE );
return $encode_data;

}


  }








public function Getproductlistorder($data)
        {


$query = $this->db->query('SELECT  so.s_ID,
    so.product_id,
    so.owner_id,
    so.product_code,
    so.product_name,
    so.product_score,
    so.note_order,
    so.store_id,
    so.table_id,
    so.user_id,
    uo.name,
     sum(so.product_sale_num) as product_sale_num,
    so.product_price,
    so.product_price_discount,
    t.food_table_name,
    so.note_order,
    wc.printer_ip,
    wl.product_category_id,
    from_unixtime(so.adddate,"%d-%m-%Y %H:%i:%s") as adddate
    FROM sale_list_order as so
    LEFT JOIN food_table as t on t.food_table_id=so.table_id
    LEFT JOIN wh_product_list as wl on wl.product_id=so.product_id
    LEFT JOIN wh_product_category as wc on wc.product_category_id=wl.product_category_id
    LEFT JOIN user_owner as uo on uo.user_id=so.user_id
    WHERE so.owner_id="'.$_SESSION['owner_id'].'"
        AND so.table_id="'.$data['table_id'].'"
         GROUP BY so.product_name
      ORDER BY so.s_ID ASC ');


$encode_data = json_encode($query->result(),JSON_UNESCAPED_UNICODE );
return $encode_data;


  }



public function Getproductlistorder_cat($data)
        {


$query = $this->db->query('SELECT
    wl.product_category_id,
    wc.product_category_name
    FROM sale_list_order as so
    LEFT JOIN food_table as t on t.food_table_id=so.table_id
    LEFT JOIN wh_product_list as wl on wl.product_id=so.product_id
    LEFT JOIN wh_product_category as wc on wc.product_category_id=wl.product_category_id
    WHERE so.owner_id="'.$_SESSION['owner_id'].'"
        AND so.table_id="'.$data['table_id'].'"
         GROUP BY wl.product_category_id
      ORDER BY so.s_ID ASC ');


$encode_data = json_encode($query->result(),JSON_UNESCAPED_UNICODE );
return $encode_data;


  }




  public function Printproductlisttable($data)
        {

          if($data['savesale']=='0'){

  $this->db->query('INSERT INTO sale_list_order_kitchen
     (s_ID,product_id,product_name,product_code,product_price,product_sale_num,product_price_discount,
     product_score,note_order,adddate,owner_id,user_id,store_id,table_id)
    select * from sale_list_order
where owner_id = "'.$_SESSION['owner_id'].'" AND table_id="'.$data['table_id'].'"
    ');

    $this->db->query('DELETE FROM sale_list_order
        WHERE owner_id="'.$_SESSION['owner_id'].'"
            AND table_id="'.$data['table_id'].'"');

}





if($data['savesale']=='1'){

  $this->db->query('DELETE FROM sale_list_order_kitchen
      WHERE owner_id="'.$_SESSION['owner_id'].'"
          AND table_id="'.$data['table_id'].'"');

          $this->db->query('DELETE FROM sale_list_order
              WHERE owner_id="'.$_SESSION['owner_id'].'"
                  AND table_id="'.$data['table_id'].'"');

                  $this->db->query('DELETE FROM sale_list_table
                      WHERE owner_id="'.$_SESSION['owner_id'].'"
                          AND table_id="'.$data['table_id'].'"');
}




$query = $this->db->query('SELECT  MAX(st.s_ID),
    st.product_id,
    st.owner_id,
    st.product_code,
    st.product_name,
    st.product_score,
    st.note_order,
    st.store_id,
    st.table_id,
    st.user_id,
    st.status,
     sum(st.product_sale_num) as product_sale_num,
    st.product_price,
    st.product_price_discount,
    (SELECT count(*) FROM sale_list_order as so WHERE so.product_id=st.product_id and so.table_id=st.table_id AND so.s_ID=MAX(st.s_ID)) as so_order
    FROM sale_list_table as st
    WHERE st.owner_id="'.$_SESSION['owner_id'].'"
        AND st.table_id="'.$data['table_id'].'"
         GROUP BY st.product_name
      ORDER BY st.s_ID ASC ');


$encode_data = json_encode($query->result(),JSON_UNESCAPED_UNICODE );
return $encode_data;


  }





  public function Checkproductlisttable($data)
        {

$query = $this->db->query('SELECT  count(*) as check_order
    FROM sale_list_order
    WHERE owner_id="'.$_SESSION['owner_id'].'"
        AND table_id="'.$data['table_id'].'"');


$encode_data = json_encode($query->result(),JSON_UNESCAPED_UNICODE );
return $encode_data;


  }






public function Delproductlisttable($data)
        {


$querydel = $this->db->query('DELETE FROM sale_list_table
    WHERE owner_id="'.$_SESSION['owner_id'].'"
        AND table_id="'.$data['table_id'].'"
        AND s_ID="'.$data['s_ID'].'"
        AND product_id="'.$data['product_id'].'"');



$querydelorder = $this->db->query('DELETE FROM sale_list_order
    WHERE owner_id="'.$_SESSION['owner_id'].'"
        AND table_id="'.$data['table_id'].'"
        AND s_ID="'.$data['s_ID'].'"
        AND product_id="'.$data['product_id'].'"');

$querydelorderkitchen = $this->db->query('DELETE FROM sale_list_order_kitchen
            WHERE owner_id="'.$_SESSION['owner_id'].'"
                AND table_id="'.$data['table_id'].'"
                AND s_ID="'.$data['s_ID'].'"
                AND product_id="'.$data['product_id'].'"');










$query = $this->db->query('SELECT  MAX(st.s_ID) as s_ID,
    st.product_id,
    st.owner_id,
    st.product_code,
    st.product_name,
    st.product_score,
    st.note_order,
    st.store_id,
    st.table_id,
    st.user_id,
    st.status,
     sum(st.product_sale_num) as product_sale_num,
    st.product_price,
    st.product_price_discount,
    (SELECT count(*) FROM sale_list_order as so WHERE so.product_id=st.product_id and so.table_id=st.table_id AND so.s_ID=MAX(st.s_ID)) as so_order
    FROM sale_list_table as st
    WHERE st.owner_id="'.$_SESSION['owner_id'].'"
        AND st.table_id="'.$data['table_id'].'"
         GROUP BY st.product_name
      ORDER BY st.s_ID ASC ');






if($querydelorderkitchen && $querydel && $querydelorder){
      //add to log delete  order
                      $data2['product_id'] = $data['product_id'];
                      $data2['table_name'] = $data['table_name'];
                      $data2['product_name'] = $data['product_name'];
                      $data2['name'] = $_SESSION['name'];
                      $data2['adddate'] = time();
                      $this->db->insert("log_delete_order", $data2);
      //


$encode_data = json_encode($query->result(),JSON_UNESCAPED_UNICODE );
return $encode_data;

}




  }








public function Delallproductlisttable($data)
        {


$querydel = $this->db->query('DELETE FROM sale_list_table
    WHERE owner_id="'.$_SESSION['owner_id'].'"
        AND table_id="'.$data['table_id'].'"');

$query = $this->db->query('SELECT  *
    FROM sale_list_table
    WHERE owner_id="'.$_SESSION['owner_id'].'"
        AND table_id="'.$data['table_id'].'"
      ORDER BY s_ID ASC ');

$encode_data = json_encode($query->result(),JSON_UNESCAPED_UNICODE );
return $encode_data;


  }



public function Moveproductlisttable($data)
        {

    $querymoveorder = $this->db->query('UPDATE sale_list_order
              SET table_id='.$data['new_table_id'].'
              WHERE table_id="'.$data['old_table_id'].'"
              AND  owner_id="'.$_SESSION['owner_id'].'"');


  $querymoveorder_kitchen = $this->db->query('UPDATE sale_list_order_kitchen
                        SET table_id='.$data['new_table_id'].'
                        WHERE table_id="'.$data['old_table_id'].'"
                        AND  owner_id="'.$_SESSION['owner_id'].'"');


$querymove = $this->db->query('UPDATE sale_list_table
    SET table_id='.$data['new_table_id'].'
    WHERE table_id="'.$data['old_table_id'].'"
    AND  owner_id="'.$_SESSION['owner_id'].'"');

$query = $this->db->query('SELECT  *
    FROM sale_list_table
    WHERE owner_id="'.$_SESSION['owner_id'].'"
        AND table_id="'.$data['new_table_id'].'"
      ORDER BY s_ID ASC ');

$encode_data = json_encode($query->result(),JSON_UNESCAPED_UNICODE );
return $encode_data;


  }



  public function Getproductlisttable($data)
        {

$query = $this->db->query('SELECT  MAX(st.s_ID) as s_ID,
    st.product_id,
    st.owner_id,
    st.product_code,
    st.product_name,
    st.product_score,
    st.note_order,
    st.store_id,
    st.table_id,
    st.user_id,
    st.status,
     sum(st.product_sale_num) as product_sale_num,
    st.product_price,
    st.product_price_discount,
    (SELECT count(*) FROM sale_list_order as so WHERE so.product_id=st.product_id AND so.table_id=st.table_id AND so.s_ID=MAX(st.s_ID)) as so_order
    FROM sale_list_table as st
    WHERE st.owner_id="'.$_SESSION['owner_id'].'"
        AND st.table_id="'.$data['table_id'].'"
         GROUP BY LOWER(st.product_name)
      ORDER BY st.s_ID ASC ');

$encode_data = json_encode($query->result(),JSON_UNESCAPED_UNICODE );
return $encode_data;


  }









  public function Settablestatusone($data)
  {

  $query = $this->db->query('UPDATE food_table
  SET food_table_status="1"
  WHERE food_table_id="'.$data['food_table_id'].'"');
  return true;

  }



  public function Settablesopentime($data)
  {

$querysetzero = $this->db->query('UPDATE food_table
      SET food_table_opentime="'.time().'"
      WHERE food_table_id="'.$data['table_id'].'"');
  return true;

  }













    }
