<?php

class Bobot extends CI_Controller {
  
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
        $data['title']     = 'Bobot';
        $data['kriteria']  = $this->kriteria->get();
        $data['bobot']     = $this->smart->get_select_bobot();
        $this->load->view('templates/header', $data);
        $this->load->view('pages/data_bobot', $data);
        $this->load->view('pages/contents/modal/bobot/bobot_modal', $data);
        $this->load->view('templates/footer');
    }


    //GET BOBOT
    function bobot_get()
    {
        
        $html = '';
        $no    = 1;
        $query = $this->bobot->get_select_bobot();
        foreach ($query as $row) {
          $html .= '<tr>';
          $html .= '<td>'.$no.'.</td>';
          $html .= '<td style="width: 20%;">'.$row['Kode_Kriteria'].'</td>';
          $html .= '<td>'.$row['Nama_Kriteria'].'</td>';
          $html .= '<td style="width: 20%;">'.$row['Nilai'].'%</td>';
          $html .= '<td style="width: 6%;"><a href="" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#ganti-bobot"><i class="fa fa-pencil"></i></a></td>';
          $html .= '</tr>';
          $no++;
        
        }
       echo $html;

    }


      //EDIT BOBOT VALUE
      function edit_bobot()
      { 
          $where = [
            'Id_Kriteria' => $_POST['id_kriteria']
          ];
          $data  = ['Bobot' => $_POST['bobot']];
          $save  = $this->smart->update_bobot('bobot', $where, $data);
          $find  = $this->smart->get_where('bobot', $where);
  
            if($find['Bobot']==$_POST['bobot'])
            {
              $messge = [
                'statusCode'  => 200,
                'pesan'       => 'Berhasil mengubah nilai Bobot!'
              ];
              echo json_encode($messge);
            }else{
              $messge = [
                'statusCode'  => 400,
                'pesan'       => 'Gagal mengubah nilai Bobot!'
              ];
              echo json_encode($messge);
    
            }
      }
  
      function showing_bobot_value()
      {
        $where = [
          'Id_Kriteria'	=> $_POST['id_kriteria']
        ];
    
        $result = $this->smart->get_where('bobot', $where);
        $data   = [
          'id'	  => $result['Id_Kriteria'],
          'bobot'	=> $result['Bobot']
        ];
    
        echo json_encode($data);
      }

}