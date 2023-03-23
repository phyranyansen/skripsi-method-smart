<?php

class Pariwisata_model extends CI_Model {


    function get()
    {
        $query =  $this->db->get('pariwisata');
        return $query->result_array();
    }

    function get_where($where)
    {
        $query = $this->db->get_where('pariwisata', $where)->row_array();
        return $query;
    }

    function edit($where, $data)
    {
        $this->db->where($where);
        $query = $this->db->update('pariwisata', $data);
        return $query;
    }

    function save($data)
    {
        $this->db->insert('pariwisata', $data);
    }
    
    function save_multi($data)
    {
        $this->db->insert_batch('pariwisata', $data);
    }

    function delete($id)
    {
        $this->db->delete('pariwisata', $id);
    }

    public function delete_all()
    {
        $query = $this->db->query("DELETE FROM pariwisata");
        return $query;
    }

    public function delete_konversi()
    {
       $query = $this->db->query("DELETE FROM konversi");
        return $query;
    }

    public function delete_konversi_where($id)
    {
        $query = $this->db->delete('konversi', $id);
        return $query;
    }
}