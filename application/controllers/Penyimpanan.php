<?php
defined('BASEPATH') OR exit('No direct script access allowed');

    class Penyimpanan extends CI_Controller {
        function __construct() {
            parent::__construct();
            $this->load->model('m_penyimpanan');
            $this->load->database();
            $this->load->helper(array('form', 'url'));

            $data['nullstock'] = $this->m_penyimpanan->countstock();
            $data['nullex'] = $this->m_penyimpanan->countex();
            $this->template->write_view('sidenavs', 'template/default_sidenavs', true);
		    $this->template->write_view('navs', 'template/default_topnavs.php', $data, true);
        }

        function table_storage() {
		
            $data['table_storage'] = $this->m_penyimpanan->storage()->result();
            $this->template->write('title', 'Lihat Penyimpanan Obat', TRUE);
            $this->template->write('header', 'Sistem Informasi Apotek');
            $this->template->write_view('content', 'tes/table_storage', $data, true);
    
            $this->template->render();
        }

        function form_storage() {
            $this->template->write('title', 'Tambah Penyimpanan Obat', TRUE);
            $this->template->write('header', 'Sistem Informasi Apotek');
            $this->template->write_view('content', 'tes/form_storage', true);
    
            $this->template->render();
        }

        function add_penyimpanan () {
            
            $name = $this->input->post('name');
     
            $data = array(
                'name' => $name,
                
                );
            $this->m_penyimpanan->insert_data($data,'table_storage');
    
            $this->session->set_flashdata('storage_added', 'Penyimpanan Obat berhasil ditambahkan');
            redirect('penyimpanan/table_storage');
        }

        function edit_form_storage($id) {
            $where = array('id' => $id);
            $data['table_storage'] = $this->m_penyimpanan->edit_data($where,'table_storage')->result();
            $this->template->write('title', 'Ubah Penyimpanan Obat', TRUE);
            $this->template->write('header', 'Sistem Informasi Apotek');
            $this->template->write_view('content', 'tes/edit_form_storage', $data, true);
    
            $this->template->render();
        }

        function update_storage(){
            $id = $this->input->post('id');
            $name = $this->input->post('name');
    
            $data = array(
                'name' => $name,
            );
    
            $where = array(
                'id' => $id
            );
    
            $this->m_penyimpanan->update_data($where,$data,'table_storage');
    
            $this->session->set_flashdata('storage_added', 'Data Penyimpanan berhasil diperbarui');
            redirect('penyimpanan/table_storage');
        }

        function remove_storage($id){
            $where = array('id' => $id);
            $this->m_penyimpanan->delete_data($where,'table_storage');
            redirect('penyimpanan/table_storage');
        }
    }