<?php

class UserModel extends CI_Model {

    public function get()
    {
        $query  = $this->db->get('login');
        return $query->result_array();
    }

    public function get_where($where)
    {
        $query = $this->db->get_where('login', $where);
        return $where->row_array();
    }

    public function get_menu()
    {
        $query = $this->db->query("SELECT
        Id_Login, Username, 
        MAX(CASE WHEN MenuNumber = 1 THEN Nama_Menu END) AS Menu1,
        MAX(CASE WHEN MenuNumber = 2 THEN Nama_Menu END) AS Menu2,
        MAX(CASE WHEN MenuNumber = 3 THEN Nama_Menu END) AS Menu3,
        
        MAX(CASE WHEN MenuNumber = 1 THEN Status END) AS pariwisata,
        MAX(CASE WHEN MenuNumber = 2 THEN Status END) AS kriteria,
        MAX(CASE WHEN MenuNumber = 3 THEN Status END) AS bobot,
        CreateStatus,
        UpdateStatus, 
        DeleteStatus
    FROM (
        SELECT
            a.Id_Login,
            b.Username,
            a.Nama_Menu,
            a.Status,
            a.CreateStatus,
            a.UpdateStatus,
            a.DeleteStatus,
            ROW_NUMBER() OVER (PARTITION BY a.Id_Login ORDER BY a.Id_Menu) AS MenuNumber
        FROM menu a
        JOIN login b ON b.Id_Login = a.Id_Login
    ) AS SourceTable
    GROUP BY
        Username;");
        return $query->result_array();
    }

    function get_menu_where()
    {
        $where = [
            'Id_Login' => $this->session->userdata('id_login'),
            'Status'   => 1
        ];
        $query = $this->db->get_where('menu', $where);
        return $query->result_array();
    }

    function get_menu_access()
    {
        $where = [
            'Id_Login' => $this->session->userdata('id_login'),
            'Status'   => 1
        ];
        $query = $this->db->get_where('menu', $where);
        return $query->row_array();
    }

    function save_edit($data, $where)
    {
        $this->db->where($where);
        $query = $this->db->update('menu', $data);
        return $query;
    }


        //add user login
        public function add_user()
        {
            $array = [
                'Username'  => $_POST['username'],
                'Password'  => password_hash($_POST['password'], PASSWORD_BCRYPT),
                'Status'    => $_POST['status'],
                'Activated' => $_POST['activated']
            ];
            $this->db->insert('login', $array);
            $this->add_menu();
        }
        
        //register user
        public function register()
        {
            $array = [
                'Username'  => $_POST['username'],
                'Password'  => password_hash($_POST['password'], PASSWORD_BCRYPT),
                'Status'    => 0,
                'Activated' => 1
            ];
            $this->db->insert('login', $array);
            $this->add_menu();
        }

        //EDIT USER
        function user_edit($where, $data)
        {
            $this->db->where($where);
            $query = $this->db->update('login', $data);
            return $query;
        }

        //DELETE USER
        function delete_user($where)
        {
            $this->db->delete('login', $where);
            $this->delete_user_menu($where);
        }
        
        //DELETE USER MENU
        private function delete_user_menu($where)
        {
            $this->db->delete('menu', $where);
        }

        //ADD AUTO MENU USER
        private function add_menu()
        {
            $result = $this->db->query("SELECT * FROM login WHERE Id_Login IN (SELECT MAX(Id_Login) FROM login)")->row_array();
            $id     = $result['Id_Login'];

            $data[] = [
                'Id_Login'  => $id,
                'Nama_Menu' => 'Data Pariwisata',
                'Link'      => 'pariwisata',
                'Status'    => 0,
            ];

            $data[] = [
                'Id_Login'  => $id,
                'Nama_Menu' => 'Data Kriteria',
                'Link'      => 'kriteria',
                'Status'    => 0,
            ];

            $data[] = [
                'Id_Login'  => $id,
                'Nama_Menu' => 'Data Bobot',
                'Link'      => 'bobot',
                'Status'    => 0,
            ];

            $query = $this->db->insert_batch('menu', $data);
            return $query;
        }


}