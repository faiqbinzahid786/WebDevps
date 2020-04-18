<?php

class Food_report_model extends CI_Model {



        public function __construct()
        {
                // Call the CI_Model constructor
                parent::__construct();
                $this->load->library('session');


        }



 public function Daylist($data)
        {

$dayfrom = strtotime($data['dayfrom']);
$dayto = strtotime($data['dayto'])+86400;


$query = $this->db->query('SELECT 
    fl.food_name as food_name,
    fl.food_price as food_price,

    (SELECT sum(sd.food_num) FROM food_order as sd WHERE sd.food_id=fl.food_id   AND sd.food_brand_id="'.$_SESSION['food_brand_id'].'" AND sd.food_order_status="1" AND sd.create_date BETWEEN "'.$dayfrom.'" AND "'.$dayto.'") as food_numsaleall,
    
    


    (SELECT sum(sd.food_price * sd.food_num) FROM food_order as sd WHERE sd.food_id=fl.food_id   AND sd.food_brand_id="'.$_SESSION['food_brand_id'].'" AND sd.food_order_status="1" AND sd.create_date BETWEEN "'.$dayfrom.'" AND "'.$dayto.'") as food_pricesaleall
    
    


    FROM food_list as fl WHERE fl.food_brand_id="'.$_SESSION['food_brand_id'].'" ORDER BY food_pricesaleall DESC');
$encode_data = json_encode($query->result(),JSON_UNESCAPED_UNICODE );
return $encode_data;

        }


        public function Exportexcel($data)
        {
$dayfrom = strtotime($data['dayfrom']);
$dayto = strtotime($data['dayto'])+86400;

$query = $this->db->query('SELECT 
    sh.cus_name as "ชื่อลูกค้า",
    sd.product_code as "รหัสสินค้า",
	sd.product_name as "ชื่อสินค้า",
	sd.product_price as "ราคาขายต่อหน่วย",
    sd.product_price_discount as "ส่วนลดต่อหน่วย",
	sd.product_sale_num as "จำนวนที่ซื้อ",
	(sd.product_price*sd.product_sale_num)-(sd.product_sale_num*sd.product_price_discount) as "รายรับ",
	from_unixtime(sd.adddate,"%d-%m-%Y %H:%i:%s") as "วันที่"
FROM sale_list_datail as sd
LEFT JOIN sale_list_header as sh on sh.sale_runno=sd.sale_runno
WHERE sh.owner_id="'.$_SESSION['owner_id'].'" AND sd.adddate BETWEEN "'.$dayfrom.'" AND "'.$dayto.'"
order by sd.ID DESC 
 ');
return $query;

        }



    }