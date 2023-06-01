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

        //   echo "<pre>";
        //   print_r($this->smart->get_utility());
        //   echo "<pre>";
        $data['title']       = 'Method';
        $data['menu']        = $this->user->get_menu_where();
        $data['alternatif']  = $this->smart->get('pariwisata');
        $data['bobot']       = $this->smart->get_select_bobot();
        $data['utility']     = $this->smart->get_utility();
        $data['access']      = $this->user->get_menu_access();
        $data['kriteria']    = $this->smart->get('kriteria');
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

    $kriteriaColumns = array_keys($query[0]);
    $kriteriaColumns = array_diff($kriteriaColumns, array('Kode_Pariwisata', 'Nama_Pariwisata')); // Menghapus kolom 'Kode_Pariwisata' dan 'Nama_Pariwisata'

    $kriteriaMax = [];
    $kriteriaMin = [];

    foreach ($kriteriaColumns as $kriteria) {
        $kriteriaValues = array_column($query, $kriteria);

        if (!empty($kriteriaValues)) {
            $kriteriaMax[$kriteria] = max($kriteriaValues);
            $kriteriaMin[$kriteria] = min($kriteriaValues);
        } else {
            $kriteriaMax[$kriteria] = null;
            $kriteriaMin[$kriteria] = null;
        }
    }

    foreach ($query as $row) {
        $html .= '<tr>';
        $html .= '<td>' . $no . '.</td>';
        $html .= '<td>' . $row['Kode_Pariwisata'] . '</td>';
        $html .= '<td>' . $row['Nama_Pariwisata'] . '</td>';

        foreach ($kriteriaColumns as $kriteria) {
            $html .= '<td>' . $row[$kriteria] . '</td>';
        }

        $html .= '</tr>';
        $no++;
    }

    $html .= '<tr style="font-weight:bold">';
    $html .= '<td colspan="3">Nilai Tertinggi (MAX)</td>';
    foreach ($kriteriaColumns as $kriteria) {
        $html .= '<td>' . ($kriteriaMax[$kriteria] !== null ? $kriteriaMax[$kriteria] : '-') . '</td>';
    }
    $html .= '</tr>';

    $html .= '<tr style="font-weight:bold">';
    $html .= '<td colspan="3">Nilai Terendah (MIN)</td>';
    foreach ($kriteriaColumns as $kriteria) {
        $html .= '<td>' . ($kriteriaMin[$kriteria] !== null ? $kriteriaMin[$kriteria] : '-') . '</td>';
    }
    $html .= '</tr>';

    echo $html;
}




    //GET BOBOT
    function bobot()
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

    //GET BOBOT NORMALISASI
    function bobot_normalisasi()
    {
        $html = '';
        $no    = 1;
        $query = $this->smart->get_bobot_normalisasi();
        $kriteria = count($this->smart->get('kriteria'));
          foreach ($query as $row) {
            $html .= '<tr>';
            $html .= '<td>'.$no.'.</td>';
                for($i = 1; $i<=$kriteria; $i++) {
            $html .= '<td style="width: 20%;">'.number_format($row['K01'], 2).'</td>';
                }
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