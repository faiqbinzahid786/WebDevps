<?php

class Salecustomerreport_model extends CI_Model {



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
    cus_id,
cus_name,
sum(sumsale_num) as salenum,
sum(sumsale_price) as saleprice
    FROM sale_list_header
     WHERE owner_id="'.$_SESSION['owner_id'].'" AND cus_id > "0" and adddate BETWEEN "'.$dayfrom.'" AND "'.$dayto.'"
GROUP BY cus_id
      ORDER BY saleprice DESC');
$encode_data = json_encode($query->result(),JSON_UNESCAPED_UNICODE );
return $encode_data;

        }


        public function Exportexcel($data)
        {
$dayfrom = strtotime($data['dayfrom']);
$dayto = strtotime($data['dayto'])+86400;

$query = $this->db->query('SELECT 
    cus_name as "ชื่อลูกค้า",
	sumsale_num as "รวมจำนวนที่ซื้อ",
	sumsale_price as "รวมยอดเงินที่ซื้อ",
	from_unixtime(adddate,"%d-%m-%Y %H:%i:%s") as "วันที่"
FROM sale_list_header
WHERE cus_id > "0" AND adddate BETWEEN "'.$dayfrom.'" AND "'.$dayto.'"
 ');
return $query;

        }



         public function Exportexcelcus($data)
        {
$dayfrom = strtotime($data['dayfrom']);
$dayto = strtotime($data['dayto'])+86400;

$query = $this->db->query('SELECT 
    sh.cus_name as "ชื่อลูกค้า",
    wl.product_name as "ชื่อสินค้า",
    sd.product_price as "ราคาสินค้าต่อหน่วย",   
    sd.product_price_discount as "ส่วนลดต่อหน่วย",
    sd.product_sale_num as "จำนวนที่ซื้อ",
    (sd.product_price-sd.product_price_discount)*sd.product_sale_num as "ยอดเงินที่ซื้อ",
    from_unixtime(sd.adddate,"%d-%m-%Y %H:%i:%s") as "วันที่ซื้อ"
FROM sale_list_datail as sd
LEFT JOIN sale_list_header as sh on sh.sale_runno=sd.sale_runno
LEFT JOIN wh_product_list as wl on wl.product_id=sd.product_id
WHERE sh.cus_id="'.$data['cus_id'].'" AND sd.owner_id="'.$_SESSION['owner_id'].'" AND sd.adddate BETWEEN "'.$dayfrom.'" AND "'.$dayto.'" order by sd.ID DESC  ');
return $query;

        }





    }