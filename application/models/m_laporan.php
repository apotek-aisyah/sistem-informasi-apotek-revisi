<?php

    class M_laporan extends CI_Model{
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

        function count_totpur(){       
            $q = "SELECT *, SUM(table_purchase.subtotal) as 'totalTrans' FROM table_purchase ";
     
            $run_q = $this->db->query($q);
     
            if ($run_q->num_rows() > 0) {
                foreach ($run_q->result() as $get) {
                    return $get->totalTrans;
                }
            } else {
                return FALSE;
            }  
        }

        function count_totinv(){       
            $q = "SELECT *, SUM(table_invoice.subtotal) as 'totalTrans' FROM table_invoice";
     
            $run_q = $this->db->query($q);
     
            if ($run_q->num_rows() > 0) {
                foreach ($run_q->result() as $get) {
                    return $get->totalTrans;
                }
            }
            else {
                return FALSE;
            }  
        }

        public function get_report(){
            $q = "SELECT month.month_name as month, 
                SUM(table_purchase.subtotal) AS total1,
                SUM(table_invoice.subtotal) AS total2  
                FROM month 
                LEFT JOIN table_purchase ON month.month_num = MONTH(table_purchase.tgl_beli)
                AND YEAR(table_purchase.tgl_beli)= '2018'  
                LEFT JOIN table_invoice ON month.month_num = MONTH(table_invoice.tgl_beli)
                AND YEAR(table_invoice.tgl_beli)= '2018' 
                GROUP BY month.month_name ORDER BY month.month_num";
           
            $run_q = $this->db->query($q);
    
            if($run_q->num_rows() > 0){
                return $run_q->result();
            }
    
            else{
                return FALSE;
            }
        }
    }
?>