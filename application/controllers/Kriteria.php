<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once APPPATH . 'third_party/spout/src/Spout/Autoloader/autoload.php';
// require_once 'third_party/spout/src/Spout/Autoloader/autoload.php';

use Box\Spout\Reader\Common\Creator\ReaderEntityFactory;

class Kriteria extends CI_Controller {
  
    public function __construct()
    {
        parent::__construct();
        $cek = $this->session->userdata('login');
        $url =   $url = current_url();
        $url_cek = $this->session->userdata('url-server');
        $where = [
                    'Id_Login' => $this->session->userdata('id_login'),
                    'Link'     => 'kriteria',
                    'Status'   => 1
                 ];
        $menu  = $this->db->get_where('menu', $where)->row_array();
           
            if($cek!='logged_in')
            {
                    if($url!=$url_cek)
                    {
                        redirect(base_url());
  
                    }
                    
            }else{
                if($menu['Status']==0)
                {
                    redirect(base_url());
                }
            }   
    }

    
    public function index()
    {
        $data['title']     = 'Kriteria';
        $data['menu']      = $this->user->get_menu_where();
        $data['list']      = $this->kriteria->get();
        $data['kriteria']  = $this->kriteria->get_kriteria();
        $data['access']    = $this->user->get_menu_access();
        $this->load->view('templates/header', $data);
        $this->load->view('pages/data_kriteria', $data);
        $this->load->view('pages/contents/modal/kriteria/kriteria_modal', $data);
        $this->load->view('pages/contents/modal/kriteria/kriteria_detail_modal', $data);
        $this->load->view('templates/footer');

    }

   
    //tambah
    public function add()
    {
        $kriteria = $this->kriteria->get();
        $data = [
            'Nama_Kriteria'     => $_POST['nama_kriteria'],
            'Atribut'           => $_POST['atribut'],
            'Kode_Kriteria'     => 'K0'.count($kriteria)+1,
            'CreatedBy'         => $this->session->userdata('id_login'),
            'CreatedDate'       => date('Y-m-d')
        ];
        $where = ['Nama_Kriteria' => $_POST['nama_kriteria']];
        $find  = $this->kriteria->get_where($where);
        
          
        if($find!=null)
        {
            echo json_encode(
                array("statusCode"=>400,
                "pesan"  => "Gagal menyimpan. Kriteria '<strong>".$find['Nama_Kriteria']."</strong>' sudah ada dalam database!")
            );
        }else{
            $this->kriteria->save($data);
            echo json_encode(
                array("statusCode"=>200,
                "pesan"  => "Data berhasil disimpan!")
            );

        }
    }


    public function edit()
    {

        if(empty($_POST['simpan']))
        {
            $where = [
                'Id_Kriteria' => $_POST['id_kriteria']
            ];
    
            $result = $this->kriteria->get_where($where);
            if(!empty($result))
            {
                $data = [
                    'nama'          => $result['Nama_Kriteria'],
                    'atribut'       => $result['Atribut'],
                    'id_kriteria'   => $result['Id_Kriteria']
                ];
                echo json_encode(
                    array("statusCode"=>200,
                    "pesan"  => "Get berhasil disimpan!",
                    "data"   => $data
                    )
                );
                
    
            }
        }else{
          $this->save_edit();
          
        }

    }

    private function save_edit()
    {
        $where  = ['Id_Kriteria' => $_POST['id_kriteria']];
        $data = [
            'Nama_Kriteria'   => $_POST['nama_kriteria'],
            'Atribut'         => $_POST['atribut'],
            'CreatedBy'       => $this->session->userdata('id_login'),
            'CreatedDate'     => date('Y-m-d')
        ];

        $this->kriteria->edit($where, $data);
        echo json_encode(
            array("statusCode"=>200,
            "pesan"  => "Data berhasil disimpan!")
        );
    }


    //Delete Kriteria
    public function delete()
    {
        
        $where = [
            'Id_Kriteria' => $_POST['id_kriteria']
        ];

        $this->kriteria->delete($where);
       
        $find = $this->kriteria->get_where($where);
        if($find==null)
        {
            echo json_encode(array(
                "statusCode" =>200,
                "pesan"      =>"Hapus data berhasil!"
            ));
        }else{
            echo json_encode(array(
                "statusCode"=>400,
                "pesan"  => "Hapus data gagal!"
            ));
        }
    }


    public function detail_add()
    {
            $data = [
                'Id_Kriteria'       => $_POST['kriteria'],
                'Nilai_Kualitatif'  => $_POST['kualitatif'],
                'Nilai_Kuantitatif' => $_POST['kuantitatif'],
                'Keterangan'        => $_POST['keterangan']
            ];
            
            $this->kriteria->save_detail($data);
            echo json_encode(
                array("statusCode"=>200,
                "pesan"  => "Data berhasil disimpan!")
            );
    }

   //Delete Kriteria Detail
    public function delete_detail()
    {
        
        $where = [
            'Id_Kriteria_Detail' => $_POST['id_kriteria']
        ];

        $this->kriteria->delete_detail($where);
       
        $find = $this->kriteria->get_detail($where);
        if($find==null)
        {
            echo json_encode(array(
                "statusCode" =>200,
                "pesan"      =>"Hapus data berhasil!"
            ));
        }else{
            echo json_encode(array(
                "statusCode"=>400,
                "pesan"  => "Hapus data gagal!"
            ));
        }
    }

    public function edit_detail()
    {

        if(empty($_POST['simpan']))
        {
            $where = [
                'Id_Kriteria_Detail' => $_POST['id_detail']
            ];
    
            $result = $this->kriteria->get_detail($where);
            if(!empty($result))
            {
                $data = [
                    'id_detail'     => $result['Id_Kriteria_Detail'],
                    'kualitatif'    => $result['Nilai_Kualitatif'],
                    'kuantitatif'   => $result['Nilai_Kuantitatif'],
                    'keterangan'    => $result['Keterangan']
                ];
                echo json_encode(
                    array("statusCode"=>200,
                    "pesan"  => "Get berhasil disimpan!",
                    "data"   => $data
                    )
                );
                
    
            }
        }else{
          $this->save_edit_detail();
          
        }

    }

    private function save_edit_detail()
    {
        $where  = ['Id_Kriteria_Detail' => $_POST['id_detail']];
        $data = [
                'Id_Kriteria'       => $_POST['kriteria'],
                'Nilai_Kualitatif'  => $_POST['kualitatif'],
                'Nilai_Kuantitatif' => $_POST['kuantitatif'],
                'Keterangan'        => $_POST['keterangan']
            ];
        $this->kriteria->edit_detail($where, $data);
        echo json_encode(
            array("statusCode"=>200,
            "pesan"  => "Data berhasil disimpan!")
        );
    }


}