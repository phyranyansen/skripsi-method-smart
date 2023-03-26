<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
    
    public function __construct()
    {
        parent::__construct();
        $cek = $this->session->userdata('login');
        $url =   $url = current_url();
		$url_cek = $this->session->userdata('url-server');
        if($cek!='logged_in')
		{
            if($url!=$url_cek)
			{
			    redirect(base_url());

            }
            
		}   
    }

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
    
    function logout()
	{
		$this->session->sess_destroy();
        $this->session->unset_userdata('Username');
        $this->session->unset_userdata('Password');
        $this->session->unset_userdata('status');
        $this->session->unset_userdata('login');
        $this->session->unset_userdata('url-server');
		redirect(base_url());
	}

}