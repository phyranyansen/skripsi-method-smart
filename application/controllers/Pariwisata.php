<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once APPPATH . 'third_party/spout/src/Spout/Autoloader/autoload.php';
// require_once 'third_party/spout/src/Spout/Autoloader/autoload.php';

use Box\Spout\Reader\Common\Creator\ReaderEntityFactory;

class Pariwisata extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $cek = $this->session->userdata('login');
        $url =   $url = current_url();
        $url_cek = $this->session->userdata('url-server');
        $where = [
            'Id_Login' => $this->session->userdata('id_login'),
            'Link'     => 'pariwisata',
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
        $data['title']   = 'Pariwisata';
        $data['menu']    = $this->user->get_menu_where();
        $data['access']  = $this->user->get_menu_access();
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
        $random = date('Y/').count($pariwisata)+1;
        $data = [
           'Kode_Pariwisata'   => 'PRW/'.date('Y').'/00'.count($pariwisata)+1,
           'Nama_Pariwisata' => $_POST['nama_pariwisata'],
           'Jarak'           => $_POST['jarak'],
           'Tiket_Masuk'     => $_POST['tiket_masuk'],
           'Jam_Operasional' => $_POST['jam_operasional'],
           'Aksebility'      => $_POST['aksebility'],
           'Fasilitas'       => $_POST['fasilitas'],
           'Penjualan_Tiket' => $_POST['penjualan_tiket'],
           'Metode_Pembayaran' => $_POST['pembayaran'],
           'Akses_Wifi'      => $_POST['akses_wifi'],
           'Informasi_Event' => $_POST['informasi_event'],
           'Informasi_Diskon'=> $_POST['Informasi_Diskon'],
           'Spot_Foto'       => $_POST['Spot_Foto'],
           'Informasi'       => $_POST['Informasi'],
           'CreatedBy'       => $this->session->userdata('id_login'),
           'CreatedDate'     => date('Y-m-d'),
           'RandomCode'      => $random,
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
            $this->smart->save_konversi($random);
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
                                'Penjualan_Tiket'        => $cells[6],
                                'Metode_Pembayaran'      => $cells[7],
                                'Akses_Wifi'             => $cells[8],
                                'Informasi_Event'        => $cells[9],
                                'Informasi_Diskon'       => $cells[10],
                                'Spot_Foto'              => $cells[11],
                                'Informasi'              => $cells[12],
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
                        'Kode_Pariwisata'        => $row['Kode_Pariwisata'],
                        'Nama_Pariwisata'        => $row['Nama_Pariwisata'],
                        'Jarak'                  => $row['Jarak'],
                        'Tiket_Masuk'            => $row['Tiket_Masuk'],
                        'Jam_Operasional'        => $row['Jam_Operasional'],
                        'Aksebility'             => $row['Aksebility'],
                        'Fasilitas'              => $row['Fasilitas'],
                        'Penjualan_Tiket'        => $row['Penjualan_Tiket'],
                        'Metode_Pembayaran'      => $row['Metode_Pembayaran'],
                        'Akses_Wifi'             => $row['Akses_Wifi'],
                        'Informasi_Event'        => $row['Informasi_Event'],
                        'Informasi_Diskon'       => $row['Informasi_Diskon'],
                        'Spot_Foto'              => $row['Spot_Foto'],
                        'Informasi'              => $row['Informasi'],
                        'CreatedBy'              => $row['CreatedBy'],
                        'CreatedDate'            => $row['CreatedDate'],
                        'RandomCode'             => $random,
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



    public function edit()
    {

        if(empty($_POST['simpan']))
        {
            $where = [
                'Id_Pariwisata' => $_POST['id_wisata']
            ];
    
            $result = $this->wisata->get_where($where);
            if(!empty($result))
            {
                $data = [
                    'nama'        => $result['Nama_Pariwisata'],
                    'jarak'       => $result['Jarak'],
                    'harga'       => $result['Tiket_Masuk'],
                    'jam'         => $result['Jam_Operasional'],
                    'akses'       => $result['Aksebility'],
                    'fasilitas'   => $result['Fasilitas'],
                    'kode'        => $result['Kode_Pariwisata'],
                    'id_wisata'   => $result['Id_Pariwisata']
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
        $where  = ['Id_Pariwisata' => $_POST['id_wisata']];
        $kode   = $_POST['kode'];
        $data = [
            'Nama_Pariwisata' => $_POST['nama_pariwisata'],
            'Jarak'           => $_POST['jarak'],
            'Tiket_Masuk'     => $_POST['tiket_masuk'],
            'Jam_Operasional' => $_POST['jam_operasional'],
            'Aksebility'      => $_POST['aksebility'],
            'Fasilitas'       => $_POST['fasilitas'],
            'CreatedBy'       => $this->session->userdata('id_login'),
            'CreatedDate'     => date('Y-m-d')
        ];

        $this->wisata->edit($where, $data);
        $this->smart->update_konversi($kode);
        echo json_encode(
            array("statusCode"=>200,
            "pesan"  => "Data berhasil disimpan!")
        );
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