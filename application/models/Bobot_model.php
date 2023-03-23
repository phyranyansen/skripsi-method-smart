<?php


class Bobot_model extends CI_Model {

    public function get()
    {
        $query = $this->db->get('bobot');
        return $query->result_array();
    }
    
        //GET Select Bobot
        function get_select_bobot()
        {
            $query = $this->db->query("SELECT b.Kode_Kriteria, b.Nama_Kriteria, a.Bobot AS Nilai
                                      FROM bobot a 
                                      LEFT JOIN kriteria b ON b.Id_kriteria = a.Id_Kriteria");
                                    return $query->result_array();
        }
    

}