<?php

class Store_brand_model extends CI_Model {



        public function __construct()
        {
                // Call the CI_Model constructor
                parent::__construct();
                $this->load->library('session');
        }



 public function Add($data)
        {

$date = date("d-m-Y",time());

$data['owner_pass'] = md5(time());
$data['owner_email'] = md5(time());
$data['add_time'] = date("d-m-Y",time());
$data['end_time'] = date("d-m-Y",strtotime($date. ' + 7 days'));
$data['store_id'] = $_SESSION['store_id'];
if ($this->db->insert("owner", $data)){
        return true;
    }


  }


   public function Edit($data)
        {

$this->db->where('owner_id',$data['owner_id']);
$this->db->where('store_id',$_SESSION['store_id']);


  $newdata = array(
         'owner_name'     => $data['owner_name'],
        'owner_address' => $data['owner_address'],
        'owner_tel' => $data['tel'],
        'owner_tax_number' => $data['owner_tax_number'],
          'owner_vat' => $data['owner_vat'],
          'owner_vat_status' => $data['owner_vat_status']
);

$this->session->set_userdata($newdata);



if ($this->db->update("owner", $data)){
        return true;
    }


  }



 public function Addimg($data)
        {

$this->db->where('owner_id',$data['owner_id']);


$newdata = array(
        'owner_logo'     => $data['owner_logo']
);

$this->session->set_userdata($newdata);



if ($this->db->update("owner", $data)){
        return true;
    }


  }




 public function Addbgimg($data)
        {

$this->db->where('owner_id',$data['owner_id']);


$newdata = array(
        'owner_bgimg'     => $data['owner_bgimg']
);

$this->session->set_userdata($newdata);



if ($this->db->update("owner", $data)){
        return true;
    }


  }






  public function Updatefooter_slip($data)
           {

   $this->db->where('owner_id',$data['owner_id']);


   $newdata = array(
           'footer_slip'     => $data['footer_slip']
   );

   $this->session->set_userdata($newdata);



   if ($this->db->update("owner", $data)){
           return true;
       }


     }




   public function Get()
        {

$this->db->select('owner_id,owner_logo,owner_bgimg,owner_name,
owner.owner_tax_number,owner_vat,owner_vat_status,
owner_address,owner.tel,add_time,end_time,footer_slip')
        ->from('owner')
        ->where('store_id', $_SESSION['store_id'])
        ->order_by('owner_id','DESC');
        $query = $this->db->get();
$encode_data = json_encode($query->result(),JSON_UNESCAPED_UNICODE );
return $encode_data;
        }





}
