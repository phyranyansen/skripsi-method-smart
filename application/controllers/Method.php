<?php

class Method extends CI_Controller {

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

        $data['title']       = 'Method';
        $data['menu']        = $this->user->get_menu_where();
        $data['alternatif']  = $this->smart->get('pariwisata');
        $data['bobot']       = $this->smart->get_select_bobot();
        $data['utility']     = $this->smart->get_utility();
        $data['access']      = $this->user->get_menu_access();
        $this->load->view('templates/header', $data);
        $this->load->view('pages/method/smart', $data);
        $this->load->view('pages/contents/modal/bobot/bobot_modal', $data);
        $this->load->view('templates/footer');

    }

    //GET Konversi
    function konversi()
    {
        $html = '';
        $no = 1;
        $query = $this->smart->get_konversi();
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
    
        $html .= '<tr style="font-weight:bold; ">';
        $html .= '<td colspan="3">Nilai Tertinggi (MAX)</td>';
        $html .= '<td>' . $max1 . '</td>';
        $html .= '<td>' . $max2 . '</td>';
        $html .= '<td>' . $max3 . '</td>';
        $html .= '<td>' . $max4 . '</td>';
        $html .= '<td>' . $max5 . '</td>';
        $html .= '</tr>';
    
        $html .= '<tr style="font-weight:bold">';
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
    function bobot()
    {
        
        $html = '';
        $no    = 1;
        $query = $this->smart->get_bobot();
        foreach ($query as $row) {
          $html .= '<tr>';
          $html .= '<td>'.$no.'.</td>';
          $html .= '<td style="width: 20%;">'.$row['K01'].'%</td>';
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
    function bobot_normalisasi()
    {
        $html = '';
        $no    = 1;
        $query = $this->smart->get_bobot_normalisasi();
          foreach ($query as $row) {
            $html .= '<tr>';
            $html .= '<td>'.$no.'.</td>';
            $html .= '<td style="width: 20%;">'.$row['K01'].'</td>';
            $html .= '<td style="width: 15%;">'.$row['K02'].'</td>';
            $html .= '<td style="width: 20%;">'.$row['K03'].'</td>';
            $html .= '<td style="width: 15%;">'.$row['K04'].'</td>';
            $html .= '<td style="width: 15%;">'.$row['K05'].'</td>';
            $html .= '<td style="width: 15%;">'.$row['Total'].'</td>';
            $html .= '</tr>';
            $no++;
          
          }
       echo $html;
    }
    

    //GET UTILITY
    function get_utility()
    {
      $html = '';
      $no    = 1;
      $result   = $this->smart->get_utility();
      $get_data = count($this->smart->get_konversi());
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
    function get_result()
    {
       $html = '';
       $no  = 1;
       $nilai = [];
       $rank  = [];
       $result = $this->smart->get_result();
       $get_data = count($this->smart->get_konversi());
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
                    $html .= '</tr>';
                    $no++;
     }
                  // $html .= '<tr>';
                  // $html .= '<th colspan="3">Nilai Tertinggi (MAX)</th>';
                  // $html .= '<th>'.$max1.'</th>';
                  // $html .= '<th>'.$max2.'</th>';
                  // $html .= '</tr>';

                  // $html .= '<tr>';
                  // $html .= '<th colspan="3">Nilai Terendah (MIN)</th>';
                  // $html .= '<th>'.$min1.'</th>';
                  // $html .= '<th>'.$min2.'</th>';
                  // $html .= '</tr>';
                  
      echo $html;
    }



  

}