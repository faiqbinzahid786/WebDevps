<?php

class Food_order_model extends CI_Model {



        public function __construct()
        {
                // Call the CI_Model constructor
                parent::__construct();
                $this->load->library('session');


        }








           public function Get_table()
        {

$query = $this->db->query('SELECT *
,(SELECT count(*) FROM sale_list_order as so WHERE so.table_id=ft.food_table_id) as number_of_order
  FROM food_table  as ft
    LEFT JOIN sale_list_table as st on st.table_id=ft.food_table_id
    GROUP BY ft.food_table_id
    ORDER BY ft.food_table_id ASC');
$encode_data = json_encode($query->result(),JSON_UNESCAPED_UNICODE );
return $encode_data;

        }



  public function Get_order($data)
        {

$query = $this->db->query('SELECT * FROM food_order WHERE  food_table_id="'.$data['food_table_id'].'" AND food_order_status="0"  ORDER BY food_order_id ASC');
$encode_data = json_encode($query->result(),JSON_UNESCAPED_UNICODE );
return $encode_data;

        }




  public function Get_food()
        {

$query = $this->db->query('SELECT *
FROM food_list fl
LEFT JOIN food_category as fc on fc.food_category_id=fl.food_category_id
 WHERE  fl.food_status="0" ORDER BY fl.food_id DESC');
$encode_data = json_encode($query->result(),JSON_UNESCAPED_UNICODE );
return $encode_data;

        }


          public function Get_catfood()
        {

$query = $this->db->query('SELECT * FROM food_category  ORDER BY food_category_id ASC');
$encode_data = json_encode($query->result(),JSON_UNESCAPED_UNICODE );
return $encode_data;

        }


        public function Get_food_from_cat($data)
        {

$query = $this->db->query('SELECT *
FROM food_list fl
LEFT JOIN food_category as fc on fc.food_category_id=fl.food_category_id
 WHERE  fl.food_status="0" AND fl.food_category_id="'.$data['food_category_id'].'" ORDER BY fl.food_id DESC');
$encode_data = json_encode($query->result(),JSON_UNESCAPED_UNICODE );
return $encode_data;

        }





public function Savefoodtablelist($data)
        {



$data['user_id'] = $_SESSION['user_id'];
$data['store_id'] = $_SESSION['store_id'];
$data['create_date'] = time();

if ($this->db->insert("food_order", $data)){
        return true;
    }

  }



public function Deletefoodtablelist($data)
        {

$query = $this->db->query('DELETE FROM food_order
    WHERE food_order_id="'.$data['food_order_id'].'"
    AND  food_table_id="'.$data['food_table_id'].'"
    ');
return true;

        }






 public function Blanktable($data)
        {

$data['food_table_status'] = '0';
$where = array(
        'food_table_id'  => $data['food_table_id']
);

$this->db->where($where);
if ($this->db->update("food_table", $data)){

    $query = $this->db->query('DELETE FROM food_order
    WHERE food_table_id="'.$data['food_table_id'].'"
    AND food_order_status="0"
    ');


        return true;
    }

}




 public function Waitorder($data)
        {

$data['food_table_status'] = '1';
$where = array(
        'food_table_id'  => $data['food_table_id']
);

$this->db->where($where);
if ($this->db->update("food_table", $data)){
        return true;
    }

}



public function Successorder($data)
        {

$data['food_table_status'] = '2';
$where = array(
        'food_table_id'  => $data['food_table_id']
);

$this->db->where($where);
if ($this->db->update("food_table", $data)){
        return true;
    }

}



public function Getorderyet($data)
        {

$data['food_table_status'] = '3';
$where = array(
        'food_table_id'  => $data['food_table_id']
);

$this->db->where($where);
if ($this->db->update("food_table", $data)){
        return true;
    }

}



public function Lastorder($data)
        {

$data['food_table_status'] = '0';
$where = array(
        'food_table_id'  => $data['food_table_id']
);

$this->db->where($where);
if ($this->db->update("food_table", $data)){



$where2 = array(
        'food_table_id'  => $data['food_table_id']
);
$data2['food_order_status'] = '1';
$this->db->where($where2);
$this->db->update("food_order", $data2);
        return true;
    }

}









    }
