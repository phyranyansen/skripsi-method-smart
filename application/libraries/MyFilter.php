<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MyFilter
{
    public function filter_method()
    {
        $CI =& get_instance();
        $controller = $CI->uri->segment(1);
        $admin_controllers = array('dashboard', 'pariwisata', 'bobot', 'kriteria', 'method', 'report', ''); 

        if (in_array($controller, $admin_controllers))
        {
            if ($CI->session->userdata('login')!='logged_in') {
                // Jika belum, redirect ke halaman login atau halaman error
                redirect();
            }
        }
    }

    public function filter_login()
    {
        $CI =& get_instance();
        $controller = $CI->uri->segment(1);
        $admin_controllers = array('dashboard', 'pariwisata', 'bobot', 'kriteria', 'method', 'report', 'login'); 

        if (in_array($controller, $admin_controllers))
        {
            if ($CI->session->userdata('login')=='logged_in') {
                // Jika belum, redirect ke halaman login atau halaman error
                redirect('dashboard');
            }
        }
    }
}
