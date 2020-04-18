<?php

class Thailand_model extends CI_Model {



        public function __construct()
        {
                // Call the CI_Model constructor
                parent::__construct();
                $this->load->library('session');


        }

       


           public function Province()
        {

$query = $this->db->query('SELECT province_id,province_name FROM thai_province ORDER BY province_id ASC');
$encode_data = json_encode($query->result(),JSON_UNESCAPED_UNICODE );
return $encode_data;

        }


   public function Amphur($data)
        {

$query = $this->db->query('SELECT amphur_id,amphur_name FROM thai_amphur WHERE province_id="'.$data['province_id'].'" ORDER BY amphur_id ASC');
$encode_data = json_encode($query->result(),JSON_UNESCAPED_UNICODE );
return $encode_data;

        }



   public function District($data)
        {

$query = $this->db->query('SELECT district_id,district_name FROM thai_district WHERE amphur_id="'.$data['amphur_id'].'" ORDER BY district_id ASC');
$encode_data = json_encode($query->result(),JSON_UNESCAPED_UNICODE );
return $encode_data;

        }



   




    }