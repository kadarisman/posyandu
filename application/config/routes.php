<?php
defined('BASEPATH') or exit('No direct script access allowed');

$route['default_controller']     =     'Beranda';
//route for auth methods
$route['login'] = "auth/Login";
$route['pendaftaran-desa'] = "auth/Login/registration_desa";
$route['pendaftaran-peserta/(:any)'] = "auth/Login/registration_peserta/$2";
$route['pendaftaran-peserta'] = "auth/Login/registration_peserta";
$route['dashboard'] = "user/User";

//route for user
$route['all-admin'] = 'user/User/user_admin';
$route['all-admin-desa'] = 'user/User/user_desa';
$route['tambah-admin'] = 'user/User/add_user_admin';
$route['tambah-admin-desa'] = 'user/User/add_user_desa';
$route['tambah-panitia'] = 'user/User/add_user_panitia';
$route['tambah-peserta'] = 'user/User/add_user_peserta';
$route['all-peserta'] = 'user/User/user_peserta';
$route['all-panitia'] = 'user/User/user_panitia';
$route['edit-admin/(:any)'] = 'user/User/edit_user_admin/$1';
$route['edit-admin-desa/(:any)'] = 'user/User/edit_user_desa/$1';
$route['edit-peserta/(:any)'] = 'user/User/edit_user_peserta/$1';
$route['edit-panitia/(:any)'] = 'user/User/edit_user_panitia/$1';

//routes for desa module
$route['create_DB'] = 'desa/Desa/create_DB';
$route['desa/(:any)'] = 'Beranda/view_desa/$1';
$route['desa'] = 'desa/Desa';
$route['edit-desa/(:any)'] = 'desa/Desa/edit_desa/$1';
$route['tambah-desa'] = 'desa/Desa/add_desa';