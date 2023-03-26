<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH . 'libraries/tcpdf/tcpdf.php';

class Pdf_export extends CI_Controller {

    public function index() {
        $pdf = new TCPDF();
        $pdf->Output('Smart Report.pdf', 'D');
    }
}
