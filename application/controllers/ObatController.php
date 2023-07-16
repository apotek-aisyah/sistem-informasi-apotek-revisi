<?php
defined('BASEPATH') OR exit('No direct script access allowed');

    class ObatController extends CI_Controller {

        function __construct() {
            parent::__construct();
            $this->load->model('apotek_data');
            $this->load->database();
            $this->load->helper(array('form', 'url'));
            
            $data['nullstock'] = $this->apotek_data->countstock();
            $data['nullex'] = $this->apotek_data->countex();
            $this->template->write_view('sidenavs', 'template/default_sidenavs', true);
		    $this->template->write_view('navs', 'template/default_topnavs.php', $data, true);
        }
        
        function form_med() {
            $data['get_cat'] = $this->apotek_data->get_category();
            $data['get_sup'] = $this->apotek_data->get_supplier();
            $data['get_unit'] = $this->apotek_data->get_unit();
            $this->template->write('title', 'Tambah Obat', TRUE);
            $this->template->write('header', 'Sistem Informasi Apotek');
            $this->template->write_view('content', 'tes/form_med', $data, true);
    
            $this->template->render();
        }

        function table_med() {
		
            $data['table_med'] = $this->apotek_data->medicine()->result();
            $this->template->write('title', 'Lihat Obat', TRUE);
            $this->template->write('header', 'Sistem Informasi Apotek');
            $this->template->write_view('content', 'tes/table_med', $data, true);
    
            $this->template->render();
        }

        function add_medicine()
	    {
            $nama_obat = $this->input->post('nama_obat');
            $penyimpanan = $this->input->post('penyimpanan');
            $stok = $this->input->post('stok');
            $unit_id = $this->input->post('unit_id');
            $kategori_id = $this->input->post('kategori_id');
            $kedaluwarsa = date("Y-m-d",strtotime($this->input->post('kedaluwarsa')));
            $des_obat = $this->input->post('des_obat');
            $harga_beli = $this->input->post('harga_beli');
            $harga_jual = $this->input->post('harga_jual');
            $pemasok_id = $this->input->post('pemasok_id');
    
            $data = array(
                'nama_obat' => $nama_obat,
                'penyimpanan' => $penyimpanan,
                'stok' => $stok,
                'unit_id' => $unit_id,
                'kategori_id' => $kategori_id,
                'kedaluwarsa' => $kedaluwarsa,
                'des_obat' => $des_obat,
                'harga_beli' => $harga_beli,
                'harga_jual' => $harga_jual,
                'pemasok_id' => $pemasok_id,
                
                );
            $this->apotek_data->insert_data($data,'table_med');

            $this->session->set_flashdata('med_added', 'Obat berhasil ditambahkan');
            redirect('obatcontroller/table_med');
	    }

        function edit_form_med($id_obat) {
            $data['get_cat'] = $this->apotek_data->get_category();
            $data['get_sup'] = $this->apotek_data->get_supplier();
            $data['get_unit'] = $this->apotek_data->get_unit();
            $where = array('id_obat' => $id_obat);
            $data['table_med'] = $this->apotek_data->edit_data($where,'table_med')->result();
            $this->template->write('title', 'Ubah Obat', TRUE);
            $this->template->write('header', 'Sistem Informasi Apotek');
            $this->template->write_view('content', 'tes/edit_form_med', $data, true);
    
            $this->template->render();
        }
    
        function update_medicine(){
            $id_obat = $this->input->post('id_obat');
            $nama_obat = $this->input->post('nama_obat');
            $penyimpanan = $this->input->post('penyimpanan');
            $stok = $this->input->post('stok');
            $unit_id = $this->input->post('unit_id');
            $kategori_id = $this->input->post('kategori_id');
            $kedaluwarsa = date("Y-m-d",strtotime($this->input->post('kedaluwarsa')));
            $des_obat = $this->input->post('des_obat');
            $harga_beli = $this->input->post('harga_beli');
            $harga_jual = $this->input->post('harga_jual');
            $pemasok_id = $this->input->post('pemasok_id');
        
            $data = array(
                'nama_obat' => $nama_obat,
                'penyimpanan' => $penyimpanan,
                'stok' => $stok,
                'unit_id' => $unit_id,
                'kategori_id' => $kategori_id,
                'kedaluwarsa' => $kedaluwarsa,
                'des_obat' => $des_obat,
                'harga_beli' => $harga_beli,
                'harga_jual' => $harga_jual,
                'pemasok_id' => $pemasok_id,
            );
    
            $where = array(
                'id_obat' => $id_obat
            );
    
            $this->apotek_data->update_data($where,$data,'table_med');
            $this->session->set_flashdata('med_added', 'Data obat berhasil diperbarui');
            redirect('obatcontroller/table_med');
        }

        function remove_med($id_obat){
            $where = array('id_obat' => $id_obat);
            $this->apotek_data->delete_data($where,'table_med');
            redirect('obatcontroller/table_med');
        }

        function table_exp() {
            $data['table_exp'] = $this->apotek_data->expired()->result();
            $data['table_alex'] = $this->apotek_data->almostex()->result();
            $this->template->write('title', 'Obat kedaluwarsa', TRUE);
            $this->template->write('header', 'Sistem Informasi Apotek');
            $this->template->write_view('content', 'tes/table_exp', $data, true);
    
            $this->template->render();
    
        }

        function table_stock() {
            $data['table_stock'] = $this->apotek_data->outstock()->result();
            $data['table_alstock'] = $this->apotek_data->almostout()->result();
            $this->template->write('title', 'Obat Habis', TRUE);
            $this->template->write('header', 'Sistem Informasi Apotek');
            $this->template->write_view('content', 'tes/table_stock', $data,  true);
    
            $this->template->render();
        }
    }
?>
