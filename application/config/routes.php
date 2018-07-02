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
|	https://codeigniter.com/user_guide/general/routing.html
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
$route['default_controller']    = 'home';
$route['komentar']              = 'home/komentar';
$route['simpan_komentar']       = 'home/simpan_komentar';
$route['simpan_balas_komentar'] = 'home/simpan_balas_komentar';
$route['ambil_id_komentar']     = 'home/ambil_id_komentar';
$route['ambil_data_komentar']     = 'admin/post/ambilDataKomentar';
//AUTHENTICATION
$route['login']                 = 'auth/login';
$route['register']              = 'auth/register';
$route['logout']                = 'auth/logout';
//ADMIN
$route['profile/(:any)']        = 'auth/profile/$1';
$route['dashboard']             = 'admin/dashboard/index';
$route['dashboards']             = 'admin/dashboard/admin';
//USER
$route['user']                  = 'admin/user/index';
// $route['tambah_artikel']        = 'admin/post/tambah';
$route['edit_user/(:any)']      = 'admin/user/edit/$1';
$route['delete_user/(:any)']    = 'admin/user/delete/$1';
//ARTIKEL
$route['artikel']               = 'admin/post/index';
// $route['tambah_artikel']        = 'admin/post/tambah';
// $route['edit_artikel/(:any)']   = 'admin/post/edit/$1';
// $route['delete_artikel/(:any)'] = 'admin/post/delete/$1';
$route['komentar_artikel']      = 'admin/post/listKomentar';

//MULTIMEDIA IMAGE
$route['m_image']               = 'admin/multimedia/image';
$route['tambah_image']          = 'admin/multimedia/tambah_image';
$route['edit_image/(:any)']     = 'admin/multimedia/edit_image/$1';
$route['delete_image/(:any)']   = 'admin/multimedia/delete_image/$1';
//MULTIMEDIA VIDEO
$route['m_video']               = 'admin/multimedia/video';
$route['tambah_video']          = 'admin/multimedia/tambah_video';
$route['edit_video/(:any)']     = 'admin/multimedia/edit_video/$1';
$route['delete_video/(:any)']   = 'admin/multimedia/delete_video/$1';
//MULTIMEDIA AUDIO
$route['m_audio']                 = 'admin/multimedia/audio';
$route['tambah_audio']          = 'admin/multimedia/tambah_audio';
$route['edit_audio/(:any)']     = 'admin/multimedia/edit_audio/$1';
$route['delete_audio/(:any)']   = 'admin/multimedia/delete_audio/$1';
//USER
$route['home/(:any)']           = 'home/index/$1';
$route['search']                = 'home/search';
$route['image']                 = 'home/image';
$route['audio']                 = 'home/audio';
$route['video']                 = 'home/video';
$route['(:any)']                = 'home/read/$1';
$route['kategori/(:any)']       = 'home/kategori/$1';
$route['sub/(:any)']            = 'home/sub_kategori/$1';

$route['404_override']          = '';
$route['translate_uri_dashes']  = FALSE;
