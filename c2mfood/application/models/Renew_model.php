<?php

class Renew_model extends CI_Model {



        public function __construct()
        {
                // Call the CI_Model constructor
                parent::__construct();
                $this->load->library('session');


        }

        public function Add($data)
    {
        $this->db->insert('renew', $data);
        return true;
    }




    }