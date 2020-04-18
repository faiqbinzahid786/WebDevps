<?php

class Reportsumary_model extends CI_Model {



        public function __construct()
        {
                // Call the CI_Model constructor
                parent::__construct();
                $this->load->library('session');


        }



 public function Daylist($data)
        {

$dayfrom = strtotime($data['dayfrom']);
$dayto = strtotime($data['dayto']);


$query1 = $this->db->query('SELECT * FROM sale_list_datail as sd WHERE sd.owner_id="'.$_SESSION['owner_id'].'" AND sd.adddate BETWEEN "'.$dayfrom.'" AND "'.$dayto.'" ');

$i=1;
$basecost = 0;
foreach ($query1->result() as $row)
{

    $qer = $this->db->query('SELECT * FROM wh_product_list as w WHERE w.product_id="'.$row->product_id.'" ');
foreach ($qer->result() as $rowx)
{
    //echo $rowx->product_pricebase;
    //echo '<br />';
    $basecost += $rowx->product_pricebase*$row->product_sale_num;


}


/*echo $i.'<br />';
        echo $row->product_id;
        echo '<br />';
        echo $row->product_sale_num;
        echo '<hr />';*/

        $i++;
}

//echo '----->'.$basecost;
//exit;

$query = $this->db->query('SELECT

    (SELECT sum(sd.product_sale_num*sd.product_price) FROM sale_list_datail as sd WHERE sd.owner_id="'.$_SESSION['owner_id'].'" AND sd.adddate BETWEEN "'.$dayfrom.'" AND "'.$dayto.'") as getmoneyall,
    (SELECT sum(sd.product_sale_num*sd.product_price_discount) FROM sale_list_datail as sd WHERE sd.owner_id="'.$_SESSION['owner_id'].'" AND sd.adddate BETWEEN "'.$dayfrom.'" AND "'.$dayto.'") as discount_item,
    (SELECT sum(sd.sumsale_num) FROM sale_list_header as sd WHERE sd.owner_id="'.$_SESSION['owner_id'].'" AND sd.adddate BETWEEN "'.$dayfrom.'" AND "'.$dayto.'") as num,
    (SELECT sum(sd.discount_last) FROM sale_list_header as sd WHERE sd.owner_id="'.$_SESSION['owner_id'].'" AND sd.adddate BETWEEN "'.$dayfrom.'" AND "'.$dayto.'") as discount_last



    FROM owner as wpl WHERE wpl.owner_id="'.$_SESSION['owner_id'].'"');
$encode_data = json_encode($query->result(),JSON_UNESCAPED_UNICODE );
echo '{"data":'.$encode_data.',"cost": "'.$basecost.'"}';

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









        public function Openbillclosedaylistc($data)
        {
$dayfrom = strtotime($data['dayfrom']);
$dayto = strtotime($data['dayto']);

$query3 = $this->db->query('SELECT
    pay_type,
    sum(sumsale_price) as sumsale_price2,
    sum(sumsale_discount) as sumsale_discount2,
    sum(sumsale_num) as sumsale_num2,
    sum(discount_last) as discount_last2
    FROM sale_list_header

    WHERE adddate BETWEEN "'.$dayfrom.'" AND "'.$dayto.'"
     GROUP BY pay_type
     ');

$encode_data3 = json_encode($query3->result(),JSON_UNESCAPED_UNICODE );

return $encode_data3;

        }






    }
