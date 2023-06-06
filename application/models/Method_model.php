<?php

class Method_model extends CI_Model {
    
    function get($table)
    {
        $query = $this->db->get($table);
        return $query->result_array();
    }
    
    function get_where($table, $where)
    {
        $query = $this->db->get_where($table, $where);
        return $query->row_array();
    }

    function update_bobot($table, $where, $data)
    {
       $this->db->where($where);
       $this->db->update($table, $data);
    }

    //GET Select Bobot
    function get_select_bobot()
    {
        $query = $this->db->query("SELECT a.*, b.Nama_Kriteria 
                                  FROM bobot a 
                                  LEFT JOIN kriteria b ON b.Id_kriteria = a.Id_Kriteria");
                                return $query->result_array();
    }

    //GET Detail Kriteria
    function get_detail()
    {
        $query = $this->db->query("SELECT a.Keterangan, a.Rate, b.Nama_Kriteria, a.Id_Kriteria, a.Id_Kriteria_Detail
        FROM kriteria_detail a 
        JOIN kriteria b ON b.Id_Kriteria = a.Id_Kriteria;      
        ");
        return $query->result_array();
    }


    //GET Bobot
   function get_bobot()
    {
        $query = "SELECT ";
         $jumlah_kriteria = count($this->get('kriteria'));
        for ($i = 1; $i <= $jumlah_kriteria; $i++) {
            $query .= "MAX(CASE WHEN a.Id_Kriteria = '$i' THEN a.Bobot END) as K0$i";
            
            if ($i < $jumlah_kriteria) {
                $query .= ", ";
            }
        }
        
        $query .= ", SUM(CASE WHEN a.Id_Kriteria IN (";
        
        for ($i = 1; $i <= $jumlah_kriteria; $i++) {
            $query .= "'$i'";
            
            if ($i < $jumlah_kriteria) {
                $query .= ", ";
            }
        }
        
        $query .= ") THEN a.Bobot END) as Total ";
        $query .= "FROM bobot a;";
        
        $result = $this->db->query($query);
        return $result->result_array();
    }





    //GET Normalisasi Bobot
  function get_bobot_normalisasi()
  {
      $query = "SELECT ";
      $jumlah_kriteria = count($this->get('kriteria'));
      for ($i = 1; $i <= $jumlah_kriteria; $i++) {
          $query .= "MAX(CASE WHEN a.Id_Kriteria = '$i' THEN a.Bobot END) / total_bobot as K0$i";
          
          if ($i < $jumlah_kriteria) {
              $query .= ", ";
          }
      }
      
      $query .= ", SUM(CASE WHEN a.Id_Kriteria IN (";
      
      for ($i = 1; $i <= $jumlah_kriteria; $i++) {
          $query .= "'$i'";
          
          if ($i < $jumlah_kriteria) {
              $query .= ", ";
          }
      }
      
      $query .= ") THEN a.Bobot END) / total_bobot as Total ";
      $query .= "FROM bobot a, (SELECT SUM(Bobot) as total_bobot FROM bobot WHERE Id_Kriteria IN (";
      
      for ($i = 1; $i <= $jumlah_kriteria; $i++) {
          $query .= "'$i'";
          
          if ($i < $jumlah_kriteria) {
              $query .= ", ";
          }
      }
      
      $query .= ")) b;";
      
      $result = $this->db->query($query);
      return $result->result_array();
  }



    //GET Konversi
function get_konversi()
{
    $query = "SELECT 
        a.Kode_Pariwisata, 
        b.Nama_Pariwisata";

    $kriteria = $this->get('kriteria');
    $numCriteria = count($kriteria);

    for ($i = 1; $i <= $numCriteria; $i++) {
        $kodeKriteria = ($i >= 10) ? 'K' . str_pad($i, 3, '0', STR_PAD_LEFT) : 'K' . str_pad($i, 2, '0', STR_PAD_LEFT);
        $query .= ", MAX(CASE WHEN x.Kode_Kriteria = '$kodeKriteria' THEN x.Nilai ELSE 0 END) AS $kodeKriteria";
    }

    $query .= " FROM 
        pariwisata b 
        LEFT JOIN konversi a ON b.Kode_Pariwisata = a.Kode_Pariwisata 
        LEFT JOIN konversi x ON a.Kode_Pariwisata = x.Kode_Pariwisata 
    GROUP BY 
        a.Kode_Pariwisata, 
        b.Nama_Pariwisata 
    ORDER BY 
        a.Id_Konversi;";

    $result = $this->db->query($query);
    return $result->result_array();
}




    //GET Utility Value process
   function get_utility()
{
    $get_kriteria = $this->db->get('kriteria')->result_array();
    $numCriteria = count($get_kriteria);
    $criteria = [];
    $result = [];
    $query = $this->get_konversi();

    if (!empty($query)) {
        for ($i = 1; $i <= $numCriteria; $i++) {
            $kriteria = ($i >= 10) ? 'K' . str_pad($i, 3, '0', STR_PAD_LEFT) : 'K' . str_pad($i, 2, '0', STR_PAD_LEFT);
            $criteria[$kriteria] = [];
        }

        foreach ($query as $row) {
            for ($i = 1; $i <= $numCriteria; $i++) {
                $kriteria = ($i >= 10) ? 'K' . str_pad($i, 3, '0', STR_PAD_LEFT) : 'K' . str_pad($i, 2, '0', STR_PAD_LEFT);
                $criteria[$kriteria][] = $row[$kriteria];
            }
        }

        foreach ($criteria as $kriteria => $values) {
            $max = max($values);
            $min = min($values);

            foreach ($query as $row) {
                $result[$kriteria][] = $this->utility($row[$kriteria], $min, $max);
            }
        }

        foreach ($query as $row) {
            $result['kode'][] = $row['Kode_Pariwisata'];
            $result['nama'][] = $row['Nama_Pariwisata'];
        }

        $array_result = [
            'kode' => $result['kode'],
            'nama' => $result['nama']
        ];

        foreach ($result as $kriteria => $values) {
            if ($kriteria !== 'kode' && $kriteria !== 'nama') {
                $array_result[$kriteria] = $values;
            }
        }

        return $array_result;
    }
}




  

    
  private function utility($out, $min, $max)
  {
      // Menambahkan pengecekan untuk memastikan nilai $max - $min tidak sama dengan 0
      if ($max - $min == 0) {
          return 0;
      }
      // Menghitung hasil rumus
      $hasil_rumus = ($out - $min) / ($max - $min);
  
      // Memastikan hasil rumus tidak menghasilkan error (divisi oleh nol)
      if (!is_nan($hasil_rumus) && !is_infinite($hasil_rumus)) {
          $nilai = $hasil_rumus;
      } else {
          $nilai = 0;
      }
  
      return $nilai;
  }



    //GET END OFF RESULT PROCCESS
    function get_result()
    {
        $data      = [];
        $nilai     = [];
        $peringkat = [];
        $get       = count($this->get_konversi());
        $result    = $this->nilai_akhir();

        for($i=0; $i<$get; $i++)
        {
          $data[]   = $result['result'][$i];
          $nilai[]  = $result['result'][$i];
          rsort($data);
        }

        for($i=0; $i<$get; $i++)
        {
           $peringkat['nilai'][] = $nilai[$i];
           $peringkat['rank'][]  = array_search($nilai[$i], $data) + 1;
           $peringkat['nama'][]  = $result['nama'][$i];
           $peringkat['kode'][]  = $result['kode'][$i];
        }

        return $peringkat;
    }

    //proses
private function nilai_akhir()
{
    $utility    = $this->get_utility();
    $bobot      = $this->get_bobot_normalisasi();
    $pariwisata = count($this->wisata->get());
    $kriteria   = count($bobot);
    $array      = [];

    for ($i = 0; $i < $pariwisata; $i++) {
        $nilai_akhir = 0;

        for ($j = 0; $j < $kriteria; $j++) {
            $kriteria_key = 'K' . str_pad(($j + 1), 2, '0', STR_PAD_LEFT);
            $nilai_akhir += $utility[$kriteria_key][$i] * $bobot[$j][$kriteria_key];
        }

        $array['result'][] = $nilai_akhir;
        $array['kode'][]   = $utility['kode'][$i];
        $array['nama'][]   = $utility['nama'][$i];
    }

    return $array;
}



    
    //INSERT KONVERSI
    function save_konversi($random=null)
    {
        if($random!=null)
        {
            $query = $this->db->get_where('pariwisata', ['RandomCode' => $random])->result_array();
            $data = [];
            foreach ($query as $row) {
                $explode_harga = explode('- ', $row['Tiket_Masuk']);
                $explode_jam = explode('- ', $row['Jam_Operasional']);
                $explode_akses = explode(', ', $row['Aksebility']);
                $explode_fasilitas = explode(', ', $row['Fasilitas']);
        
               
                $explode_penjualan  = explode(', ', $row['Penjualan_Tiket']);
                $explode_pembayaran = explode(', ', $row['Metode_Pembayaran']);
                // $explode_akses_wifi = explode(', ', $row['Akses_Wifi']);
                $explode_informasi_event = explode(', ', $row['Informasi_Event']);
                $explode_diskon     = explode(', ', $row['Informasi_Diskon']);
                // $explode_spot       = explode(', ', $row['Spot_Foto']);
                $explode_informasi     = explode(', ', $row['Informasi']);
                
        
                $tarif = $explode_harga[0];
                $jam = $explode_jam[0];
        
                $data[] = [
                    'Kode_Pariwisata' => $row['Kode_Pariwisata'],
                    'Nilai' => $this->jarak($row['Jarak']),
                    'Kode_Kriteria' => 'K01',
                    'CreatedBy' => 0,
                    'CreatedDate' => date('Y-m-d')
                ];
        
                $data[] = [
                    'Kode_Pariwisata' => $row['Kode_Pariwisata'],
                    'Nilai' => $this->harga($tarif),
                    'Kode_Kriteria' => 'K02',
                    'CreatedBy' => 0,
                    'CreatedDate' => date('Y-m-d')
                ];
        
                $data[] = [
                    'Kode_Pariwisata' => $row['Kode_Pariwisata'],
                    'Nilai' => $this->jam($jam),
                    'Kode_Kriteria' => 'K03',
                    'CreatedBy' => 0,
                    'CreatedDate' => date('Y-m-d')
                ];
        
                $data[] = [
                    'Kode_Pariwisata' => $row['Kode_Pariwisata'],
                    'Nilai' => count($explode_akses),
                    'Kode_Kriteria' => 'K04',
                    'CreatedBy' => 0,
                    'CreatedDate' => date('Y-m-d')
                ];
        
                $data[] = [
                    'Kode_Pariwisata' => $row['Kode_Pariwisata'],
                    'Nilai' => count($explode_fasilitas),
                    'Kode_Kriteria' => 'K05',
                    'CreatedBy' => 0,
                    'CreatedDate' => date('Y-m-d')
                ];

                $data[] = [
                    'Kode_Pariwisata' => $row['Kode_Pariwisata'],
                    'Nilai' => count($explode_penjualan),
                    'Kode_Kriteria' => 'K06',
                    'CreatedBy' => 0,
                    'CreatedDate' => date('Y-m-d')
                ];

                $data[] = [
                    'Kode_Pariwisata' => $row['Kode_Pariwisata'],
                    'Nilai' => count($explode_pembayaran),
                    'Kode_Kriteria' => 'K07',
                    'CreatedBy' => 0,
                    'CreatedDate' => date('Y-m-d')
                ];
                
                $data[] = [
                    'Kode_Pariwisata' => $row['Kode_Pariwisata'],
                    'Nilai' => $this->akses_wifi($row['Akses_Wifi']),
                    'Kode_Kriteria' => 'K08',
                    'CreatedBy' => 0,
                    'CreatedDate' => date('Y-m-d')
                ];
                
                $data[] = [
                    'Kode_Pariwisata' => $row['Kode_Pariwisata'],
                    'Nilai' => count($explode_informasi_event),
                    'Kode_Kriteria' => 'K09',
                    'CreatedBy' => 0,
                    'CreatedDate' => date('Y-m-d')
                ];

                $data[] = [
                    'Kode_Pariwisata' => $row['Kode_Pariwisata'],
                    'Nilai' => count($explode_diskon),
                    'Kode_Kriteria' => 'K010',
                    'CreatedBy' => 0,
                    'CreatedDate' => date('Y-m-d')
                ];
                
                $data[] = [
                    'Kode_Pariwisata' => $row['Kode_Pariwisata'],
                    'Nilai' => $this->spot_foto($row['Spot_Foto']),
                    'Kode_Kriteria' => 'K011',
                    'CreatedBy' => 0,
                    'CreatedDate' => date('Y-m-d')
                ];
                $data[] = [
                    'Kode_Pariwisata' => $row['Kode_Pariwisata'],
                    'Nilai' => count($explode_informasi),
                    'Kode_Kriteria' => 'K012',
                    'CreatedBy' => 0,
                    'CreatedDate' => date('Y-m-d')
                ];
            }
        
            $this->db->insert_batch('konversi', $data);

        }
      
    }


    //INSERT KONVERSI
    function update_konversi($kode=null)
    {
        if($kode!=null)
        {
            $query  = $this->db->get_where('pariwisata', ['Kode_Pariwisata' => $kode])->result_array();
            $result = $this->db->get_where('pariwisata', ['Kode_Pariwisata' => $kode])->row_array();
            $data = [];
            foreach ($query as $row) {
                $explode_harga = explode('- ', $row['Tiket_Masuk']);
                $explode_jam = explode('- ', $row['Jam_Operasional']);
                $explode_akses = explode(', ', $row['Aksebility']);
                $explode_fasilitas = explode(', ', $row['Fasilitas']);

                $explode_penjualan  = explode(', ', $row['Penjualan_Tiket']);
                $explode_pembayaran = explode(', ', $row['Metode_Pembayaran']);
                // $explode_akses_wifi =  $row['Akses_Wifi'];
                $explode_informasi_event = explode(', ', $row['Informasi_Event']);
                $explode_diskon     = explode(', ', $row['Informasi_Diskon']);
                // $explode_spot       = $row['Spot_Foto'];
                $explode_informasi     = explode(', ', $row['Informasi']);
                
        
                $tarif = $explode_harga[0];
                $jam = $explode_jam[0];
        
                $data[] = [
                    'Kode_Pariwisata' => $row['Kode_Pariwisata'],
                    'Nilai' => $this->jarak($row['Jarak']),
                    'Kode_Kriteria' => 'K01',
                    'CreatedBy' => 0,
                    'CreatedDate' => date('Y-m-d')
                ];
        
                $data[] = [
                    'Kode_Pariwisata' => $row['Kode_Pariwisata'],
                    'Nilai' => $this->harga($tarif),
                    'Kode_Kriteria' => 'K02',
                    'CreatedBy' => 0,
                    'CreatedDate' => date('Y-m-d')
                ];
        
                $data[] = [
                    'Kode_Pariwisata' => $row['Kode_Pariwisata'],
                    'Nilai' => $this->jam($jam),
                    'Kode_Kriteria' => 'K03',
                    'CreatedBy' => 0,
                    'CreatedDate' => date('Y-m-d')
                ];
        
                $data[] = [
                    'Kode_Pariwisata' => $row['Kode_Pariwisata'],
                    'Nilai' => count($explode_akses),
                    'Kode_Kriteria' => 'K04',
                    'CreatedBy' => 0,
                    'CreatedDate' => date('Y-m-d')
                ];
        
                $data[] = [
                    'Kode_Pariwisata' => $row['Kode_Pariwisata'],
                    'Nilai' => count($explode_fasilitas),
                    'Kode_Kriteria' => 'K05',
                    'CreatedBy' => 0,
                    'CreatedDate' => date('Y-m-d')
                ];

                $data[] = [
                    'Kode_Pariwisata' => $row['Kode_Pariwisata'],
                    'Nilai' => count($explode_penjualan),
                    'Kode_Kriteria' => 'K06',
                    'CreatedBy' => 0,
                    'CreatedDate' => date('Y-m-d')
                ];

                $data[] = [
                    'Kode_Pariwisata' => $row['Kode_Pariwisata'],
                    'Nilai' => count($explode_pembayaran),
                    'Kode_Kriteria' => 'K07',
                    'CreatedBy' => 0,
                    'CreatedDate' => date('Y-m-d')
                ];
                
                $data[] = [
                    'Kode_Pariwisata' => $row['Kode_Pariwisata'],
                    'Nilai' => $this->akses_wifi($row['Akses_Wifi']),
                    'Kode_Kriteria' => 'K08',
                    'CreatedBy' => 0,
                    'CreatedDate' => date('Y-m-d')
                ];
                
                $data[] = [
                    'Kode_Pariwisata' => $row['Kode_Pariwisata'],
                    'Nilai' => count($explode_informasi_event),
                    'Kode_Kriteria' => 'K09',
                    'CreatedBy' => 0,
                    'CreatedDate' => date('Y-m-d')
                ];

                $data[] = [
                    'Kode_Pariwisata' => $row['Kode_Pariwisata'],
                    'Nilai' => count($explode_diskon),
                    'Kode_Kriteria' => 'K010',
                    'CreatedBy' => 0,
                    'CreatedDate' => date('Y-m-d')
                ];
                
                $data[] = [
                    'Kode_Pariwisata' => $row['Kode_Pariwisata'],
                    'Nilai' => $this->spot_foto($row['Spot_Foto']),
                    'Kode_Kriteria' => 'K011',
                    'CreatedBy' => 0,
                    'CreatedDate' => date('Y-m-d')
                ];
                $data[] = [
                    'Kode_Pariwisata' => $row['Kode_Pariwisata'],
                    'Nilai' => count($explode_informasi),
                    'Kode_Kriteria' => 'K012',
                    'CreatedBy' => 0,
                    'CreatedDate' => date('Y-m-d')
                ];
            }
            $where = ['Kode_Pariwisata' => $result['Kode_Pariwisata']];
            $this->db->where($where);
            $this->db->update_batch('konversi', $data, 'Kode_Kriteria');
          // echo "<pre>";
          // print_r($data);
          // echo "<pre>";
        }
      
    }



    private function jarak($jarak) {
        if ($jarak >= 15 && $jarak <= 20 || $jarak <= 15) {
          return 5;
        } elseif ($jarak >= 21 && $jarak <= 25) {
          return 4;
        } elseif ($jarak >= 26 && $jarak <= 29) {
          return 3;
        } elseif ($jarak >= 30 && $jarak <= 35) {
          return 2;
        } elseif ($jarak >= 35 && $jarak <= 40 || $jarak >= 40) {
          return 1;
        } else {
          return "Jarak TIdak Valid!";
        }
    }


    private function harga($tarif) {
        if (is_numeric($tarif)) { // Cek $tarif berisi angka
          if ($tarif >= 5000 && $tarif <= 50000) {
            return 5; // Sangat Murah
          } elseif ($tarif >= 51000 && $tarif <= 100000) {
            return 4; // Murah
          } elseif ($tarif >= 101000 && $tarif <= 200000) {
            return 3; // Sedang
          } elseif ($tarif >= 201000 && $tarif <= 300000) {
            return 2; // Mahal
          } elseif ($tarif > 301000) {
            return 1; // Sangat Mahal
          } else {
            return "Tarif tidak valid";
          }
        } else {
          return "Tarif harus berisi angka";
        }
      }

    private function jam($jam) {
        $skor = 0;
        
        if ($jam >= 7 && $jam <= 10 || $jam==24 || $jam==00 ) {
            $skor = 4;
        } elseif ($jam >= 11 && $jam <= 14) {
            $skor = 3;
        } elseif ($jam >= 15 && $jam <= 18) {
            $skor = 2;
        } elseif ($jam >= 19 && $jam <= 24) {
            $skor = 1;
        }
        
        return $skor;
    }


 private function akses_wifi($akses)
    {
        $nilai = 0;
        if($akses == 'Ada')
        {
            $nilai = 2;
        }else{
            $nilai = 1;
        }

        return $nilai;
    }


 private function spot_foto($spot)
  {
    $nilai =0;
    if($spot == 'Free')
    {
        $nilai = 2;
    }else{
        $nilai = 1;
    }

    return $nilai;
  }

//     private function penjualan_tiket($penjualan) {
//         $nilai = 0;
//         if($penjualan == 'Lengkap')
//         {
//              $nilai = 3;
//         }elseif($penjualan == 'Sedang')
//         {
//             $nilai = 2;
//         }else{
//             $nilai = 1;
//         }

//         return $nilai;
//     }

//     private function pembayaran($pembayaran) 
//     {
//         $nilai = 0;
//         if($pembayaran == 'Lengkap')
//         {
//             $nilai = 3;
//         }elseif($pembayaran == 'Sedang')
//         {
//             $nilai = 2;
//         }else{
//             $nilai = 1;
//         }

//         return $nilai;
//     }

   
//     private function informasi_event($informasi)
//     {
//         $nilai = 0;
//                 if($informasi == 'Lengkap')
//                 {
//                     $nilai = 3;
//                 }elseif($informasi == 'Sedang')
//                 {
//                     $nilai = 2;
//                 }else{
//                     $nilai = 1;
//                 }

//                 return $nilai;
//     }
    
//     private function informasi_diskon($informasi)
//     {
//         $nilai = 0;
//                 if($informasi == 'Lengkap')
//                 {
//                     $nilai = 3;
//                 }elseif($informasi == 'Sedang')
//                 {
//                     $nilai = 2;
//                 }else{
//                     $nilai = 1;
//                 }

//                 return $nilai;
//     }



//   private function informasi($informasi)
//   {
//     $nilai = 0;
//     if($informasi == 'Lengkap')
//     {
//         $nilai = 2;
//     }else{
//         $nilai = 1;
//     }
//   }

}