<?php

class Welcome extends CI_Controller {

	public function index()
    {
        $data['barang'] = '';
        $parser = [
            'title' => 'Barang',
            'page'    => $this->load->view('pages/dashboard', $data),
            'content' => false
        ];
       $this->parser->parse('templates/index', $parser);
    }
    
}
