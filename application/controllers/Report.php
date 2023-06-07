<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH.'libraries/tcpdf/tcpdf.php';

class Report extends CI_Controller {


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
        // echo "<pre>";
        // print_r($this->report->get_utility());
        // echo "<pre>";

        $data['title']     = 'Laporan';
        $data['menu']      = $this->user->get_menu_where();
      
        $data['list']      = $this->report->get();
        $data['wisata']    = $this->wisata->get();
        $this->load->view('templates/header', $data);
        $this->load->view('pages/data_report', $data);
        $this->load->view('pages/contents/report/modal/modal_report_pariwisata', $data);
        $this->load->view('templates/footer');
    }

    // public function export_pdf()
    // {    
    
       
    //     $pdf = new TCPDF();
    //     $pdf->AddPage();
    
    //     // Generate the HTML to be added to the PDF
    //     $html = $this->load->view('pages/contents/report/report_pariwisata', true);
        
    //     // Define a link with the action attribute
    //     $link = $pdf->AddLink();
    
    //     // Add the link to the PDF
    //     $pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, false, true, $link);
    
    //     // Set the link target to the added link
    //     $pdf->SetLink($link);
    
    //     $output = $pdf->Output('SNART Report.pdf', 'S');
    //     echo '<embed src="data:application/pdf;base64,' . base64_encode($output) . '" width="100%" height="100%" />';
    // }
    
    

   
    public function report_wisata()
    {
        $alternatif = count($_POST['alternatif']);
        $where = [];
        for($i=0; $i<$alternatif; $i++)
        {
            $where [] = $_POST['alternatif'][$i];
        }
        
        $this->session->set_userdata('alternatif', $where);

        echo json_encode($where);
       
    }
   

    function report_wisata_show()
    {
       
        $data['list']     = $this->report->get_wisata();
        $data['title']    = 'Pariwisata';
        $data['wisata']   = $this->wisata->get();
          $data['kriteria']  = $this->smart->get('kriteria');
        $data['kode']     = 'RP-WST';
        $data['utility']  = $this->report->get_utility();
        $this->load->view('pages/contents/report/templates/header', $data);
        $this->load->view('pages/contents/report/report_pariwisata', $data);
        $this->load->view('pages/contents/report/modal/modal_report_pariwisata', $data);
		$this->load->view('pages/contents/report/templates/footer');
    }
  //-----------------------------------------------------------------------------------------
  //TABLE ALTERNATIF PARIWISATA -----------------------------------------------------------------------------------------------
  //GET ALTERNATIF
    public function report_wisata_table()
    {
        $query = $this->report->get_wisata();
        $html  = '';
        $no    = 1;
        foreach($query as $row)
        {
            $explode_harga = explode('- ', $row['Tiket_Masuk']);
                $html .= '<tr>';
                $html .= '<td>'.$no.'.</td>';
                $html .= '<td>'.$row['Kode_Pariwisata'].'</td>';
                $html .= '<td>'.$row['Nama_Pariwisata'].'</td>';
                $html .= '<td>'.$row['Jarak'].' Km</td>';
                if(!empty($explode_harga[0]) && !empty($explode_harga[1])){
                   $html .= '<td> Rp '.number_format($explode_harga[0], 0).' - '.number_format($explode_harga[1], 0).'</td>';
                }else{
                    $html .= '<td> Rp '.number_format($explode_harga[0], 0).'</td>'; 
                }
                
                $html .= '<td> Jam '.$row['Jam_Operasional'].'</td>';
                $html .= '<td>'.$row['Aksebility'].'</td>';
                $html .= '<td>'.$row['Fasilitas'].'</td>';
                $html .= '<td>'.$row['Penjualan_Tiket'].'</td>';
                $html .= '<td>'.$row['Metode_Pembayaran'].'</td>';
                $html .= '<td>'.$row['Akses_Wifi'].'</td>';
                $html .= '<td>'.$row['Informasi_Event'].'</td>';
                $html .= '<td>'.$row['Informasi_Diskon'].'</td>';
                $html .= '<td>'.$row['Spot_Foto'].'</td>';
                $html .= '<td>'.$row['Informasi'].'</td>';
                $html .= '</tr>';
                $no++;
            
         }
        echo $html;
    }
  //-----------------------------------------------------------------------------------------
  //TABLE KONVERSI NILAI -----------------------------------------------------------------------------------------------
  //GET KONVERSI
   public function report_konversi_table()
    {
        $html = '';
        $no = 1;
        $query = $this->report->get_konversi();
        $kriteria = [];

        foreach ($query as $row) {
            $html .= '<tr>';
            $html .= '<td>' . $no . '.</td>';
            $html .= '<td>' . $row['Kode_Pariwisata'] . '</td>';
            $html .= '<td>' . $row['Nama_Pariwisata'] . '</td>';

            // Loop untuk kolom kriteria
            for ($i = 1; $i <= count($row) - 2; $i++) {
                $kodeKriteria = ($i >= 10) ? 'K' . str_pad($i, 3, '0', STR_PAD_LEFT) : 'K' . str_pad($i, 2, '0', STR_PAD_LEFT);
                $html .= '<td>' . $row[$kodeKriteria] . '</td>';

                // Menyimpan nilai kriteria dalam array
                $kriteria[$i][] = $row[$kodeKriteria];
            }

            $html .= '</tr>';
            $no++;
        }

        $html .= '<tr style="background-color:khaki;">';
        $html .= '<td colspan="3">Nilai Tertinggi (MAX)</td>';

        // Loop untuk nilai maksimum kriteria
        for ($i = 1; $i <= count($kriteria); $i++) {
            $max = max($kriteria[$i]);
            $html .= '<td>' . $max . '</td>';
        }

        $html .= '</tr>';

        $html .= '<tr style="background-color:lightblue">';
        $html .= '<td colspan="3">Nilai Terendah (MIN)</td>';

        // Loop untuk nilai minimum kriteria
        for ($i = 1; $i <= count($kriteria); $i++) {
            $min = min($kriteria[$i]);
            $html .= '<td>' . $min . '</td>';
        }

        $html .= '</tr>';
        echo $html;
    }


  //-----------------------------------------------------------------------------------------
    //TABLE NILAI BOBOT -----------------------------------------------------------------------------------------------
    //GET BOBOT
    function report_bobot_table()
    {
        
        $html = '';
        $no    = 1;
        $query = $this->smart->get_bobot();
        $kriteria = count($this->smart->get('kriteria'));
        foreach ($query as $row) {
          $html .= '<tr>';
          $html .= '<td>'.$no.'.</td>';
          for($i = 1; $i<=$kriteria; $i++) {

              $html .= '<td style="width: 20%;">'.$row['K0'.$i.''].'%</td>';
          }
          $html .= '<td style="width: 15%;">'.$row['Total'].'%</td>';
          $html .= '</tr>';
          $no++;
        
        }
       echo $html;
       

    }
  //-----------------------------------------------------------------------------------------
    //TABLE NORMALISASI BOBOT -----------------------------------------------------------------------------------------------
    //GET BOBOT NORMALISASI
    function repot_bobot_normalisasi_table()
    {
        $html = '';
        $no    = 1;
        $query = $this->smart->get_bobot_normalisasi();
        $kriteria = count($this->smart->get('kriteria'));
          foreach ($query as $row) {
            $html .= '<tr>';
            $html .= '<td>'.$no.'.</td>';
             for($i = 1; $i<=$kriteria; $i++) {
                    $html .= '<td colspan="1" style="width: 20%;">'.number_format($row['K0'.$i.''], 2).'%</td>';
             }
            $html .= '<td style="width: 15%;">'.$row['Total'].'%</td>';
            $html .= '</tr>';
            $no++;
          
          }
       echo $html;
    }

  //-----------------------------------------------------------------------------------------
      //TABLE UTILITY NILAI -----------------------------------------------------------------------------------------------
      //GET UTILITY
      function get_utility_table()
      {
         $html = '';
      $no    = 1;
      $result   = $this->report->get_utility();
      $get_data = count($this->report->get_konversi());
      $kriteria = count($this->smart->get('kriteria'));
      for($i=0; $i<$get_data; $i++)
      {
              $html .= '<tr>';
              $html .= '<td>'.$no.'.</td>';
              $html .= '<td>'.$result['kode'][$i].'</td>';
              $html .= '<td>'.$result['nama'][$i].'</td>';
              for($j = 1; $j<=$kriteria; $j++) {
              $html .= '<td>'.$result['K0'.$j.''][$i].'</td>';
              }
              $html .= '</tr>';
              $no++;
          
        }
     echo $html;
        
      }
      
    //-----------------------------------------------------------------------------------------
      //TABLE NILAI AKHIR -----------------------------------------------------------------------------------------------
      //GET NILAI AKHIR (GET End Of Result Proccess SMART METHOD)
      function get_result_table()
      {
         $html = '';
         $no  = 1;
         $nilai = [];
         $rank  = [];
         $result = $this->report->get_result();
         $get_data = count($this->report->get_konversi());
         for($i=0; $i<$get_data; $i++)
         {
            $nilai[] = $result['nilai'][$i];
            $rank[]  = $result['rank'][$i];
                    
         }
  
         $min1 = min($nilai);
         $max1 = max($nilai);
         
         $min2 = min($rank);
         $max2 = max($rank);
  
         for($i=0; $i<$get_data; $i++)
         {
           
                      $html .= '<tr>';
                      $html .= '<td>'.$no.'.</td>';
                      $html .= '<td>'.$result['kode'][$i].'</td>';
                      $html .= '<td>'.$result['nama'][$i].'</td>';
                      $html .= '<td>'.$result['nilai'][$i].'</td>';
                      $html .= '<td>'.$result['rank'][$i].'</td>';
                      $html .= '<td colspan="3"></td>';
                      $html .= '</tr>';
                      $no++;
       }
                     
        echo $html;
      }


      //-----------------------------------------------------------------------------------------
      //TABLE RANK -----------------------------------------------------------------------------------------------
        function get_result_table1()
        {
           $html = '';
           $no  = 1;
           $nilai = [];
           $rank  = [];
           $result = $this->report->get_result();
           $get_data = count($this->report->get_konversi());
           for($i=0; $i<$get_data; $i++)
           {
              $nilai[] = $result['nilai'][$i];
              $rank[]  = $result['rank'][$i];
                      
           }
    
           $min1 = min($nilai);
           $max1 = max($nilai);
           
           $min2 = min($rank);
           $max2 = max($rank);
    
           for($i=0; $i<$get_data; $i++)
           {
                        $html .= '<tr style="background-color: whitesmoke;">';
                        $html .= '<td colspan="2" >'.$no.'.</td>';
                        $html .= '<td colspan="3" >'.$result['nama'][$i].'</td>';
                        $html .= '<td colspan="3" >'.$result['rank'][$i].'</td>';
                        $html .= '</tr>';
                        $no++;
         }
                       
          echo $html;
        }
    
}