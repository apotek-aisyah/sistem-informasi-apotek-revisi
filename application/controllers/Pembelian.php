<?php
    defined('BASEPATH') OR exit('No direct script access allowed');

    class Pembelian extends CI_Controller {
        function __construct() {
            parent::__construct();
            $this->load->model('m_pembelian');
            $this->load->model('m_obat');
            $this->load->model('m_pemasok');
            $this->load->database();
            $this->load->helper(array('form', 'url'));

            $data['nullstock'] = $this->m_pembelian->countstock();
            $data['nullex'] = $this->m_pembelian->countex();
            $data['almost'] = $this->m_pembelian->countalmostex();
            $this->template->write_view('sidenavs', 'template/default_sidenavs', true);
		    $this->template->write_view('navs', 'template/default_topnavs.php', $data, true);
        }

        function table_purchase() {
            // $data['purchase'] = $this->m_pembelian->purchase()->result();
            
            $this->template->write('title', 'Lihat Pembelian', TRUE);
            $this->template->write('header', 'Sistem Informasi Apotek');
            $this->template->write_view('content', 'tes/table_purchase', true);

            $this->template->render();
	    }

        function form_purchase() {
            $data['obat'] = $this->m_obat->obat()->result();
            $data['pemasok'] = $this->m_pemasok->supplier()->result();
            
            $this->template->write('title', 'Tambah Pembelian', TRUE);
            $this->template->write('header', 'Sistem Informasi Apotek');
            $this->template->write_view('content', 'tes/form_purchase', $data, true);

            $this->template->render();
	    }

        function purchase_report () {
            $this->template->write('title', 'Grafik Pembelian', TRUE);
            $this->template->write('header', 'Sistem Informasi Apotek');
            $this->template->write_view('content', 'tes/purchase_report', true);

            $this->template->render();
        }


}