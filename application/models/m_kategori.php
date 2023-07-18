<?php

    class M_kategori extends CI_Model {

        function __construct() {
            parent::__construct();
            $this->load->database();
        }

        function countstock(){       
            $cs =  $this->db->query('SELECT * FROM table_med WHERE stok BETWEEN 0 AND 0'); 
            $nullstock = $cs->num_rows();
            return $nullstock;    
        }
      
        function countex(){       
            $ce = $this->db->query('SELECT * FROM table_med WHERE kedaluwarsa BETWEEN DATE_SUB(NOW(), INTERVAL 100 YEAR) AND NOW()');
            $nullex = $ce->num_rows();
            return $nullex;     
        }

        function category() {
            return $this->db->get('table_cat');
        }

        function insert_data($data,$table){
            $this->db->insert($table,$data);
        }

        function edit_data($where,$table){      
            return $this->db->get_where($table,$where);
        }
    
        function update_data($where,$data,$table){
            $this->db->where($where);
            $this->db->update($table,$data);
        }  
    
        function delete_data($where,$table){
            $this->db->where($where);
            $this->db->delete($table);
        }
    }

?>