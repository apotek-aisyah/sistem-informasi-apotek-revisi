<?php defined('BASEPATH') OR exit('No direct script access allowed');

    class Transaksi extends CI_Controller {
        function __construct() {
            parent::__construct();
            $this->load->model('m_transaksi');
            $this->load->model('m_obat');
            $this->load->model('apotek_data');
            $this->load->database();
            $this->load->helper(array('form', 'url'));
            
            $data['nullstock'] = $this->m_transaksi->countstock();
            $data['nullex'] = $this->m_transaksi->countex();
            $data['almost'] = $this->m_transaksi->countalmostex();
            $this->template->write_view('sidenavs', 'template/default_sidenavs', true);
		    $this->template->write_view('navs', 'template/default_topnavs.php', $data, true);
        }

        // ini fungsi obat yang menggunakan resep
        function table_resep () {
            $data['table_resep'] = $this->m_transaksi->resep()->result();
            
            $this->template->write('title', 'Lihat Penjualan Obat Resep', TRUE);
            $this->template->write('header', 'Sistem Informasi Apotek');
            $this->template->write_view('content', 'tes/table_resep', $data, true);
    
            $this->template->render();
        }

        function form_resep() {
            $data['table_med'] = $this->m_obat->obat()->result();
            $this->template->write('title', 'Tambah Penjualan Resep', TRUE);
            $this->template->write('header', 'Sistem Informasi Apotek');
            $this->template->write_view('content', 'tes/form_resep', $data, true);
    
            $this->template->render();
        }

        function add_resep () {
            $data['nama_dokter'] = $this->input->post('nama_dokter');
            $data['telp_dokter'] = $this->input->post('telp_dokter');
            $data['klinik'] = $this->input->post('klinik');
            $data['nama_pasien'] = $this->input->post('nama_pasien');
            $data['telp_pasien'] = $this->input->post('telp_pasien');
            $data['obat_id'] = $this->input->post('obat_id');
            $this->m_transaksi->post($data);

            $this->session->set_flashdata('resep_added', 'Resep berhasil ditambahkan');
            redirect('transaksi/table_resep');
        }

        function edit ($id) {
            $data['table_med'] = $this->m_obat->obat()->result();
		    $data['resep'] = $this->m_transaksi->get($id);
            $this->template->write('title', 'Edit Penjualan Resep', TRUE);
            $this->template->write('header', 'Sistem Informasi Apotek');
            $this->template->write_view('content', 'tes/edit_form_resep', $data, true);
    
            $this->template->render();
        } 

        function update () {
            $id = $this->input->post('no_resep');
            $nama_dokter = $this->input->post('nama_dokter');
            $telp_dokter = $this->input->post('telp_dokter');
            $klinik = $this->input->post('klinik');
            $nama_pasien = $this->input->post('nama_pasien');
            $telp_pasien = $this->input->post('telp_pasien');
            $obat_id = $this->input->post('obat_id');

            $data = array(
                    'nama_dokter' => $nama_dokter,
                    'telp_dokter' => $telp_dokter,
                    'klinik' => $klinik,
                    'nama_pasien' => $nama_pasien,
                    'telp_pasien' => $telp_pasien,
                    'obat_id' => $obat_id
                );

                $this->m_transaksi->update($data,$id);
                $this->session->set_flashdata('resep_added', 'Data Resep berhasil diperbarui');
                redirect('transaksi/table_resep');
            }
            
            function delete () {
                $id = $this->uri->segment(3);
                $this->m_transaksi->delete($id);
                $this->session->set_flashdata('resep_added', 'Data resep berhasil dihapus');
                redirect('transaksi/table_resep');
            }
        

        // ini fungsi obat yang menggunakan non resep

        function table_nonresep() {

            // $data['table_nonresep'] = $this->m_transaksi->non_resep()->result();

            $this->template->write('title', 'Lihat Penjualan Obat Non Resep', TRUE);
            $this->template->write('header', 'Sistem Informasi Apotek');
            $this->template->write_view('content', 'tes/table_nonresep', true);
    
            $this->template->render();

        }

        function form_nonresep () {
        	$data['table_med'] = $this->apotek_data->medicine()->result();
		    $data['get_cat'] = $this->apotek_data->get_category();
		    $data['get_med'] = $this->apotek_data->get_medicine();
		    $data['get_unit'] = $this->apotek_data->get_unit();
		    $this->template->write('title', 'Tambah Penjualan Non Resep', TRUE);
		    $this->template->write('header', 'Sistem Informasi Apotek');
		    $this->template->write_view('content', 'tes/form_nonresep', $data, true);

		    $this->template->render();
        }

        function invoice_penjualan() {
            $this->template->write('title', 'Grafik Penjualan', TRUE);
            $this->template->write('header', 'Sistem Informasi Apotek');
            $this->template->write_view('content', 'tes/invoice_penjualan', true);

            $this->template->render();
        }
    }

    

?>