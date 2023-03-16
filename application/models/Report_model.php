<?php

class Report_Model extends CI_Model {

    function get()
    {
        $query = $this->db->get('report');
        return $query->result_array();
    }

    function get_wisata()
    {
        $where = $this->session->userdata('alternatif');
        $kode  = implode(',', $where);
        if($kode=='semua')
        {
            $query = $this->db->get('pariwisata');
        }else{
            $query = $this->db->query("SELECT * FROM pariwisata WHERE FIND_IN_SET(Kode_Pariwisata, '$kode') > 0");
        }
        return $query->result_array();
    }
    
    function get_konversi()
    {
        $where = $this->session->userdata('alternatif');
        $kode  = implode(',', $where);
        if($kode=='semua')
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
            ORDER BY a.Id_Konversi;");
        }else{
                $query = $this->db->query("SELECT a.Kode_Pariwisata, b.Nama_Pariwisata, 
                (SELECT x.Nilai FROM konversi x WHERE x.Kode_Kriteria = 'K01' AND x.Kode_Pariwisata = a.Kode_Pariwisata) AS K01,
                (SELECT x.Nilai FROM konversi x WHERE x.Kode_Kriteria = 'K02' AND x.Kode_Pariwisata = a.Kode_Pariwisata) AS K02,
                (SELECT x.Nilai FROM konversi x WHERE x.Kode_Kriteria = 'K03' AND x.Kode_Pariwisata = a.Kode_Pariwisata) AS K03,
                (SELECT x.Nilai FROM konversi x WHERE x.Kode_Kriteria = 'K04' AND x.Kode_Pariwisata = a.Kode_Pariwisata) AS K04,
                (SELECT x.Nilai FROM konversi x WHERE x.Kode_Kriteria = 'K05' AND x.Kode_Pariwisata = a.Kode_Pariwisata) AS K05
            FROM pariwisata b 
            LEFT JOIN konversi a ON b.Kode_Pariwisata = a.Kode_Pariwisata
            WHERE FIND_IN_SET(a.Kode_Pariwisata, '$kode') > 0
            GROUP BY a.Kode_Pariwisata, b.Nama_Pariwisata
            ORDER BY a.Id_Konversi;");
        }
        
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
      $query = $this->get_konversi();
      
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
       $bobot      = $this->smart->get_bobot_normalisasi();
       $pariwisata = count($this->get_wisata());
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



    
}