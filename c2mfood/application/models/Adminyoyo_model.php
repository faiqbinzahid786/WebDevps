<?php

class Adminyoyo_model extends CI_Model {



        public function __construct()
        {
                // Call the CI_Model constructor
                parent::__construct();
                $this->load->library('session');
        }

      

           public function get_renew()
        {

$this->db->select('o.owner_id as owner_id, o.owner_name as name,o.tel as tel, o.status_pay as status_pay,o.add_time as add_time,o.end_time as end_time, o.aff_id as aff_id, o.aff_income as aff_income, r.renew_id as renew_id, r.total_amount as total_amount, r.time_transfer as time_transfer, r.remark as remark, r.image as image,r.create_date as create_date')
        ->from('renew as r')
        ->join('owner as o','o.owner_id=r.owner_id')
        ->where('r.status', '0')
        ->order_by('r.renew_id','ASC');
        $query = $this->db->get();
$encode_data = json_encode($query->result(),JSON_UNESCAPED_UNICODE );
return $encode_data; 
              
              
        }


        public function get_with()
        {

$this->db->select('w.w_id as w_id,w.w_amount as amount, w.w_bankaccount as bankaccount,w.create_date as create_date, u.aff_name as aff_name,u.aff_tel as aff_tel')
        ->from('affiliate_withdraw as w')
        ->join('affiliate_user as u','u.aff_id=w.aff_id')
        ->where('w.w_status', '0')
        ->order_by('w.w_id','ASC');
        $query = $this->db->get();
$encode_data = json_encode($query->result(),JSON_UNESCAPED_UNICODE );
return $encode_data; 
              
              
        }


         public function Update_with($data)
        {
$data1['w_status'] = '1';
$where1 = array(
        'w_id' => $data['w_id']
);

$this->db->where($where1);
$this->db->update("affiliate_withdraw", $data1);

        }



        public function Delete_renew($data)
        {

$query = $this->db->query('DELETE FROM renew  WHERE renew_id="'.$data['renew_id'].'"');
return true;

        }


           public function Update_renew($data)
        {

$data1['status_pay'] = '1';

if($data['end_time']==''){
$data1['end_time'] = strtotime("+1 years", $data['add_time']);
}else{
$data1['end_time'] = strtotime("+1 years", $data['end_time']);
}

$where1 = array(
        'owner_id' => $data['owner_id']
);

$this->db->where($where1);
$this->db->update("owner", $data1);


if($data['status_pay']=='0'){

$where2 = array(
        'aff_id' => $data['aff_id']
);

$this->db->set('aff_income_all','aff_income_all+'.$data['aff_income'], FALSE);
$this->db->set('aff_income_withdrawal','aff_income_withdrawal+'.$data['aff_income'], FALSE);
$this->db->where($where2);
$this->db->update("affiliate_user");


}



$data3['status'] = '1';
$where3 = array(
        'renew_id' => $data['renew_id']
);
$this->db->where($where3);
$this->db->update("renew", $data3);




}



     

}