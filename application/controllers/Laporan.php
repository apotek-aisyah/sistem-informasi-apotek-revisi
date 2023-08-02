<?php
defined('BASEPATH') OR exit('No direct script access allowed');

    class Laporan extends CI_Controller {

        function __construct() {
            parent::__construct();
            $this->load->model('m_laporan');
            $this->load->database();
            $this->load->helper(array('form', 'url'));
        
            $data['nullstock'] = $this->m_laporan->countstock();
            $data['nullex'] = $this->m_laporan->countex();
            $data['almost'] = $this->m_laporan->countalmostex();
            $this->template->write_view('sidenavs', 'template/default_sidenavs', true);
            $this->template->write_view('navs', 'template/default_topnavs.php', $data, true);
        }

        function report () {
            $data['totpur'] = $this->m_laporan->count_totpur();
		    $data['totinv'] = $this->m_laporan->count_totinv();
            $data['report'] = $this->m_laporan->get_report();
            $this->template->write('title', 'Laporan', TRUE);
            $this->template->write('header', 'Sistem Informasi Apotek');
            $this->template->write_view('content', 'tes/report', $data, true);

            $this->template->render();
        }
    }
?>