<?php

    class M_transaksi extends CI_Model {

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

        function resep() {
            $this->db->select('*');
            $this->db->from('table_resep_obat');
            $this->db->join('table_med', 'table_resep_obat.obat_id=table_med.id_obat');
            return $this->db->get();
        }

        function post($data) {
            $this->db->insert('table_resep_obat',$data);
        }

        function get ($id) {
            return $this->db->where('no_resep', $id)->get('table_resep_obat')->row();
        }

        function update ($data, $id) {
            $this->db->where('no_resep',$id)->update('table_resep_obat', $data);
        }

        function delete ($id) {
            $this->db->where('no_resep',$id);
		    $this->db->delete('table_resep_obat');
        }

        // function non_resep () {
        //     $this->db->select('*');
            
        //     $this->db->select_sum('table_invoice.banyak');
        
        //     $this->db->group_by('ref');
        //     $this->db->order_by ('tgl_beli', 'DESC');

        //     $run_q = $this->db->get('table_invoice');
        //     return $run_q;
        // }
    }
?>