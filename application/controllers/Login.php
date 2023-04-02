<?php


class Login extends CI_Controller {

    function __construct()
    {
        parent::__construct();
		$cek = $this->session->userdata('login');
		$url =   $url = current_url();
		$url_cek = $this->session->userdata('url-server');
        if($cek=='logged_in')
		{
			if($url!=$url_cek)
			{
				redirect(base_url('dashboard'));

			}
		}
    }

    public function index()
    {
        $this->load->view('pages/login');
    }


    public function sign_in()
	{
		$username      	= $_POST['username'];
		$user       	= $this->db->get_where('login', ['Username' => $username])->row_array();
		if ($user!=null) {
			$this->_login();
			} else {
				echo json_encode(array(
					"statusCode"=>400,
						"pesan"     => "Sign-in Gagal, Akun Anda belum terdaftar!"
				));
			}
	}


    private function _login()
    {
        $username      	= $this->input->post('username');
        $password   	= $this->input->post('password');
        $user       	= $this->db->get_where('login', ['Username' => $username])->row_array();
        $verify         = password_verify($password, $user['Password']);
		$url			=   $url = current_url();

        if($user['Status']==1)
        {
            $level = 'Administrator';
        }else{
            $level = 'User Public';
        }
		//array session
		$data = [
            'id_login'      => $user['Id_Login'],
			'username'      => $user['Username'],
			'password'      => $password,
			'status'        => $user['Status'],
            'level'         => $level,
			'activated'     => $user['Activated'],
			'login'         => 'logged_in',
			'url-server'    => $url
		];

      
            if ($verify) {
                if($user['Activated']==0)
                {
					echo json_encode(array(
					"statusCode"=>400,
						"pesan"     => "Sign-in Gagal, Account Anda telah dinonaktifkan!"
					));

                }else{
                    if($user['Status']==1)
                    {
                        
                        $this->session->set_userdata($data);
                           echo json_encode(array(
                             "statusCode"   =>200,
                             "pesan"        => "Sukses, Sign-in Berhasil!",
                             "level"        => 1,
                         ));
                   }else{
                        $this->session->set_userdata($data);
                           echo json_encode(array(
                             "statusCode"   =>200,
                             "pesan"        => "Sukses, Sign-in Berhasil!",
                             "level"        => 0,
                         ));

                    }
                }
               
            } else {
				echo json_encode(array(
					"statusCode"=>400,
						"pesan"     => "Sign-in Gagal, Username atau Password Salah!"
					));
            }
       
    }


	//SECURITI ACCESS
    public function sign_up()
    {
        $this->load->view('pages/register');
    }


    public function user_add()
    {
        $validation     = $this->form_validation;
        $this->form_validation->set_rules('username', 'Username','required');
        $this->form_validation->set_rules('password', 'Password', 'required');
        $this->form_validation->set_rules('confpassword', 'Password Confirmation', 'required|matches[password]');
		$array = ['Username' => $_POST['username']];
		$cek_user = $this->db->get_where('login', $array)->row_array();
        if ($validation->run() == false) {
            echo json_encode(array(
                "statusCode"   =>500,
                "pesan"        => "Failed, Gagal Register!"
            ));
        } else {
			if(!empty($cek_user))
			{
				echo json_encode(array(
					"statusCode"   =>500,
					"pesan"        => "Username '".$cek_user['Username']."' telah digunakan!"
				));
			}else{
				$this->user->register();
					echo json_encode(array(
					"statusCode"   =>200,
					"pesan"        => "Sukses, Berhasil Register!"
				));

			}
        }
    }

}