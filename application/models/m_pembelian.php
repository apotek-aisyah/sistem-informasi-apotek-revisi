<?php

    class M_pembelian extends CI_Model {

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

        function countalmostex(){       
            $ce = $this->db->query('SELECT * FROM table_med WHERE kedaluwarsa BETWEEN NOW() AND DATE_ADD(NOW(), INTERVAL 60 DAY)');
            $almost = $ce->num_rows();
            return $almost;     
        }
    }
?>