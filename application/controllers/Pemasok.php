<?php
defined('BASEPATH') OR exit('No direct script access allowed');

    class pemasok extends CI_controller {

        function __construct() {
            parent::__construct();
            $this->load->model('m_pemasok');
            $this->load->database();
            $this->load->helper(array('form', 'url'));
            
            $data['nullstock'] = $this->m_pemasok->countstock();
            $data['nullex'] = $this->m_pemasok->countex();
            $this->template->write_view('sidenavs', 'template/default_sidenavs', true);
		    $this->template->write_view('navs', 'template/default_topnavs.php', $data, true);
        }

        function table_sup() {
            $data['table_sup'] = $this->m_pemasok->supplier()->result();
            
            $this->template->write('title', 'Lihat Pemasok', TRUE);
            $this->template->write('header', 'Sistem Informasi Apotek');
            $this->template->write_view('content', 'tes/table_sup', $data, true);
    
            $this->template->render();
        }

        function form_sup() {
            $this->template->write('title', 'Tambah Pemasok', TRUE);
            $this->template->write('header', 'Sistem Informasi Apotek');
            $this->template->write_view('content', 'tes/form_sup', '', true);
    
            $this->template->render();
        }

        function add_supplier(){
            $nama_pemasok = $this->input->post('nama_pemasok');
            $alamat = $this->input->post('alamat');
            $telepon = $this->input->post('telepon');
     
            $data = array(
                'nama_pemasok' => $nama_pemasok,
                'alamat' => $alamat,
                'telepon' => $telepon,
                );
            $this->m_pemasok->insert_data($data,'table_sup');
    
            $this->session->set_flashdata('sup_added', 'Pemasok berhasil ditambahkan');
            redirect('pemasok/table_sup');
        }

        function edit_form_sup($id_pem) {
            $where = array('id_pem' => $id_pem);
            $data['table_sup'] = $this->m_pemasok->edit_data($where,'table_sup')->result();
            $this->template->write('title', 'Ubah Pemasok', TRUE);
            $this->template->write('header', 'Sistem Informasi Apotek');
            $this->template->write_view('content', 'tes/edit_form_sup', $data, true);
    
            $this->template->render();
        }

        function update_supplier(){
            $id_pem = $this->input->post('id_pem');
            $nama_pemasok = $this->input->post('nama_pemasok');
            $alamat = $this->input->post('alamat');
            $telepon = $this->input->post('telepon');
    
            $data = array(
                'nama_pemasok' => $nama_pemasok,
                'alamat' => $alamat,
                'telepon' => $telepon,
            );
    
            $where = array(
                'id_pem' => $id_pem
            );
    
            $this->m_pemasok->update_data($where,$data,'table_sup');
    
            $this->session->set_flashdata('sup_added', 'Data pemasok berhasil diperbarui');
            redirect('pemasok/table_sup');
        }

        function remove_sup($id_pem){
            $where = array('id_pem' => $id_pem);
            $this->m_pemasok->delete_data($where,'table_sup');
            redirect('pemasok/table_sup');
        }
    }