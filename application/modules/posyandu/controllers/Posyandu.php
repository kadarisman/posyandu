<?php defined('BASEPATH') or exit('No direct script access allowed');

class Posyandu extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        check_login(); // this is a function in login_helper
    }

    public function index()
    {
        $data['title'] = 'Peserta';
        $data['all_peserta'] = $this->Model_peserta->get_all_peserta();
        $data['user_session'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('v_peserta', $data);
        $this->load->view('templates/footer');
    }
}