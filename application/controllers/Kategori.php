<?php
defined('BASEPATH') OR exit('No direct script access allowed');

    class Kategori extends CI_controller {
        function __construct() {
            parent::__construct();
            $this->load->model('m_kategori');
            $this->load->model('apotek_data');
            $this->load->database();
            $this->load->helper(array('form', 'url'));
            
            $data['nullstock'] = $this->m_kategori->countstock();
            $data['nullex'] = $this->m_kategori->countex();
            $data['almost'] = $this->apotek_data->countalmostex();
            $this->template->write_view('sidenavs', 'template/default_sidenavs', true);
		    $this->template->write_view('navs', 'template/default_topnavs.php', $data, true);
        }

        function form_cat() {
            $this->template->write('title', 'Tambah Kategori', TRUE);
            $this->template->write('header', 'Sistem Informasi Apotek');
            $this->template->write_view('content', 'tes/form_cat', '', true);
    
            $this->template->render();
        }

        function table_cat() {
		
            $data['table_cat'] = $this->m_kategori->category()->result();
            $this->template->write('title', 'Lihat Kategori', TRUE);
            $this->template->write('header', 'Sistem Informasi Apotek');
            $this->template->write_view('content', 'tes/table_cat', $data, true);
    
            $this->template->render();
        }

        function add_category(){
            $nama_kategori = $this->input->post('nama_kategori');
            $des_kat = $this->input->post('des_kat');
     
            $data = array(
                'nama_kategori' => $nama_kategori,
                'des_kat' => $des_kat,
                
                );
            $this->m_kategori->insert_data($data,'table_cat');
    
            $this->session->set_flashdata('cat_added', 'Kategori berhasil ditambahkan');
            redirect('kategori/table_cat');
        }

        function edit_form_cat($id_kat) {
            $where = array('id_kat' => $id_kat);
            $data['table_cat'] = $this->m_kategori->edit_data($where,'table_cat')->result();
            $this->template->write('title', 'Ubah Kategori', TRUE);
            $this->template->write('header', 'Sistem Informasi Apotek');
            $this->template->write_view('content', 'tes/edit_form_cat', $data, true);
    
            $this->template->render();
        }

        function update_category(){
            $id_kat = $this->input->post('id_kat');
            $nama_kategori = $this->input->post('nama_kategori');
            $des_kat = $this->input->post('des_kat');
    
            $data = array(
                'nama_kategori' => $nama_kategori,
                'des_kat' => $des_kat,
            );
    
            $where = array(
                'id_kat' => $id_kat
            );
    
            $this->m_kategori->update_data($where,$data,'table_cat');
    
            $this->session->set_flashdata('cat_added', 'Data kategori berhasil diperbarui');
            redirect('kategori/table_cat');
        }

        function remove_cat($id_kat){
            $where = array('id_kat' => $id_kat);
            $this->m_kategori->delete_data($where,'table_cat');
            redirect('kategori/table_cat');
        }
    }

?>