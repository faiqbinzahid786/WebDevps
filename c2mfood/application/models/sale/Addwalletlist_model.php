<?php

class Addwalletlist_model extends CI_Model {



        public function __construct()
        {
                // Call the CI_Model constructor
                parent::__construct();
                $this->load->library('session');


        }


 public function Get($data)
        {

$dayfrom = strtotime($data['dayfrom']);
$dayto = strtotime($data['dayto'])+86400;



 $perpage = $data['perpage'];

            if($data['page'] && $data['page'] != ''){
$page = $data['page'];
            }else{
          $page = '1';
            }


            $start = ($page - 1) * $perpage;


$querynum = $this->db->query('SELECT
caw.money_add,
caw.shift_id,
from_unixtime(caw.add_time,"%d-%m-%Y %H:%i:%s") as add_time,
co.cus_name,
uo.name
    FROM customer_add_wallet as caw
    LEFT JOIN user_owner as uo on uo.user_id=caw.user_id
    LEFT JOIN customer_owner as co on co.cus_id=caw.cus_id
    WHERE caw.add_time
BETWEEN "'.$dayfrom.'"
AND "'.$dayto.'"
    ORDER BY caw.caw_id DESC ');


$query = $this->db->query('SELECT
caw.money_add,
caw.shift_id,
from_unixtime(caw.add_time,"%d-%m-%Y %H:%i:%s") as add_time,
co.cus_name,
uo.name
    FROM customer_add_wallet as caw
    LEFT JOIN user_owner as uo on uo.user_id=caw.user_id
    LEFT JOIN customer_owner as co on co.cus_id=caw.cus_id
    WHERE caw.add_time
BETWEEN "'.$dayfrom.'"
AND "'.$dayto.'"
    ORDER BY caw.caw_id DESC LIMIT '.$start.' , '.$perpage.' ');
$encode_data = json_encode($query->result(),JSON_UNESCAPED_UNICODE );


$num_rows = $querynum->num_rows();

$pageall = ceil($num_rows/$perpage);




$json = '{"list": '.$encode_data.',
"numall": '.$num_rows.',"perpage": '.$perpage.', "pageall": '.$pageall.'}';

return $json;


        }










  }
