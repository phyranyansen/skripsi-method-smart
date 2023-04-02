<?php


class UserLogin extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $cek = $this->session->userdata('login');
        $url =   $url = current_url();
        $url_cek = $this->session->userdata('url-server');
            if($cek!='logged_in')
            {
                    if($url!=$url_cek)
                    {
                        redirect(base_url());
  
                    }
                    
            }   
    }


    public function index()
    {
        $data['title'] = 'User';
        $data['menu']  = $this->user->get_menu_where();
        $data['list']  = $this->user->get();
        $this->load->view('templates/header', $data);
        $this->load->view('pages/data_user', $data);
        $this->load->view('pages/contents/modal/user/user_modal', $data);
        $this->load->view('templates/footer');
    }
    
    public function userAccess()
    {
        $data['title'] = 'User Group';
        $data['menu']  = $this->user->get_menu_where();
        $data['list']  = $this->user->get_menu();
        $this->load->view('templates/header', $data);
        $this->load->view('pages/data_userCode', $data);
        $this->load->view('pages/contents/modal/user/user_modal', $data);
        $this->load->view('templates/footer');
    }



    public function add()
    {
        $where = ['Username' => $_POST['username']];
        $result = $this->db->get_where('login', $where)->row_array();
        if(empty($result))
        {
            $this->user->add_user();
            echo json_encode(
                array("statusCode"=>200,
                "pesan"  => "Data user berhasil disimpan!")
            );
        }else{
            echo json_encode(
                array("statusCode"=>400,
                "pesan"  => "Gagal menyimpan, User ini '".$result['Username']."' sudah digunakan!")
            );
        }
    }


    public function edit()
    {
        
        if(empty($_POST['simpan']))
        {
            $where =['Id_Login' => $_POST['id_login']];
            $result = $this->db->get_where('login', $where)->row_array();
            if(!empty($result))
            {
                $data = [
                    'id_login'    => $result['Id_Login'],
                    'username'    => $result['Username'],
                    'activated'   => $result['Activated'],
                    'status'      => $result['Status']
                ];
                echo json_encode(
                    array("statusCode"=>200,
                    "pesan"  => "Get data berhasil!",
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
       
        $where =['Id_Login' => $_POST['id_login']];
        
        if(!empty($_POST['password']))
        {
            $data = [
                'Username'  => $_POST['username'],
                'Password'  => password_hash($_POST['password'], PASSWORD_BCRYPT),
                'Status'    => $_POST['status'],
                'Activated' => $_POST['activated']
            ];

            $this->user->user_edit($where, $data);
            echo json_encode(
                array("statusCode"=>200,
                "pesan"  => "Data berhasil disimpan!")
            );
        }else{
            $data = [
                'Username'  => $_POST['username'],
                'Status'    => $_POST['status'],
                'Activated' => $_POST['activated']
            ];

            $this->user->user_edit($where, $data);
            echo json_encode(
                array("statusCode"=>200,
                "pesan"  => "Data berhasil disimpan!")
            );

        }
    }


    //EDIT USER ACCESS
    public function edit_UserAccess()
    {
        $where = ['Id_Login' => $_POST['id_login'], 'Link' => $_POST['menu']];
        $data  = ['Status'   => $_POST['status']];
        $this->user->save_edit($data, $where);
        echo json_encode(
            array("statusCode"=>200,
            "pesan"  => "Data berhasil disimpan!")
        );
    }

    public function delete()
    {
        $where = ['Id_Login' => $_POST['id_login']];
        $this->user->delete_user($where);
        $result = $this->db->get_where('login', ['Username' => $_POST['username']])->row_array();
        if(empty($result))
        {
            echo json_encode(
                array("statusCode"=>200,
                "pesan"  => "Data user telah dihapus!")
            );
        }else{
            echo json_encode(
                array("statusCode"=>400,
                "pesan"  => "Data user gagal dihapus!")
            );
        }
    }
}