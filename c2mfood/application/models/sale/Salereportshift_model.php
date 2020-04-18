<?php

class Salereportshift_model extends CI_Model {



        public function __construct()
        {
                // Call the CI_Model constructor
                parent::__construct();
                $this->load->library('session');


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


$querynum = $this->db->query('SELECT *
    FROM shift');


$query = $this->db->query('SELECT
  s.shift_id as shift_id,
  s.user_name as user_name,
  from_unixtime(shift_start_time,"%d-%m-%Y %H:%i:%s") as shift_start_time,
  from_unixtime(shift_end_time,"%d-%m-%Y %H:%i:%s") as shift_end_time,
  s.shift_money_start as shift_money_start,
  s.shift_money_end as shift_money_end,
  sum(sh.sumsale_price) as sumsale_price,
  sum(sh.discount_last) as discount_last,
  sum(sh.sumsale_num) as sumsale_num,
  (SELECT sum(slh.sumsale_price-slh.discount_last) FROM sale_list_header as slh WHERE slh.pay_type="1" AND slh.shift_id=s.shift_id) as cash,
(SELECT sum(slh.sumsale_price-slh.discount_last) FROM sale_list_header as slh WHERE slh.pay_type="3" AND slh.shift_id=s.shift_id) as creditcard,
(SELECT sum(slh.sumsale_price-slh.discount_last) FROM sale_list_header as slh WHERE slh.pay_type="5" AND slh.shift_id=s.shift_id) as qrpayment,
(SELECT sum(slh.sumsale_price-slh.discount_last) FROM sale_list_header as slh WHERE slh.pay_type="6" AND slh.shift_id=s.shift_id) as usewallet,
(SELECT sum(caw.money_add) FROM customer_add_wallet as caw WHERE caw.shift_id=s.shift_id) as addwallet
    FROM shift as s
    LEFT JOIN sale_list_header as sh on sh.shift_id=s.shift_id
    WHERE s.user_name LIKE "%'.$data['searchtext'].'%"
    GROUP BY sh.shift_id
    ORDER BY s.shift_id DESC LIMIT '.$start.' , '.$perpage.' ');

$encode_data = json_encode($query->result(),JSON_UNESCAPED_UNICODE );


$num_rows = $querynum->num_rows();

$pageall = ceil($num_rows/$perpage);




$json = '{"list": '.$encode_data.',
"numall": '.$num_rows.',"perpage": '.$perpage.', "pageall": '.$pageall.'}';

return $json;


        }














        public function Getproductinshift($data)
                {


        $query = $this->db->query('SELECT  *,
          sd.product_name as product_name_ok,
          SUM(sd.product_sale_num) as sale_num,
          SUM(sd.product_price*sd.product_sale_num) as price,
          SUM(sd.product_price_discount*sd.product_sale_num) as price_discount,
          SUM((sd.product_price*sd.product_sale_num)-(sd.product_price_discount*sd.product_sale_num)) as sumprice
            FROM sale_list_datail as sd
            LEFT JOIN wh_product_list as wl on wl.product_id=sd.product_id
            LEFT JOIN wh_product_category as wc on wc.product_category_id=wl.product_category_id
            WHERE sd.shift_id="'.$data['shift_id'].'"
                 GROUP BY sd.product_name
              ORDER BY sd.ID DESC ');


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

                      WHERE sd.shift_id="'.$data['shift_id'].'"
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

               WHERE sd.shift_id="'.$data['shift_id'].'"
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
          WHERE shift_id="'.$data['shift_id'].'"
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

              WHERE shift_id="'.$data['shift_id'].'"
               GROUP BY pay_type
               ');

          $encode_data3 = json_encode($query3->result(),JSON_UNESCAPED_UNICODE );

          return $encode_data3;

                  }







                  public function Shiftclose_addwallet($data)
                         {

                 $query = $this->db->query('SELECT
                   sum(money_add) as money_add
                   FROM customer_add_wallet
                     WHERE shift_id="'.$data['shift_id'].'"');

                 $encode_data = json_encode($query->result(),JSON_UNESCAPED_UNICODE );
                 return $encode_data;
                         }











  }
