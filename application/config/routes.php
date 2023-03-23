<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/userguide3/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'login';
$route['sign-in']            = 'login/sign_in';

//Pariwisata
$route['pariwisata']         = 'pariwisata';
$route['list-wisata']        = 'pariwisata/get';
$route['tambah-wisata']      = 'pariwisata/add';
$route['upload-wisata']      = 'pariwisata/upload';
$route['hapus-wisata']       = 'pariwisata/delete';
$route['delete-wisata']      = 'pariwisata/delete_all';
$route['edit-wisata']        = 'pariwisata/edit';

//Kriteria
$route['kriteria']           = 'kriteria';
$route['tambah-kriteria']    = 'kriteria/add';
$route['hapus-kriteria']     = 'kriteria/delete';


//Method
$route['method']             = 'method';
$route['konversi-get']       = 'method/konversi';
$route['result']             = 'method/get_result';

//Bobot-Method
$route['bobot-normalisasi']  = 'method/bobot_normalisasi';
$route['bobot-get']          = 'method/bobot';
//Bobot
$route['bobot']              = 'bobot';
$route['bobot-view']         = 'bobot/bobot_get';
$route['bobot-edit']         = 'bobot/edit_bobot';
$route['bobot-value']        = 'bobot/showing_bobot_value';


//Utility
$route['utility-get']        = 'method/get_utility';

//Report
$route['laporan']             = 'report';
$route['laporan-pariwisata']  = 'report/report_wisata';
$route['laporan-smart']       = 'report/report_wisata_show';
$route['rp-wisata']           = 'report/report_wisata_table';
$route['rp-konversi']         = 'report/report_konversi_table';
$route['rp-bobot']            = 'report/report_bobot_table';
$route['rp-normalisasi']      = 'report/repot_bobot_normalisasi_table';
$route['rp-utility']          = 'report/get_utility_table';
$route['rp-result']           = 'report/get_result_table';


$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
