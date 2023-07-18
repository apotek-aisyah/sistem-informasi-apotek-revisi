<?php

    class M_obat extends CI_Model {

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

        function medicine() {
            $this->db->select('*');
            $this->db->from('table_med');
            $this->db->join('table_storage','table_med.penyimpanan_id = table_storage.id');
            $this->db->join('table_unit','table_med.unit_id = table_unit.id_unit');
            $this->db->join('table_cat','table_med.kategori_id = table_cat.id_kat');
            $this->db->join('table_sup','table_med.pemasok_id = table_sup.id_pem');
            return $this->db->get();
        }

        function post($data) {
            $this->db->insert('table_med',$data);
        }

        function edit_data($id) {
            $param  =   array('id_obat'=>$id);
            return $this->db->get_where('table_med',$param);
        }
    
        function update_data($data,$id) {
            $this->db->where('id_obat',$id);
            $this->db->update('table_med',$data);
        }  
    
        function delete_data($where,$table){
            $this->db->where($where);
            $this->db->delete($table);
        }

        function expired(){
            return $this->db->query('SELECT * FROM table_med WHERE kedaluwarsa BETWEEN DATE_SUB(NOW(), INTERVAL 40 YEAR) AND NOW()'); 
        }
    
        function almostex(){
            return $this->db->query('SELECT * FROM table_med WHERE kedaluwarsa BETWEEN NOW() AND DATE_ADD(NOW(), INTERVAL 60 DAY)');
        }
    
        function outstock(){        
            return $this->db->query('SELECT * FROM table_med WHERE stok BETWEEN 0 AND 0');           
        }
    
        function almostout(){        
            return $this->db->query('SELECT * FROM table_med WHERE stok BETWEEN 1 AND 8');           
        }
    }

?>