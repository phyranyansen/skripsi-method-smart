<?php

class Report extends CI_Controller {

    public function index()
    {
        $data['title']     = 'Laporan';
        $data['list']      = $this->report->get();
        $data['wisata']    = $this->wisata->get();
        $this->load->view('templates/header', $data);
        $this->load->view('pages/data_report', $data);
        $this->load->view('pages/contents/report/modal/modal_report_pariwisata', $data);
        $this->load->view('templates/footer');
    }

   
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
        $data['kode']     = 'RP-WST';
        $data['utility']  = $this->report->get_utility();
        $this->load->view('pages/contents/report/templates/header', $data);
        $this->load->view('pages/contents/report/report_pariwisata', $data);
        $this->load->view('pages/contents/report/modal/modal_report_pariwisata', $data);
		$this->load->view('pages/contents/report/templates/footer');
    }

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
                $html .= '</tr>';
                $no++;
            
         }
        echo $html;
    }

    public function report_konversi_table()
    {
      
        $html = '';
        $no = 1;
        $query = $this->report->get_konversi();
        $k1 = [];
        $k2 = [];
        $k3 = [];
        $k4 = [];
        $k5 = [];
    
        foreach ($query as $row) {
            $html .= '<tr>';
            $html .= '<td>' . $no . '.</td>';
            $html .= '<td>' . $row['Kode_Pariwisata'] . '</td>';
            $html .= '<td>' . $row['Nama_Pariwisata'] . '</td>';
            $html .= '<td>' . $row['K01'] . '</td>';
            $html .= '<td>' . $row['K02'] . '</td>';
            $html .= '<td>' . $row['K03'] . '</td>';
            $html .= '<td>' . $row['K04'] . '</td>';
            $html .= '<td>' . $row['K05'] . '</td>';
            $html .= '</tr>';
            $no++;
    
            $k1[] = $row['K01'];
            $k2[] = $row['K02'];
            $k3[] = $row['K03'];
            $k4[] = $row['K04'];
            $k5[] = $row['K05'];
        }
    
        $max1 = max($k1);
        $max2 = max($k2);
        $max3 = max($k3);
        $max4 = max($k4);
        $max5 = max($k5);
    
        $min1 = min($k1);
        $min2 = min($k2);
        $min3 = min($k3);
        $min4 = min($k4);
        $min5 = min($k5);
    
        $html .= '<tr style="background-color:khaki;">';
        $html .= '<td colspan="3">Nilai Tertinggi (MAX)</td>';
        $html .= '<td>' . $max1 . '</td>';
        $html .= '<td>' . $max2 . '</td>';
        $html .= '<td>' . $max3 . '</td>';
        $html .= '<td>' . $max4 . '</td>';
        $html .= '<td>' . $max5 . '</td>';
        $html .= '</tr>';
    
        $html .= '<tr style="background-color:lightblue">';
        $html .= '<td colspan="3">Nilai Terendah (MIN)</td>';
        $html .= '<td>' . $min1 . '</td>';
        $html .= '<td>' . $min2 . '</td>';
        $html .= '<td>' . $min3 . '</td>';
        $html .= '<td>' . $min4 . '</td>';
        $html .= '<td>' . $min5 . '</td>';
        $html .= '</tr>';
    
        echo $html;
    }


    //GET BOBOT
    function report_bobot_table()
    {
        
        $html = '';
        $no    = 1;
        $query = $this->smart->get_bobot();
        foreach ($query as $row) {
          $html .= '<tr>';
          $html .= '<td colspan="1" style="width: 20%;">'.$row['K01'].'%</td>';
          $html .= '<td style="width: 15%;">'.$row['K02'].'%</td>';
          $html .= '<td style="width: 20%;">'.$row['K03'].'%</td>';
          $html .= '<td style="width: 15%;">'.$row['K04'].'%</td>';
          $html .= '<td style="width: 15%;">'.$row['K05'].'%</td>';
          $html .= '<td style="width: 15%;">'.$row['Total'].'%</td>';
          $html .= '</tr>';
          $no++;
        
        }
       echo $html;

    }

    //GET BOBOT NORMALISASI
    function repot_bobot_normalisasi_table()
    {
        $html = '';
        $no    = 1;
        $query = $this->smart->get_bobot_normalisasi();
          foreach ($query as $row) {
            $html .= '<tr>';
            $html .= '<td colspan="1" style="width: 20%;">'.$row['K01'].'%</td>';
            $html .= '<td style="width: 15%;">'.$row['K02'].'%</td>';
            $html .= '<td style="width: 20%;">'.$row['K03'].'%</td>';
            $html .= '<td style="width: 15%;">'.$row['K04'].'%</td>';
            $html .= '<td style="width: 15%;">'.$row['K05'].'%</td>';
            $html .= '<td style="width: 15%;">'.$row['Total'].'%</td>';
            $html .= '</tr>';
            $no++;
          
          }
       echo $html;
    }


      //GET UTILITY
      function get_utility_table()
      {
        $html = '';
        $no    = 1;
        $result   = $this->report->get_utility();
        $get_data = count($this->report->get_konversi());
        for($i=0; $i<$get_data; $i++)
        {
                $html .= '<tr>';
                $html .= '<td>'.$no.'.</td>';
                $html .= '<td>'.$result['kode'][$i].'</td>';
                $html .= '<td>'.$result['nama'][$i].'</td>';
                $html .= '<td>'.$result['K01'][$i].'</td>';
                $html .= '<td>'.$result['K02'][$i].'</td>';
                $html .= '<td>'.$result['K03'][$i].'</td>';
                $html .= '<td>'.$result['K04'][$i].'</td>';
                $html .= '<td>'.$result['K05'][$i].'</td>';
                $html .= '</tr>';
                $no++;
            
          }
       echo $html;
        
      }
      
  
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
    
}