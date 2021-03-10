<?php
defined('BASEPATH') or exit('No direct script access allowed');

$route['default_controller']     =     'Beranda';
//route for auth methods
$route['login'] = "auth/Login";
$route['pendaftaran'] = "auth/Login/registration";
//routes for user module
$route['User/all_user'] = "user/User/all_user";
$route['User/admin_BPM'] = "user/User/admin_BPM";
$route['User/user_prodi'] = "user/User/user_prodi";
$route['User/user_dosen'] = "user/User/user_dosen";
//routes for prodi module
$route['Prodi'] = "prodi/Prodi";
//routes for dosen module
$route['Dosen'] = "dosen/Dosen";
//routes for mahasiswa module
$route['Mahasiswa'] = "mahasiswa/Mahasiswa";