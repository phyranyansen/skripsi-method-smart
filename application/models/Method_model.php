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
        $query = $this->db->query("SELECT
        MAX(CASE WHEN a.Id_Kriteria = '1' THEN a.Bobot END) as K01,
        MAX(CASE WHEN a.Id_Kriteria = '2' THEN a.Bobot END) as K02,
        MAX(CASE WHEN a.Id_Kriteria = '3' THEN a.Bobot END) as K03,
        MAX(CASE WHEN a.Id_Kriteria = '4' THEN a.Bobot END) as K04,
        MAX(CASE WHEN a.Id_Kriteria = '5' THEN a.Bobot END) as K05,
        SUM(CASE WHEN a.Id_Kriteria IN ('1', '2', '3', '4', '5') THEN a.Bobot END) as Total
      FROM bobot a;
        ");
        return $query->result_array();
    }

    //GET Normalisasi Bobot
    function get_bobot_normalisasi()
    {
       $query = $this->db->query("SELECT
       MAX(CASE WHEN a.Id_Kriteria = '1' THEN a.Bobot END) / total_bobot as K01,
       MAX(CASE WHEN a.Id_Kriteria = '2' THEN a.Bobot END) / total_bobot as K02,
       MAX(CASE WHEN a.Id_Kriteria = '3' THEN a.Bobot END) / total_bobot as K03,
       MAX(CASE WHEN a.Id_Kriteria = '4' THEN a.Bobot END) / total_bobot as K04,
       MAX(CASE WHEN a.Id_Kriteria = '5' THEN a.Bobot END) / total_bobot as K05,
       SUM(CASE WHEN a.Id_Kriteria IN ('1', '2', '3', '4', '5') THEN a.Bobot END) / total_bobot as Total
     FROM bobot a, (SELECT SUM(Bobot) as total_bobot FROM bobot WHERE Id_Kriteria IN ('1', '2', '3', '4', '5')) b;");
     return $query->result_array();
    }


    //GET Konversi
    function get_konversi()
    {
        $query = $this->db->query("SELECT a.Kode_Pariwisata, b.Nama_Pariwisata, 
        (SELECT x.Nilai FROM konversi x WHERE x.Kode_Kriteria = 'K01' AND x.Kode_Pariwisata = a.Kode_Pariwisata) AS K01,
        (SELECT x.Nilai FROM konversi x WHERE x.Kode_Kriteria = 'K02' AND x.Kode_Pariwisata = a.Kode_Pariwisata) AS K02,
        (SELECT x.Nilai FROM konversi x WHERE x.Kode_Kriteria = 'K03' AND x.Kode_Pariwisata = a.Kode_Pariwisata) AS K03,
        (SELECT x.Nilai FROM konversi x WHERE x.Kode_Kriteria = 'K04' AND x.Kode_Pariwisata = a.Kode_Pariwisata) AS K04,
        (SELECT x.Nilai FROM konversi x WHERE x.Kode_Kriteria = 'K05' AND x.Kode_Pariwisata = a.Kode_Pariwisata) AS K05
    FROM pariwisata b 
    LEFT JOIN konversi a ON b.Kode_Pariwisata = a.Kode_Pariwisata
    GROUP BY a.Kode_Pariwisata, b.Nama_Pariwisata
    ORDER BY a.Id_Konversi; ");

        return $query->result_array();
    }


    //GET Utility Value process
    function get_utility() {
        
        $k1 = [];
        $k2 = [];
        $k3 = [];
        $k4 = [];
        $k5 = [];
        
      $result = [];  
      $query = $this->smart->get_konversi();
      
      if(!empty($query)){
        foreach($query as $row) {
    
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
    
        foreach($query as $row) {
    
            $result['K01'][] = $this->utility($row['K01'], $min1, $max1);
            $result['K02'][] = $this->utility($row['K02'], $min2, $max2);
            $result['K03'][] = $this->utility($row['K03'], $min3, $max3);
            $result['K04'][] = $this->utility($row['K04'], $min4, $max4);
            $result['K05'][] = $this->utility($row['K05'], $min5, $max5); 
            $result['kode'][] = $row['Kode_Pariwisata'];
            $result['nama'][] = $row['Nama_Pariwisata'];
        }
    
        $array_result = [
            'K01'   => $result['K01'],
            'K02'   => $result['K02'],
            'K03'   => $result['K03'],
            'K04'   => $result['K04'],
            'K05'   => $result['K05'],
            'kode'  => $result['kode'],
            'nama'  => $result['nama']
        ];
    
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

    // private function utility($out, $min, $max)
    // {
    //       // Menghitung hasil rumus
    //       $hasil_rumus = ($out - $min) / ($max - $min);
    
    //       // Memastikan hasil rumus tidak menghasilkan error (divisi oleh nol)
    //       if (!is_nan($hasil_rumus) && !is_infinite($hasil_rumus)) {
    //           $nilai = $hasil_rumus;
    //       } else {
    //           $nilai = 0;
    //       }

    //       return $nilai;
    // }


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
        $array = [];
        for($i=0; $i<$pariwisata; $i++)
        {
          foreach($bobot as $row)
          {

            $array['result'][] = ((($utility['K01'][$i]) * ($row['K01'])) + (($utility['K02'][$i]) * ($row['K02'])) + 
                                 (($utility['K03'][$i]) * ($row['K03'])) + (($utility['K04'][$i]) * ($row['K04'])) +
                                 (($utility['K05'][$i]) * ($row['K05'])));
            $array['kode'][] = $utility['kode'][$i];
            $array['nama'][] = $utility['nama'][$i];

          }
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
            }
        
            $this->db->insert_batch('konversi', $data);

        }
      
    }



    private function jarak($jarak) {
        if ($jarak >= 15 && $jarak <= 20) {
          return 5;
        } elseif ($jarak >= 21 && $jarak <= 25) {
          return 4;
        } elseif ($jarak >= 26 && $jarak <= 29) {
          return 3;
        } elseif ($jarak >= 30 && $jarak <= 35) {
          return 2;
        } elseif ($jarak >= 35 && $jarak <= 40) {
          return 1;
        } else {
          return "Jarak tidak valid";
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
        
        if ($jam >= 7 && $jam <= 10 || $jam==24) {
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


}