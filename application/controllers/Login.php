<?php


class Login extends CI_Controller {

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

		//array session
		$data = [
            'id_login'      => $user['Id_Login'],
			'username'      => $user['Username'],
			'password'      => $password,
			'status'        => $user['Status'],
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
		$this->load->view('regist');
    }

    public function user_add()
    {
        $validation     = $this->form_validation;
        $this->form_validation->set_rules('username', 'Username','required');
        $this->form_validation->set_rules('password', 'Password', 'required');
        $this->form_validation->set_rules('confpassword', 'Password Confirmation', 'required|matches[password]');
		$array = [
			'Username' => $_POST['username']
		];
		$cek_user = $this->db->get_where('login', $array)->row_array();
        if ($validation->run() == false) {
            echo json_encode(array(
                "statusCode"   =>500,
                "pesan"        => "Failed, Gagal Register!"
            ));
        } else {
			if($cek_user>0)
			{
				echo json_encode(array(
					"statusCode"   =>500,
					"pesan"        => "Failed, User ini telah digunakan!"
				));
			}else{
				$this->model->add_user();
					echo json_encode(array(
					"statusCode"   =>200,
					"pesan"        => "Sukses, Berhasil Register!"
				));

			}
        }
    }

}