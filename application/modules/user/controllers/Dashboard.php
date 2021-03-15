<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        check_login(); // this is a function in helper/login_helper
    }

    public function index() // method index
    {
        $data['title'] = 'Dashboard';
        $data['login_session'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['desa_data_login'] = $this->Model_login->desa_session();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('v_dashboard', $data);
        $this->load->view('templates/footer');
    }
}