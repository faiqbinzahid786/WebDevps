<?php

class User_model extends CI_Model {



        public function __construct()
        {
                // Call the CI_Model constructor
                parent::__construct();
                $this->load->library('session');
        }

        public function insert_user($data)
        {

                $this->db->where('owner_email', $data['owner_email']);

    $query = $this->db->get('owner');

    $count_row = $query->num_rows();

    if ($count_row > 0) {
      //if count row return any row; that means you have already this email address in the database. so you must set false in this sense.
        return FALSE; // here I change TRUE to false.
     } else {

         $this->db->insert('owner', $data);
      // doesn't return any row means database doesn't have this email
        return TRUE; // And here false to TRUE
     }




        }



           public function get_user($data)
        {

        $query =  $this->db->get_where('user_owner' , array('user_email' => $data['user_email'] , 'user_password' => $data['user_password']));

    $count_row = $query->num_rows();

    if ($count_row > 0) {



foreach ($query->result() as $row) {

        # code...
        $owner_id = $row->owner_id;
        $food_brand_id = $row->food_brand_id;
        $apartment_brand_id = $row->apartment_brand_id;
        $user_id = $row->user_id;
        $store_id = $row->store_id;
        $store_type = $row->store_type;
         //$owner_name = $row->owner_name;
         $name = $row->name;
         $food_table_id = $row->food_table_id;
         $kitchen_id = $row->kitchen_id;
         //$owner_tax_number = $row->owner_tax_number;
        //$owner_email = $row->owner_email;
         $owner_email = $row->user_email;
         $user_type = $row->user_type;
        //$owner_add_time = $row->add_time;

}


 $query_owner =  $this->db->get_where('owner' , array('owner_id' => $owner_id));


 foreach ($query_owner->result() as $row) {

         $owner_name = $row->owner_name;
         $owner_address = $row->owner_address;
         $owner_tel = $row->tel;
         $owner_email = $row->owner_email;
         $owner_tax_number = $row->owner_tax_number;

         $owner_end_time = $row->end_time;

        $owner_logo = $row->owner_logo;
        $owner_vat = $row->owner_vat;
        $owner_vat_status = $row->owner_vat_status;

        $owner_bgimg = $row->owner_bgimg;
        $printer_type = $row->printer_type;
        $printer_ul = $row->printer_ul;
        $printer_name = $row->printer_name;
        $footer_slip = $row->footer_slip;
        $ads = $row->ads;
}





//WHERE user_id="'.$user_id.'"

$queryshiftend = $this->db->query('SELECT
shift_id,shift_start_time,shift_end_time,user_id,user_name
FROM shift ORDER BY shift_id DESC LIMIT 1 ');
$shift_end = $queryshiftend->result_array();

if($shift_end && $shift_end[0]['shift_end_time']==''){
$newdatashift = array(
           'shift_id' => $shift_end[0]['shift_id'],
           'shift_user_id' => $shift_end[0]['user_id'],
           'shift_user_name' => $shift_end[0]['user_name'],
         );

$this->session->set_userdata($newdatashift);
}


      $newdata = array(
        'owner_id' => $owner_id,
        'owner_logo' => $owner_logo,
        'owner_bgimg' => $owner_bgimg,
        'user_id' => $user_id,
        'user_type' => $user_type,
        'name' => $name,
        'store_id' => $store_id,
        'store_type' => $store_type,
        'owner_email'     => $owner_email,
        'owner_name' => $owner_name,
        'owner_address' => $owner_address,
        'owner_tel' => $owner_tel,
        'owner_tax_number' => $owner_tax_number,
       // 'owner_add_time' => $owner_add_time,
         'owner_end_time' => $owner_end_time,
          'owner_vat' => $owner_vat,
          'owner_vat_status' => $owner_vat_status,
          'printer_type' => $printer_type,
          'printer_ul' => $printer_ul,
          'printer_name' => $printer_name,
          'food_table_id' => $food_table_id,
          'kitchen_id' => $kitchen_id,
          'footer_slip' => $footer_slip,
          'ads' => $ads,
        'logged_in' => TRUE
);




$this->session->set_userdata($newdata);
return TRUE;

     } else {


        return FALSE;
     }




        }




}
