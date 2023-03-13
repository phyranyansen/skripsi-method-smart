<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once APPPATH . 'third_party/spout/src/Spout/Autoloader/autoload.php';
// require_once 'third_party/spout/src/Spout/Autoloader/autoload.php';

use Box\Spout\Reader\Common\Creator\ReaderEntityFactory;

class Kriteria extends CI_Controller {

    public function index()
    {
        $data['title']     = 'Kriteria';
        $data['list']      = $this->kriteria->get();
        $data['kriteria']  = $this->kriteria->get_kriteria();
        $this->load->view('templates/header', $data);
        $this->load->view('pages/data_kriteria', $data);
        $this->load->view('pages/contents/modal/kriteria/kriteria_modal', $data);
        $this->load->view('templates/footer');

    }

   
    //tambah
    public function add()
    {
        $pariwisata = $this->kriteria->get();
        $data = [
            'Nama_Pariwisata'   => $_POST['nama_pariwisata'],
            'Alamat'            => $_POST['alamat'],
            'Kode_Pariwisata'   => 'PRW/'.date('Y').'/00'.count($pariwisata)+1,
            'CreatedBy'         => 0,
            'CreatedDate'       => date('Y-m-d')
        ];
        $where = ['Nama_Pariwisata' => $_POST['nama_pariwisata']];
        $find  = $this->wisata->get_where($where);
        
          
        if($find!=null)
        {
            echo json_encode(
                array("statusCode"=>400,
                "pesan"  => "Gagal menyimpan. Data '<strong>".$find['Nama_Pariwisata']."</strong>' sudah ada dalam database!")
            );
        }else{
            $this->wisata->save($data);
            echo json_encode(
                array("statusCode"=>200,
                "pesan"  => "Data berhasil disimpan!")
            );

        }
    }


    public function delete()
    {
        
        $where = [
            'Id_Pariwisata' => $_POST['id_wisata']
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



}