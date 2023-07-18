<?php
defined('BASEPATH') OR exit('No direct script access allowed');

    class Unit extends CI_controller {
        function __construct() {
            parent::__construct();
            $this->load->model('m_unit');
            $this->load->database();
            $this->load->helper(array('form', 'url'));
            
            $data['nullstock'] = $this->m_unit->countstock();
            $data['nullex'] = $this->m_unit->countex();
            $this->template->write_view('sidenavs', 'template/default_sidenavs', true);
		    $this->template->write_view('navs', 'template/default_topnavs.php', $data, true);
        }

        function form_unit() {
            $this->template->write('title', 'Tambah Unit', TRUE);
            $this->template->write('header', 'Sistem Informasi Apotek');
            $this->template->write_view('content', 'tes/form_unit', '', true);
    
            $this->template->render();
        }

        function table_unit() {
		
            $data['table_unit'] = $this->m_unit->unit()->result();
            $this->template->write('title', 'Lihat Unit', TRUE);
            $this->template->write('header', 'Sistem Informasi Apotek');
            $this->template->write_view('content', 'tes/table_unit', $data, true);
    
            $this->template->render();
            
        }

        function add_unit(){
            $unit = $this->input->post('unit');
            $data = array(
                'unit' => $unit,
                
                
                );
            $this->m_unit->insert_data($data,'table_unit');
    
            $this->session->set_flashdata('unit_added', 'Unit berhasil ditambahkan');
            redirect('unit/table_unit');
        }

        function edit_form_unit($id_unit) {
            $where = array('id_unit' => $id_unit);
            $data['table_unit'] = $this->m_unit->edit_data($where,'table_unit')->result();
            $this->template->write('title', 'Ubah Unit', TRUE);
            $this->template->write('header', 'Sistem Informasi Apotek');
            $this->template->write_view('content', 'tes/edit_form_unit', $data, true);
    
            $this->template->render();
        }

        function update_unit(){
            $id_unit = $this->input->post('id_unit');
            $unit = $this->input->post('unit');
            
            $data = array(
                'unit' => $unit,
            
            );
    
            $where = array(
                'id_unit' => $id_unit
            );
    
            $this->m_unit->update_data($where,$data,'table_unit');
    
            $this->session->set_flashdata('unit_added', 'Data unit berhasil diperbarui');
            redirect('unit/table_unit');
        }

        function remove_unit($id_unit){
            $where = array('id_unit' => $id_unit);
            
            $this->m_unit->delete_data($where,'table_unit');
            redirect('unit/table_unit');
        }
    }