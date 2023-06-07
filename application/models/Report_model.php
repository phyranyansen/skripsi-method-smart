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
             $query = "SELECT 
                a.Kode_Pariwisata, 
                b.Nama_Pariwisata";

                    $kriteria = $this->smart->get('kriteria');
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

        }else{

            $query = "SELECT 
            a.Kode_Pariwisata, 
            b.Nama_Pariwisata";

                $kriteria = $this->smart->get('kriteria');
                $numCriteria = count($kriteria);
                for ($i = 1; $i <= $numCriteria; $i++) {
                    $kodeKriteria = ($i >= 10) ? 'K' . str_pad($i, 3, '0', STR_PAD_LEFT) : 'K' . str_pad($i, 2, '0', STR_PAD_LEFT);
                    $query .= ", MAX(CASE WHEN x.Kode_Kriteria = '$kodeKriteria' THEN x.Nilai ELSE 0 END) AS $kodeKriteria";
                }

                $query .= " FROM 
                    pariwisata b 
                    LEFT JOIN konversi a ON b.Kode_Pariwisata = a.Kode_Pariwisata 
                    LEFT JOIN konversi x ON a.Kode_Pariwisata = x.Kode_Pariwisata 
                    WHERE FIND_IN_SET(a.Kode_Pariwisata, '$kode') > 0
                GROUP BY 
                    a.Kode_Pariwisata, 
                    b.Nama_Pariwisata 
                ORDER BY 
                    a.Id_Konversi;";
            $result = $this->db->query($query);
        }
        
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