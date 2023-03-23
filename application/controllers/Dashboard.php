<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

    public function index()
    {
        $data['barang'] = '';
        $data['title']  = 'Dashboard';
        $data['wisata']   = count($this->wisata->get());
        $data['kriteria'] = count($this->kriteria->get());
        $data['bobot']    = count($this->bobot->get());
        $data['user']     = count($this->db->get('login')->result_array());
        $this->load->view('templates/header', $data);
        $this->load->view('pages/dashboard');
        $this->load->view('templates/footer');
    }
    
 

}