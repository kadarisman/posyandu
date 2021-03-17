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
$route['all-user'] = 'User/all_user';

//routes for desa module
$route['create_DB'] = 'desa/Desa/create_DB';
$route['desa/(:any)'] = 'Beranda/view_desa/$1';
$route['desa'] = 'desa/Desa';