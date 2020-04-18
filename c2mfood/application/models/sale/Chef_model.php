<?php

class Chef_model extends CI_Model {



        public function __construct()
        {
                // Call the CI_Model constructor
                parent::__construct();
                $this->load->library('session');


        }




        public function Get_kitchen($data)
        {


          if($data['id']=='0'){
            $kitchen_id = $_SESSION['kitchen_id'];
          }else{
            $kitchen_id = $data['id'];
          }


          $query = $this->db->query('SELECT
              kitchen_name,printer_ip
              FROM wh_product_category_kitchen
              WHERE kitchen_id="'.$kitchen_id.'" LIMIT 1');

          $encode_data = json_encode($query->result(),JSON_UNESCAPED_UNICODE );
          return $encode_data;


        }




        public function Get_new($data)
        {

          if($data['id']=='0'){
            $kitchen_id = $_SESSION['kitchen_id'];
          }else{
            $kitchen_id = $data['id'];
          }

          $query = $this->db->query('SELECT
            sk.k_ID,
              sk.s_ID,
            sk.product_id,
            sk.table_id,
              sk.product_name,
              sk.note_order,
              from_unixtime(sk.adddate,"%H:%i:%s") as adddate,
              sk.status,
              ft.food_table_name,
              sk.product_sale_num
              FROM sale_list_order_kitchen as sk
              LEFT JOIN food_table as ft on ft.food_table_id=sk.table_id
              LEFT JOIN wh_product_list as wl on wl.product_id=sk.product_id
              LEFT JOIN wh_product_category as wc on wc.product_category_id=wl.product_category_id
              LEFT JOIN wh_product_category_kitchen as wk on wk.kitchen_id=wc.kitchen_id
              WHERE sk.owner_id="'.$_SESSION['owner_id'].'"
              AND wk.kitchen_id="'.$kitchen_id.'"
              AND sk.status="0"
                ORDER BY sk.s_ID ASC');

          $encode_data = json_encode($query->result(),JSON_UNESCAPED_UNICODE );
          return $encode_data;


        }



        public function Get_doing($data)
        {

          if($data['id']=='0'){
            $kitchen_id = $_SESSION['kitchen_id'];
          }else{
            $kitchen_id = $data['id'];
          }

          $query = $this->db->query('SELECT
            sk.k_ID,
              sk.s_ID,
            sk.product_id,
            sk.table_id,
              sk.product_name,
              sk.note_order,
              from_unixtime(sk.adddate,"%H:%i:%s") as adddate,
              sk.status,
              ft.food_table_name,
              sk.product_sale_num
              FROM sale_list_order_kitchen as sk
              LEFT JOIN food_table as ft on ft.food_table_id=sk.table_id
              LEFT JOIN wh_product_list as wl on wl.product_id=sk.product_id
              LEFT JOIN wh_product_category as wc on wc.product_category_id=wl.product_category_id
              LEFT JOIN wh_product_category_kitchen as wk on wk.kitchen_id=wc.kitchen_id
              WHERE sk.owner_id="'.$_SESSION['owner_id'].'"
              AND wk.kitchen_id="'.$kitchen_id.'"
              AND sk.status="1"
                ORDER BY sk.s_ID ASC');

          $encode_data = json_encode($query->result(),JSON_UNESCAPED_UNICODE );
          return $encode_data;


        }





        public function Get_success($data)
        {

          if($data['id']=='0'){
            $kitchen_id = $_SESSION['kitchen_id'];
          }else{
            $kitchen_id = $data['id'];
          }


          $query = $this->db->query('SELECT
            sk.k_ID,
            sk.s_ID,
            sk.product_id,
            sk.table_id,
              sk.product_name,
              sk.note_order,
              from_unixtime(sk.adddate,"%H:%i:%s") as adddate,
              sk.status,
              ft.food_table_name,
              sk.product_sale_num
              FROM sale_list_order_kitchen as sk
              LEFT JOIN food_table as ft on ft.food_table_id=sk.table_id
              LEFT JOIN wh_product_list as wl on wl.product_id=sk.product_id
              LEFT JOIN wh_product_category as wc on wc.product_category_id=wl.product_category_id
              LEFT JOIN wh_product_category_kitchen as wk on wk.kitchen_id=wc.kitchen_id
              WHERE sk.owner_id="'.$_SESSION['owner_id'].'"
              AND wk.kitchen_id="'.$kitchen_id.'"
              AND sk.status="2"
                ORDER BY sk.s_ID DESC');

          $encode_data = json_encode($query->result(),JSON_UNESCAPED_UNICODE );
          return $encode_data;


        }








        public function Changestatus($data,$dataget)
        {

if($dataget['id']=='0'){
  $k_id = $data['k_ID'];
}else{
  $k_id = $dataget['id'];
}


        $query = $this->db->query('UPDATE sale_list_order_kitchen
        SET status="'.$data['status'].'"
        WHERE k_ID="'.$data['k_ID'].'" ');


        $querytable = $this->db->query('UPDATE sale_list_table
        SET status="'.$data['status'].'"
        WHERE s_ID="'.$data['s_ID'].'" and table_id="'.$data['table_id'].'" ');





}




    }
