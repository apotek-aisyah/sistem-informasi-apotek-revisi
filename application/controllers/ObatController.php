<?php
defined('BASEPATH') OR exit('No direct script access allowed');

    class ObatController extends CI_Controller {

        function __construct() {
            parent::__construct();
            $this->load->model('m_obat');
            $this->load->model('m_kategori');
            $this->load->model('m_pemasok');
            $this->load->model('m_penyimpanan');
            $this->load->model('m_unit');
            $this->load->model('apotek_data');
            $this->load->database();
            $this->load->helper(array('form', 'url'));
            
            $data['nullstock'] = $this->m_obat->countstock();
            $data['nullex'] = $this->m_obat->countex();
            $data['almost'] = $this->apotek_data->countalmostex();
            $this->template->write_view('sidenavs', 'template/default_sidenavs', true);
		    $this->template->write_view('navs', 'template/default_topnavs.php', $data, true);
        }
        
        function form_med() {
            $data['get_cat'] = $this->m_kategori->category()->result();
            $data['get_sup'] = $this->m_pemasok->supplier()->result();
            $data['storage'] = $this->m_penyimpanan->storage()->result();
            $data['unit'] = $this->m_unit->unit()->result();
            $this->template->write('title', 'Tambah Obat', TRUE);
            $this->template->write('header', 'Sistem Informasi Apotek');
            $this->template->write_view('content', 'tes/form_med', $data, true);
    
            $this->template->render();
        }

        function table_med() {
		
            $data['table_med'] = $this->m_obat->medicine()->result();
            $this->template->write('title', 'Lihat Obat', TRUE);
            $this->template->write('header', 'Sistem Informasi Apotek');
            $this->template->write_view('content', 'tes/table_med', $data, true);
    
            $this->template->render();
        }

        function add_medicine()
	    {
            $data['nama_obat'] = $this->input->post('nama_obat');
            $data['penyimpanan_id'] = $this->input->post('penyimpanan_id');
            $data['stok'] = $this->input->post('stok');
            $data['unit_id'] = $this->input->post('unit_id');
            $data['kategori_id'] = $this->input->post('kategori_id');
            $data['kedaluwarsa'] = date("Y-m-d",strtotime($this->input->post('kedaluwarsa')));
            $data['des_obat'] = $this->input->post('des_obat');
            $data['harga_beli'] = $this->input->post('harga_beli');
            $data['harga_jual'] = $this->input->post('harga_jual');
            $data['pemasok_id'] = $this->input->post('pemasok_id');

            $this->m_obat->post($data);

            $this->session->set_flashdata('med_added', 'Obat berhasil ditambahkan');
            redirect('obatcontroller/table_med');
	    }

        function edit($id) {
            $data['get_cat'] = $this->m_kategori->category()->result();
            $data['get_sup'] = $this->m_pemasok->supplier()->result();
            $data['storage'] = $this->m_penyimpanan->storage()->result();
            $data['get_unit'] = $this->m_unit->unit()->result();
            $data['obat'] = $this->m_obat->edit_data($id);
            $this->template->write('title', 'Ubah Obat', TRUE);
            $this->template->write('header', 'Sistem Informasi Apotek');
            $this->template->write_view('content', 'tes/edit_form_med', $data, true);
    
            $this->template->render();
        }
    
        function update_medicine(){
            $id = $this->input->post('id_obat');
            $nama_obat = $this->input->post('nama_obat');
            $penyimpanan = $this->input->post('penyimpanan_id');
            $stok = $this->input->post('stok');
            $unit = $this->input->post('unit_id');
            $kategori = $this->input->post('kategori_id');
            $kedaluwarsa = date("Y-m-d",strtotime($this->input->post('kedaluwarsa')));
            $des_obat = $this->input->post('des_obat');
            $harga_beli = $this->input->post('harga_beli');
            $harga_jual = $this->input->post('harga_jual');
            $pemasok = $this->input->post('pemasok_id');
            $data = array(
                'nama_obat' => $nama_obat,
                'penyimpanan_id' => $penyimpanan,
                'stok' => $stok,
                'unit_id' => $unit,
                'kategori_id' => $kategori,
                'kedaluwarsa' => $kedaluwarsa,
                'des_obat' => $des_obat,
                'harga_beli' => $harga_beli,
                'harga_jual' => $harga_jual,
                'pemasok_id' => $pemasok,
            );
            $this->m_obat->update_data($data, $id);
            $this->session->set_flashdata('med_added', 'Data obat berhasil diperbarui');
            redirect('obatcontroller/table_med');
        }

        function remove_med($id_obat){
            $where = array('id_obat' => $id_obat);
            $this->m_obat->delete_data($where,'table_med');
            redirect('obatcontroller/table_med');
        }

        function table_exp() {
            $data['table_exp'] = $this->m_obat->expired()->result();
            $data['table_alex'] = $this->m_obat->almostex()->result();
            $this->template->write('title', 'Obat kedaluwarsa', TRUE);
            $this->template->write('header', 'Sistem Informasi Apotek');
            $this->template->write_view('content', 'tes/table_exp', $data, true);
    
            $this->template->render();
    
        }

        function table_stock() {
            $data['table_stock'] = $this->m_obat->outstock()->result();
            $data['table_alstock'] = $this->m_obat->almostout()->result();
            $this->template->write('title', 'Obat Habis', TRUE);
            $this->template->write('header', 'Sistem Informasi Apotek');
            $this->template->write_view('content', 'tes/table_stock', $data,  true);
    
            $this->template->render();
        }
    }
?>
