<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once APPPATH . 'third_party/spout/src/Spout/Autoloader/autoload.php';
// require_once 'third_party/spout/src/Spout/Autoloader/autoload.php';

use Box\Spout\Reader\Common\Creator\ReaderEntityFactory;

class Pariwisata extends CI_Controller {

    public function index()
    {
        $data['title'] = 'Pariwisata';
        $data['list']  = $this->wisata->get();
        $this->load->view('templates/header', $data);
        $this->load->view('pages/data_pariwisata', $data);
        $this->load->view('pages/contents/modal/pariwisata/pariwisata_modal', $data);
        $this->load->view('templates/footer');

    }


    //tambah
    public function add()
    {
        $pariwisata = $this->wisata->get();
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

    //upload
  
public function upload()
    {
        
        $pariwisata = $this->wisata->get();
        //upload
        $config['upload_path']      = './assets/admin/tmp_doc/'; 
        $config['allowed_types']    = 'xlsx|xls'; 
        $config['file_name']        = $_FILES['excel']['name'];
        $array   = [];
        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        if ($this->upload->do_upload('excel')) {
            $file   = $this->upload->data();

            $reader = ReaderEntityFactory::createXLSXReader(); //buat xlsx reader
            $reader->open('./assets/admin/tmp_doc/' . $file['file_name']);
            foreach ($reader->getSheetIterator() as $sheet) {
                $numRow = 1;
                $array  = [];
                $save   = [];
                $code   = [];

                //Random Code untuk save konversi di model agar tidak terjadi duplikasi data
                 $random = null;

                $no = 0;
                foreach ($sheet->getRowIterator() as $row) {

                    if ($numRow > 1) {
                        $cells = $row->getCells();
                            $data = array(
                                'Kode_Pariwisata'        => 'PRW/'.date('Y').'/00'.count($pariwisata)+$no,
                                'Nama_Pariwisata'        => $cells[0],
                                'Jarak'                  => $cells[1],
                                'Tiket_Masuk'            => $cells[2],
                                'Jam_Operasional'        => $cells[3],
                                'Aksebility'             => $cells[4],
                                'Fasilitas'              => $cells[5],
                                'CreatedBy'              => 0,
                                'CreatedDate'            => date('Y-m-d')
                              
                            );
                        //tambahkan array $data ke $save
                        array_push($save, $data);
                       
                    }

                    $numRow++;
                    $no++;
                }
             
            $get_check = $this->wisata->get();
            $cek       = null;
           
             foreach($save as $row)
             {
                foreach($get_check as $r)
                {
                    if($row['Nama_Pariwisata']==$r['Nama_Pariwisata'])
                    {
                        $cek = $row['Nama_Pariwisata'];
                    }
                }
                
                $where  = ['Nama_Pariwisata' => $cek];
                $random = date('Y/').count($pariwisata)+1;
                     $array[] = [
                        'Kode_Pariwisata' => $row['Kode_Pariwisata'],
                        'Nama_Pariwisata' => $row['Nama_Pariwisata'],
                        'Jarak'           => $row['Jarak'],
                        'Tiket_Masuk'     => $row['Tiket_Masuk'],
                        'Jam_Operasional' => $row['Jam_Operasional'],
                        'Aksebility'      => $row['Aksebility'],
                        'Fasilitas'       => $row['Fasilitas'],
                        'CreatedBy'       => $row['CreatedBy'],
                        'CreatedDate'     => $row['CreatedDate'],
                        'RandomCode'      => $random,
                     ];

                    
                    
             }   
            
          
             $find    = $this->wisata->get_where($where);
             if($find==null)
             {
                $this->wisata->save_multi($array);
                $this->smart->save_konversi($random);
                echo json_encode(array(
                    "statusCode" =>200,
                    "pesan"      =>"Upload data berhasil!"
                ));
                // unlink('./assets/admin/tmp_doc/' . $file['file_name']);
            }else{
                echo json_encode(array(
                    "statusCode" =>400,
                    "pesan"      =>"Gagal upload. Data '<strong>".$find['Nama_Pariwisata']."</strong>' sudah ada dalam database!"
                ));
               
             }

          }
        } else {
            echo json_encode(array(
                "statusCode"=>400,
                "pesan"  => "Upload data gagal!"
            ));
        }
    }


    public function delete()
    {
        
        $where = [
            'Kode_Pariwisata' => $_POST['kode_wisata']
        ];

        $this->wisata->delete($where);
        $this->wisata->delete_konversi_where($where);
       
        $find = $this->wisata->get_where($where);
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

    public function delete_all()
    {
        $delete = $this->wisata->delete_all();
        $find   = $this->wisata->get();
        if($delete)
        {
           if($find==null)
           {
                $delete = $this->wisata->delete_konversi();
                $message = [
                    'statusCode'    => 200,
                    'pesan'         => 'Data telah dihapus!'
                ];
                
                echo json_encode($message);
            }else{
               $message = [
                   'statusCode'    => 400,
                   'pesan'         => 'Data gagal dihapus!'
               ];
           }
        }
    }



}