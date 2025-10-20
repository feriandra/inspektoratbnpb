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
$route['default_controller'] = 'GuestController/index';
$route['404_override'] = 'ErrorController/error_404';
$route['translate_uri_dashes'] = FALSE;

$route['homepage'] = 'GuestController/index';
$route['galeri'] = 'GuestController/galeri';
$route['struktur-organisasi'] = 'GuestController/struktur_organisasi';
$route['list-pegawai'] = 'PegawaiController/index';

$route['login'] = 'AuthController/index';
$route['login/submit'] = 'AuthController/submit';
$route['logout'] = 'AuthController/logout';

$route['beranda'] = 'MainController/index';
$route['admin/pegawai'] = 'PegawaiController/index';
$route['admin/pegawai/index'] = 'PegawaiController/index';
$route['admin/pegawai/form'] = 'PegawaiController/index_form';
$route['admin/pegawai/form/(:num)'] = 'PegawaiController/index_form/$1';
$route['admin/pegawai/submit'] = 'PegawaiController/submit';
$route['admin/pegawai/delete/(:num)'] = 'PegawaiController/delete/$1';

$route['account-profil'] = 'ProfilController/index';
$route['account-profil/submit'] = 'ProfilController/submit';

$route['admin/pengguna'] = 'UserController/index';
$route['admin/pengguna/index'] = 'UserController/index';
$route['admin/pengguna/submit'] = 'UserController/submit';
$route['admin/pengguna/submit-akses'] = 'UserController/submit_akses';
$route['admin/pengguna/verify/(:num)/(:num)'] = 'UserController/verify/$1/$2';
$route['admin/pengguna/reset-password'] = 'UserController/reset_password';

$route['admin/dokumen'] = 'DokumenController/index';
$route['admin/dokumen/index'] = 'DokumenController/index';
$route['admin/dokumen/form'] = 'DokumenController/index_form';
$route['admin/dokumen/form/(:num)'] = 'DokumenController/index_form/$1';
$route['admin/dokumen/submit'] = 'DokumenController/submit';
$route['admin/dokumen/delete/(:num)'] = 'DokumenController/delete/$1';