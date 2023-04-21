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

    function edit($where, $data)
    {
        $this->db->where($where);
        $query = $this->db->update('kriteria', $data);
        return $query;
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

   //SAVE Detail
   function save_detail($data)
   {
     $query = $this->db->insert('kriteria_detail', $data);
     return $query;
   }

   //DELETE Detail
    function delete_detail($id)
    {
        $this->db->delete('kriteria_detail', $id);
    }

    function get_detail($where)
    {
        $query = $this->db->get_where('kriteria_detail', $where)->row_array();
        return $query;
    }

    
    function edit_detail($where, $data)
    {
        $this->db->where($where);
        $query = $this->db->update('kriteria_detail', $data);
        return $query;
    }

}