<?php


class Kriteria_Model extends CI_Model {

    
    function get()
    {
        $query =  $this->db->get('kriteria');
        return $query->result_array();
    }

    function get_where($where)
    {
        $query = $this->db->get_where('kriteria', $where)->row_array();
        return $query;
    }

    function save($data)
    {
        $this->db->insert('kriteria', $data);
    }
    
    function save_multi($data)
    {
        $this->db->insert_batch('kriteria', $data);
    }

    function delete($id)
    {
        $this->db->delete('kriteria', $id);
    }

    //GET NILAI KRITERIA
   function get_kriteria()
   {
        $query = $this->db->query("SELECT a.*, b.Kode_Kriteria, b.Nama_Kriteria 
        FROM kriteria_detail a 
        LEFT JOIN kriteria b ON b.Id_Kriteria = a.Id_Kriteria 
        ORDER BY a.Id_Kriteria_Detail");
                                   
       return $query->result_array();
   }

}