<?php

defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        check_login(); // this is a function in login_helper
    }

    public function index() // method index
    {
        $data['title'] = 'Dashboard';
        $data['total_admin'] = $this->Model_user->count_admin_user();
        $data['total_admin_desa'] = $this->Model_user->count_admin_desa();
        $data['total_user_peserta'] = $this->Model_user->count_all_user_pesrta();
        // $data['hitung_coba'] = $this->Model_user->hitung_coba();//nyo controller 
        $data['total_user_peserta_desa'] = $this->Model_user->count_user_pesrta_desa();
        $data['total_user_panitia_desa'] = $this->Model_user->count_user_panitia_desa();
        $data['total_user_panitia'] = $this->Model_user->count_all_user_panitia();
        $data['total_desa'] = $this->Model_desa->count_all_desa();
        $data['total_posyandu'] = $this->Model_posyandu->count_all_data_posyandu(); //balita
        $data['total_posyandu_desa'] = $this->Model_posyandu->count_data_posyandu_desa(); //balita
        $data['total_posyandu_bumil'] = $this->Model_posyandu->count_all_data_bumil_posyandu(); //bumil
        $data['total_posyandu_bumil_desa'] = $this->Model_posyandu->count_data_posyandu_bumil_desa(); //bumil
        $data['total_posyandu'] = $this->Model_posyandu->count_all_data_posyandu();
        $data['login_session'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['desa_data_login'] = $this->Model_login->desa_session();
        $data['panitia_data_login'] = $this->Model_login->panitia_session();
        $data['peserta_data_login'] = $this->Model_login->panitia_session();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('admin/v_dashboard', $data);
        $this->load->view('templates/footer_copy');
        $this->load->view('templates/footer');
    }

    public function profile() // method index
    {
        $data['title'] = 'Profil';
        $data['total_admin'] = $this->Model_user->count_admin_user();
        $data['total_admin_desa'] = $this->Model_user->count_admin_desa();
        $data['total_user_peserta'] = $this->Model_user->count_all_user_pesrta();
        $data['total_user_peserta_desa'] = $this->Model_user->count_user_pesrta_desa();
        $data['total_user_panitia_desa'] = $this->Model_user->count_user_panitia_desa();
        $data['total_user_panitia'] = $this->Model_user->count_all_user_panitia();
        $data['total_posyandu'] = $this->Model_posyandu->count_all_data_posyandu(); //balita
        $data['total_posyandu_desa'] = $this->Model_posyandu->count_data_posyandu_desa(); //balita
        $data['total_posyandu_bumil'] = $this->Model_posyandu->count_all_data_bumil_posyandu(); //bumil
        $data['total_posyandu_bumil_desa'] = $this->Model_posyandu->count_data_posyandu_bumil_desa(); //bumil
        $data['total_desa'] = $this->Model_desa->count_all_desa();
        $data['login_session'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['desa_data_login'] = $this->Model_login->desa_session();
        $data['panitia_data_login'] = $this->Model_login->panitia_session();
        $data['peserta_data_login'] = $this->Model_login->panitia_session();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('profile', $data);
        $this->load->view('templates/footer_copy');
        $this->load->view('templates/footer');
    }

    //methods get data
    public function user_admin()
    {
        $data['title'] = 'Semua Pengguna';
        $data['total_admin'] = $this->Model_user->count_admin_user();
        $data['total_admin_desa'] = $this->Model_user->count_admin_desa();
        $data['total_user_peserta'] = $this->Model_user->count_all_user_pesrta();
        $data['total_user_panitia'] = $this->Model_user->count_all_user_panitia();
        $data['total_desa'] = $this->Model_desa->count_all_desa();
        $data['user_admin'] = $this->Model_user->get_all_user_admin();
        $data['total_posyandu'] = $this->Model_posyandu->count_all_data_posyandu(); //balita
        $data['total_posyandu_bumil'] = $this->Model_posyandu->count_all_data_bumil_posyandu(); //bumil
        $data['login_session'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['desa_data_login'] = $this->Model_login->desa_session();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/v_all_users_admin', $data);
        $this->load->view('templates/footer_copy');
        $this->load->view('templates/footer');
    }

    public function user_desa() //methode get all user
    {
        $data['title'] = 'Semua Admin Desa';
        $data['total_admin'] = $this->Model_user->count_admin_user();
        $data['total_admin_desa'] = $this->Model_user->count_admin_desa();
        $data['total_user_peserta'] = $this->Model_user->count_all_user_pesrta();
        $data['total_user_panitia'] = $this->Model_user->count_all_user_panitia();
        $data['total_desa'] = $this->Model_desa->count_all_desa();
        $data['user_admin_desa'] = $this->Model_user->get_all_user_desa();
        $data['total_posyandu'] = $this->Model_posyandu->count_all_data_posyandu(); //balita
        $data['total_posyandu_bumil'] = $this->Model_posyandu->count_all_data_bumil_posyandu(); //bumil
        $data['login_session'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['desa_data_login'] = $this->Model_login->desa_session();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/v_all_users_desa', $data);
        $this->load->view('templates/footer_copy');
        $this->load->view('templates/footer');
    }

    public function user_peserta() //methode get all user
    {
        $data['title'] = 'Semua Peserta';
        $data['total_admin'] = $this->Model_user->count_admin_user();
        $data['total_admin_desa'] = $this->Model_user->count_admin_desa();
        $data['total_user_peserta'] = $this->Model_user->count_all_user_pesrta();
        $data['total_user_panitia'] = $this->Model_user->count_all_user_panitia();
        $data['total_desa'] = $this->Model_desa->count_all_desa();
        $data['user_peserta'] = $this->Model_user->get_all_user_peserta();
        $data['total_posyandu'] = $this->Model_posyandu->count_all_data_posyandu(); //balita
        $data['total_posyandu_bumil'] = $this->Model_posyandu->count_all_data_bumil_posyandu(); //bumil
        $data['login_session'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['desa_data_login'] = $this->Model_login->desa_session();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/v_all_users_peserta', $data);
        $this->load->view('templates/footer_copy');
        $this->load->view('templates/footer');
    }

    public function user_panitia()
    {
        $data['title'] = 'Semua Panitia';
        $data['total_admin'] = $this->Model_user->count_admin_user();
        $data['total_admin_desa'] = $this->Model_user->count_admin_desa();
        $data['total_user_peserta'] = $this->Model_user->count_all_user_pesrta();
        $data['total_user_panitia'] = $this->Model_user->count_all_user_panitia();
        $data['total_desa'] = $this->Model_desa->count_all_desa();
        $data['user_panitia'] = $this->Model_user->get_all_user_panitia();
        $data['total_posyandu'] = $this->Model_posyandu->count_all_data_posyandu(); //balita
        $data['total_posyandu_bumil'] = $this->Model_posyandu->count_all_data_bumil_posyandu(); //bumil
        $data['login_session'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['desa_data_login'] = $this->Model_login->desa_session();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/v_all_users_panitia', $data);
        $this->load->view('templates/footer_copy');
        $this->load->view('templates/footer');
    }

    public function user_panitia_desa() //methode get all user
    {
        $data['title'] = 'Semua Peserta';
        $data['total_user_peserta_desa'] = $this->Model_user->count_user_pesrta_desa();
        $data['total_user_panitia_desa'] = $this->Model_user->count_user_panitia_desa();
        $data['user_panitia'] = $this->Model_user->get_all_user_panitia_desa();
        $data['login_session'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['desa_data_login'] = $this->Model_login->desa_session();
        $data['total_posyandu_desa'] = $this->Model_posyandu->count_data_posyandu_desa(); //balita
        $data['total_posyandu_bumil_desa'] = $this->Model_posyandu->count_data_posyandu_bumil_desa(); //bumil

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('desa/v_all_users_panitia_desa', $data);
        $this->load->view('templates/footer_copy');
        $this->load->view('templates/footer');
    }

    public function user_peserta_desa() //methode get all user
    {
        $data['title'] = 'Semua Peserta';
        $data['total_user_peserta_desa'] = $this->Model_user->count_user_pesrta_desa();
        $data['total_user_panitia_desa'] = $this->Model_user->count_user_panitia_desa();
        $data['total_posyandu_desa'] = $this->Model_posyandu->count_data_posyandu_desa();
        $data['user_peserta'] = $this->Model_user->get_all_user_peserta_desa();
        $data['login_session'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['desa_data_login'] = $this->Model_login->desa_session();
        $data['panitia_data_login'] = $this->Model_login->panitia_session();
        $data['total_posyandu_desa'] = $this->Model_posyandu->count_data_posyandu_desa(); //balita
        $data['total_posyandu_bumil_desa'] = $this->Model_posyandu->count_data_posyandu_bumil_desa(); //bumil

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('desa/v_all_users_peserta_desa', $data);
        $this->load->view('templates/footer_copy');
        $this->load->view('templates/footer');
    }


    //methods add data
    public function add_user_admin()
    {

        $this->form_validation->set_rules('username', 'Username', 'required|trim|is_unique[user.username]', [
            'is_unique' => 'Username sudah terdaftar !',
            'required' => 'Username tidak boleh kosong..!'
        ]);
        $this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[3]|matches[password2]', [
            'matches' => 'Password tidak sama !',
            'min_length' => 'Password terlalu pendek minimal 3 karakter !',
            'required' => 'Password tidak boleh kosong..!'
        ]);
        $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password]', [
            'required' => 'Tidak boleh kosong..!',
            'matches' => 'Password tidak sama..!'
        ]);

        $this->form_validation->set_rules('nama', 'Nama', 'required|trim', [
            'required' => 'Nama tidak boleh kosong..!'
        ]);

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Pendaftaran Peserta';
            $data['total_admin'] = $this->Model_user->count_admin_user();
            $data['total_admin_desa'] = $this->Model_user->count_admin_desa();
            $data['all_desa'] = $this->Model_desa->get_all_desa();
            $data['total_user_peserta'] = $this->Model_user->count_all_user_pesrta();
            $data['total_user_panitia'] = $this->Model_user->count_all_user_panitia();
            $data['total_desa'] = $this->Model_desa->count_all_desa();
            $data['user_peserta'] = $this->Model_user->get_all_user_peserta();
            $data['total_posyandu'] = $this->Model_posyandu->count_all_data_posyandu(); //balita
            $data['total_posyandu_bumil'] = $this->Model_posyandu->count_all_data_bumil_posyandu(); //bumil
            $data['login_session'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
            $data['desa_data_login'] = $this->Model_login->desa_session();

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('admin/v_add_user_admin', $data);
            $this->load->view('templates/footer_copy');
            $this->load->view('templates/footer');
        } else {
            $data = [
                'username' => htmlspecialchars($this->input->post('username', true)),
                'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
                'nama' => htmlspecialchars($this->input->post('nama', true)),
                'level'  => 'admin',
                'is_active' => 1,
                'created' => date('d-m-Y H:i:s')
            ];
            $this->Model_user->add_user($data);
            $this->session->set_flashdata('message1', '<div class="alert alert-warning" id="msg" role="alert">Sudah ditamabah !</div>');
            redirect('all-admin');
        }
    }

    public function add_user_desa()
    {
        $this->form_validation->set_rules('id_desa', 'Id_desa', 'required|trim', [
            'required' => 'Desa harus di pilih..!'
        ]);

        $this->form_validation->set_rules('username', 'Username', 'required|trim|is_unique[user.username]', [
            'is_unique' => 'Username sudah terdaftar !',
            'required' => 'Username tidak boleh kosong..!'
        ]);
        $this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[3]|matches[password2]', [
            'matches' => 'Password tidak sama !',
            'min_length' => 'Password terlalu pendek minimal 3 karakter !',
            'required' => 'Password tidak boleh kosong..!'
        ]);
        $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password]', [
            'required' => 'Tidak boleh kosong..!',
            'matches' => 'Password tidak sama..!'
        ]);

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Tambah-desa';
            $data['total_admin'] = $this->Model_user->count_admin_user();
            $data['total_admin_desa'] = $this->Model_user->count_admin_desa();
            $data['all_desa'] = $this->Model_desa->get_all_desa();
            $data['total_user_peserta'] = $this->Model_user->count_all_user_pesrta();
            $data['total_user_panitia'] = $this->Model_user->count_all_user_panitia();
            $data['total_desa'] = $this->Model_desa->count_all_desa();
            $data['user_peserta'] = $this->Model_user->get_all_user_peserta();
            $data['total_posyandu'] = $this->Model_posyandu->count_all_data_posyandu(); //balita
            $data['total_posyandu_bumil'] = $this->Model_posyandu->count_all_data_bumil_posyandu(); //bumil
            $data['login_session'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
            $data['desa_data_login'] = $this->Model_login->desa_session();
            $data['total_posyandu_desa'] = $this->Model_posyandu->count_data_posyandu_desa();

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('admin/v_add_user_desa', $data);
            $this->load->view('templates/footer_copy');
            $this->load->view('templates/footer');
        } else {
            $data = [
                'username' => htmlspecialchars($this->input->post('username', true)),
                'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
                'nama' => htmlspecialchars($this->input->post('nama', true)),
                'level'  => 'desa',
                'is_active' => 1,
                'created' => date('d-m-Y H:i:s')
            ];
            $this->Model_user->add_user($data);
            $this->session->set_flashdata('message1', '<div class="alert alert-warning" id="msg" role="alert">Sudah ditamabah !</div>');
            redirect('all-user');
        }
    }

    public function add_user_panitia()
    {
        $this->form_validation->set_rules('id_desa', 'Id_desa', 'required|trim', [
            'required' => 'Desa harus di pilih..!'
        ]);
        $this->form_validation->set_rules('nama', 'Nama', 'required|trim', [
            'required' => 'Nama tidak boleh kosong..!'
        ]);

        $this->form_validation->set_rules('username', 'Username', 'required|trim|is_unique[user.username]', [
            'is_unique' => 'Username sudah terdaftar !',
            'required' => 'Username tidak boleh kosong..!'
        ]);
        $this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[3]|matches[password2]', [
            'matches' => 'Password tidak sama !',
            'min_length' => 'Password terlalu pendek minimal 3 karakter !',
            'required' => 'Password tidak boleh kosong..!'
        ]);
        $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password]', [
            'required' => 'Tidak boleh kosong..!',
            'matches' => 'Password tidak sama..!'
        ]);

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Pendaftaran Peserta';
            $data['total_admin'] = $this->Model_user->count_admin_user();
            $data['total_admin_desa'] = $this->Model_user->count_admin_desa();
            $data['all_desa'] = $this->Model_desa->get_all_desa();
            $data['total_user_peserta'] = $this->Model_user->count_all_user_pesrta();
            $data['total_user_panitia'] = $this->Model_user->count_all_user_panitia();
            $data['total_desa'] = $this->Model_desa->count_all_desa();
            $data['user_peserta'] = $this->Model_user->get_all_user_peserta();
            $data['total_posyandu'] = $this->Model_posyandu->count_all_data_posyandu(); //balita
            $data['total_posyandu_bumil'] = $this->Model_posyandu->count_all_data_bumil_posyandu(); //bumil
            $data['login_session'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
            $data['desa_data_login'] = $this->Model_login->desa_session();

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('admin/v_add_user_panitia', $data);
            $this->load->view('templates/footer_copy');
            $this->load->view('templates/footer');
        } else {
            $data = [
                'username' => htmlspecialchars($this->input->post('username', true)),
                'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
                'nama' => htmlspecialchars($this->input->post('nama', true)),
                'id_desa' => htmlspecialchars($this->input->post('id_desa', true)),
                'level'  => 'panitia',
                'is_active' => 1,
                'created' => date('d-m-Y H:i:s')
            ];
            $this->Model_user->add_user($data);
            $this->session->set_flashdata('message1', '<div class="alert alert-warning" id="msg" role="alert">Sudah ditamabah !</div>');
            redirect('all-panitia');
        }
    }

    public function add_user_peserta()
    {
        $this->form_validation->set_rules('id_desa', 'Id_desa', 'required|trim', [
            'required' => 'Desa harus di pilih..!'
        ]);

        $this->form_validation->set_rules('username', 'Username', 'required|trim|is_unique[user.username]', [
            'is_unique' => 'Username sudah terdaftar !',
            'required' => 'Username tidak boleh kosong..!'
        ]);
        $this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[3]|matches[password2]', [
            'matches' => 'Password tidak sama !',
            'min_length' => 'Password terlalu pendek minimal 3 karakter !',
            'required' => 'Password tidak boleh kosong..!'
        ]);
        $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password]', [
            'required' => 'Tidak boleh kosong..!',
            'matches' => 'Password tidak sama..!'
        ]);

        $this->form_validation->set_rules('nama', 'Nama', 'required|trim', [
            'required' => 'Nama tidak boleh kosong..!'
        ]);

        $this->form_validation->set_rules('nik', 'Nik', 'required|trim|is_unique[user.nik]', [
            'is_unique' => 'NIK sudah terdaftar !',
            'required' => 'Nik tidak boleh kosong..!'
        ]);

        $this->form_validation->set_rules('t_lahir', 'T_lahir', 'required|trim', [
            'required' => 'Tempat lahir tidak boleh kosong..!'
        ]);

        $this->form_validation->set_rules('TTL', 'Ttl', 'required|trim', [
            'required' => 'TTL tidak boleh kosong..!'
        ]);

        $this->form_validation->set_rules('kelamin', 'Kelamin', 'required|trim', [
            'required' => 'Kelamin harus dipilih..!'
        ]);

        $this->form_validation->set_rules('kriteria', 'Kriteria', 'required|trim', [
            'required' => 'Kriteria harus di pilih..!'
        ]);

        $this->form_validation->set_rules('nama_ibu', 'Nama_ibu', 'required|trim', [
            'required' => 'Nama ibu tidak boleh kosong..!'
        ]);

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Pendaftaran Peserta';
            $data['total_admin'] = $this->Model_user->count_admin_user();
            $data['total_admin_desa'] = $this->Model_user->count_admin_desa();
            $data['all_desa'] = $this->Model_desa->get_all_desa();
            $data['total_user_peserta'] = $this->Model_user->count_all_user_pesrta();
            $data['total_user_panitia'] = $this->Model_user->count_all_user_panitia();
            $data['total_desa'] = $this->Model_desa->count_all_desa();
            $data['user_peserta'] = $this->Model_user->get_all_user_peserta();
            $data['total_posyandu'] = $this->Model_posyandu->count_all_data_posyandu(); //balita
            $data['total_posyandu_bumil'] = $this->Model_posyandu->count_all_data_bumil_posyandu(); //bumil
            $data['login_session'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
            $data['desa_data_login'] = $this->Model_login->desa_session();

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('v_add_user_peserta', $data);
            $this->load->view('templates/footer_copy');
            $this->load->view('templates/footer');
        } else {
            $data = [
                'id_desa' => htmlspecialchars($this->input->post('id_desa', true)),
                'username' => htmlspecialchars($this->input->post('username', true)),
                'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
                'nama' => htmlspecialchars($this->input->post('nama', true)),
                'nik' => htmlspecialchars($this->input->post('nik', true)),
                't_lahir' => htmlspecialchars($this->input->post('t_lahir', true)),
                'TTL' => htmlspecialchars($this->input->post('TTL', true)),
                'kelamin' => htmlspecialchars($this->input->post('kelamin', true)),
                'kriteria' => htmlspecialchars($this->input->post('kriteria', true)),
                'nama_ibu' => htmlspecialchars($this->input->post('nama_ibu', true)),
                'level'  => 'peserta',
                'is_active' => 1,
                'created' => date('d-m-Y H:i:s')
            ];
            $this->Model_user->add_user($data);
            $this->session->set_flashdata('message1', '<div class="alert alert-warning" id="msg" role="alert">Sudah ditamabah !</div>');
            redirect('all-peserta');
        }
    }

    public function add_user_panitia_desa()
    {
        $this->form_validation->set_rules('nama', 'Nama', 'required|trim', [
            'required' => 'Nama tidak boleh kosong..!'
        ]);

        $this->form_validation->set_rules('username', 'Username', 'required|trim|is_unique[user.username]', [
            'is_unique' => 'Username sudah terdaftar !',
            'required' => 'Username tidak boleh kosong..!'
        ]);
        $this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[3]|matches[password2]', [
            'matches' => 'Password tidak sama !',
            'min_length' => 'Password terlalu pendek minimal 3 karakter !',
            'required' => 'Password tidak boleh kosong..!'
        ]);
        $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password]', [
            'required' => 'Tidak boleh kosong..!',
            'matches' => 'Password tidak sama..!'
        ]);

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Tambah Panitia';
            $data['total_user_peserta_desa'] = $this->Model_user->count_user_pesrta_desa();
            $data['total_user_panitia_desa'] = $this->Model_user->count_user_panitia_desa();
            $data['user_peserta'] = $this->Model_user->get_all_user_peserta_desa();
            $data['login_session'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
            $data['desa_data_login'] = $this->Model_login->desa_session();
            $data['total_posyandu_desa'] = $this->Model_posyandu->count_data_posyandu_desa(); //balita
            $data['total_posyandu_bumil_desa'] = $this->Model_posyandu->count_data_posyandu_bumil_desa(); //bumil
            $data['total_posyandu_desa'] = $this->Model_posyandu->count_data_posyandu_desa();


            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('desa/v_add_user_panitia_desa', $data);
            $this->load->view('templates/footer_copy');
            $this->load->view('templates/footer');
        } else {
            $data = [
                'username' => htmlspecialchars($this->input->post('username', true)),
                'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
                'nama' => htmlspecialchars($this->input->post('nama', true)),
                'id_desa' => htmlspecialchars($this->input->post('id_desa', true)),
                'level'  => 'panitia',
                'is_active' => 1,
                'created' => date('d-m-Y H:i:s')
            ];
            $this->Model_user->add_user($data);
            $this->session->set_flashdata('message1', '<div class="alert alert-warning" id="msg" role="alert">Sudah ditamabah !</div>');
            redirect('panitia');
        }
    }

    public function add_user_peserta_desa()
    {

        $this->form_validation->set_rules('username', 'Username', 'required|trim|is_unique[user.username]', [
            'is_unique' => 'Username sudah terdaftar !',
            'required' => 'Username tidak boleh kosong..!'
        ]);
        $this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[3]|matches[password2]', [
            'matches' => 'Password tidak sama !',
            'min_length' => 'Password terlalu pendek minimal 3 karakter !',
            'required' => 'Password tidak boleh kosong..!'
        ]);
        $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password]', [
            'required' => 'Tidak boleh kosong..!',
            'matches' => 'Password tidak sama..!'
        ]);

        $this->form_validation->set_rules('nama', 'Nama', 'required|trim', [
            'required' => 'Nama tidak boleh kosong..!'
        ]);

        $this->form_validation->set_rules('nik', 'Nik', 'required|trim|is_unique[user.nik]', [
            'is_unique' => 'NIK sudah terdaftar !',
            'required' => 'Nik tidak boleh kosong..!'
        ]);

        $this->form_validation->set_rules('t_lahir', 'T_lahir', 'required|trim', [
            'required' => 'Tempat lahir tidak boleh kosong..!'
        ]);

        $this->form_validation->set_rules('TTL', 'Ttl', 'required|trim', [
            'required' => 'TTL tidak boleh kosong..!'
        ]);

        $this->form_validation->set_rules('kelamin', 'Kelamin', 'required|trim', [
            'required' => 'Kelamin harus dipilih..!'
        ]);

        $this->form_validation->set_rules('kriteria', 'Kriteria', 'required|trim', [
            'required' => 'Kriteria harus di pilih..!'
        ]);

        $this->form_validation->set_rules('nama_ibu', 'Nama_ibu', 'required|trim', [
            'required' => 'Nama ibu tidak boleh kosong..!'
        ]);

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Tambah Peserta';
            $data['total_user_peserta_desa'] = $this->Model_user->count_user_pesrta_desa();
            $data['total_user_panitia_desa'] = $this->Model_user->count_user_panitia_desa();
            $data['user_peserta'] = $this->Model_user->get_all_user_peserta_desa();
            $data['login_session'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
            $data['desa_data_login'] = $this->Model_login->desa_session();
            $data['total_posyandu_desa'] = $this->Model_posyandu->count_data_posyandu_desa(); //balita
            $data['total_posyandu_bumil_desa'] = $this->Model_posyandu->count_data_posyandu_bumil_desa(); //bumil


            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('desa/v_add_user_peserta_desa', $data);
            $this->load->view('templates/footer_copy');
            $this->load->view('templates/footer');
        } else {
            $data = [
                'id_desa' => htmlspecialchars($this->input->post('id_desa', true)),
                'username' => htmlspecialchars($this->input->post('username', true)),
                'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
                'nama' => htmlspecialchars($this->input->post('nama', true)),
                'nik' => htmlspecialchars($this->input->post('nik', true)),
                't_lahir' => htmlspecialchars($this->input->post('t_lahir', true)),
                'TTL' => htmlspecialchars($this->input->post('TTL', true)),
                'kelamin' => htmlspecialchars($this->input->post('kelamin', true)),
                'kriteria' => htmlspecialchars($this->input->post('kriteria', true)),
                'nama_ibu' => htmlspecialchars($this->input->post('nama_ibu', true)),
                'level'  => 'peserta',
                'is_active' => 1,
                'created' => date('d-m-Y H:i:s')
            ];
            $this->Model_user->add_user($data);
            $this->session->set_flashdata('message1', '<div class="alert alert-warning" id="msg" role="alert">Sudah ditamabah !</div>');
            redirect('peserta');
        }
    }

    // methods edit data
    public function edit_user_admin($id_user)
    {
        $user_admin_username = $this->Model_user->get_user_by_id($id_user);
        $original_value = $user_admin_username->username;
        if ($this->input->post('username') != $original_value) {
            $this->form_validation->set_rules('username', 'Username', 'required|trim|is_unique[user.username]', [
                'is_unique' => 'Username sudah terdaftar !',
                'required' => 'Username tidak boleh kosong..!'
            ]);
        }
        $this->form_validation->set_rules('nama', 'Nama', 'required|trim', [
            'required' => 'Nama tidak boleh kosong..!'
        ]);

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Edit Pengguna';
            $data['total_admin'] = $this->Model_user->count_admin_user();
            $data['total_admin_desa'] = $this->Model_user->count_admin_desa();
            $data['user_admin'] = $this->Model_user->get_user_by_id($id_user);
            $data['total_user_peserta'] = $this->Model_user->count_all_user_pesrta();
            $data['total_user_panitia'] = $this->Model_user->count_all_user_panitia();
            $data['total_desa'] = $this->Model_desa->count_all_desa();
            $data['login_session'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
            $data['desa_data_login'] = $this->Model_login->desa_session();
            $data['total_posyandu'] = $this->Model_posyandu->count_all_data_posyandu(); //balita
            $data['total_posyandu_bumil'] = $this->Model_posyandu->count_all_data_bumil_posyandu(); //bumil

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('admin/v_edit_user_admin', $data);
            $this->load->view('templates/footer_copy');
            $this->load->view('templates/footer');
        } else {
            $data = [
                'username' => htmlspecialchars($this->input->post('username', true)),
                'nama' => htmlspecialchars($this->input->post('nama', true)),
                'is_active' => htmlspecialchars($this->input->post('is_active', true)),
                'modifed' => date('d-m-Y H:i:s')
            ];
            $this->Model_user->edit_user($data);
            $this->session->set_flashdata('message1', '<div class="alert alert-warning" id="msg" role="alert">Sudah diedit !</div>');
            redirect('all-admin');
        }
    }
    public function edit_user_peserta($id_user)
    {
        $user_peserta = $this->Model_user->get_user_by_id($id_user);
        $original_value = $user_peserta->username;
        if ($this->input->post('username') != $original_value) {
            $this->form_validation->set_rules('username', 'Username', 'required|trim|is_unique[user.username]', [
                'is_unique' => 'Username sudah terdaftar !',
                'required' => 'Username tidak boleh kosong..!'
            ]);
        }
        $this->form_validation->set_rules('nama', 'Nama', 'required|trim', [
            'required' => 'Nama tidak boleh kosong..!'
        ]);
        $this->form_validation->set_rules('nik', 'Nik', 'required|trim', [
            'required' => 'Nik tidak boleh kosong..!'
        ]);
        $this->form_validation->set_rules('t_lahir', 'Nama', 'required|trim', [
            'required' => 'Tempat Lahir tidak boleh kosong..!'
        ]);
        $this->form_validation->set_rules('nama_ibu', 'Nama_ibu', 'required|trim', [
            'required' => 'Nama ibu tidak boleh kosong..!'
        ]);

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Edit Pengguna';
            $data['total_admin'] = $this->Model_user->count_admin_user();
            $data['total_admin_desa'] = $this->Model_user->count_admin_desa();
            $data['user_peserta'] = $this->Model_user->get_user_by_id($id_user);
            $data['all_desa'] = $this->Model_desa->get_all_desa();
            $data['total_user_peserta'] = $this->Model_user->count_all_user_pesrta();
            $data['total_user_panitia'] = $this->Model_user->count_all_user_panitia();
            $data['total_desa'] = $this->Model_desa->count_all_desa();
            $data['login_session'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
            $data['desa_data_login'] = $this->Model_login->desa_session();
            $data['total_posyandu'] = $this->Model_posyandu->count_all_data_posyandu(); //balita
            $data['total_posyandu_bumil'] = $this->Model_posyandu->count_all_data_bumil_posyandu(); //bumil

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('admin/v_edit_user_peserta', $data);
            $this->load->view('templates/footer_copy');
            $this->load->view('templates/footer');
        } else {
            $data = [
                'username' => htmlspecialchars($this->input->post('username', true)),
                'nama' => htmlspecialchars($this->input->post('nama', true)),
                'nik' => htmlspecialchars($this->input->post('nik', true)),
                't_lahir' => htmlspecialchars($this->input->post('t_lahir', true)),
                'TTL' => htmlspecialchars($this->input->post('TTL', true)),
                'nama_ibu' =>  htmlspecialchars($this->input->post('nama_ibu', true)),
                'kriteria' => htmlspecialchars($this->input->post('kriteria', true)),
                'kelamin' => htmlspecialchars($this->input->post('kelamin', true)),
                'id_desa' => htmlspecialchars($this->input->post('id_desa', true)),
                'modifed' => date('d-m-Y H:i:s')
            ];
            $this->Model_user->edit_user($data);
            $this->session->set_flashdata('message1', '<div class="alert alert-warning" id="msg" role="alert">Sudah diedit !</div>');
            redirect('all-peserta');
        }
    }

    public function edit_user_desa($id_user)
    {
        $user_desa = $this->Model_user->get_user_by_id($id_user);
        $original_value = $user_desa->username;
        if ($this->input->post('username') != $original_value) {
            $this->form_validation->set_rules('username', 'Username', 'required|trim|is_unique[user.username]', [
                'is_unique' => 'Username sudah terdaftar !',
                'required' => 'Username tidak boleh kosong..!'
            ]);
        }

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Edit Akun Desa';
            $data['total_admin'] = $this->Model_user->count_admin_user();
            $data['total_admin_desa'] = $this->Model_user->count_admin_desa();
            $data['user_desa'] = $this->Model_user->get_user_by_id($id_user);
            $data['all_desa'] = $this->Model_desa->get_all_desa();
            $data['total_user_peserta'] = $this->Model_user->count_all_user_pesrta();
            $data['total_user_panitia'] = $this->Model_user->count_all_user_panitia();
            $data['total_desa'] = $this->Model_desa->count_all_desa();
            $data['login_session'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
            $data['desa_data_login'] = $this->Model_login->desa_session();
            $data['total_posyandu'] = $this->Model_posyandu->count_all_data_posyandu(); //balita
            $data['total_posyandu_bumil'] = $this->Model_posyandu->count_all_data_bumil_posyandu(); //bumil

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('admin/v_edit_user_desa', $data);
            $this->load->view('templates/footer_copy');
            $this->load->view('templates/footer');
        } else {
            $data = [
                'username' => htmlspecialchars($this->input->post('username', true)),
                'modifed' => date('d-m-Y H:i:s')
            ];
            $this->Model_user->edit_user($data);
            $this->session->set_flashdata('message1', '<div class="alert alert-warning" id="msg" role="alert">Sudah diedit !</div>');
            redirect('all-admin-desa');
        }
    }

    public function edit_user_panitia($id_user)
    {
        $user_panitia = $this->Model_user->get_user_by_id($id_user);
        $original_value = $user_panitia->username;
        if ($this->input->post('username') != $original_value) {
            $this->form_validation->set_rules('username', 'Username', 'required|trim|is_unique[user.username]', [
                'is_unique' => 'Username sudah terdaftar !',
                'required' => 'Username tidak boleh kosong..!'
            ]);
        }
        $this->form_validation->set_rules('nama', 'Nama', 'required|trim', [
            'required' => 'Nama tidak boleh kosong..!'
        ]);

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Edit Panitia';
            $data['total_admin'] = $this->Model_user->count_admin_user();
            $data['total_admin_desa'] = $this->Model_user->count_admin_desa();
            $data['user_panitia'] = $this->Model_user->get_user_by_id($id_user);
            $data['all_desa'] = $this->Model_desa->get_all_desa();
            $data['total_user_peserta'] = $this->Model_user->count_all_user_pesrta();
            $data['total_user_panitia'] = $this->Model_user->count_all_user_panitia();
            $data['total_desa'] = $this->Model_desa->count_all_desa();
            $data['login_session'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
            $data['desa_data_login'] = $this->Model_login->desa_session();
            $data['total_posyandu'] = $this->Model_posyandu->count_all_data_posyandu(); //balita
            $data['total_posyandu_bumil'] = $this->Model_posyandu->count_all_data_bumil_posyandu(); //bumil

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('admin/v_edit_user_panitia', $data);
            $this->load->view('templates/footer_copy');
            $this->load->view('templates/footer');
        } else {
            $data = [
                'username' => htmlspecialchars($this->input->post('username', true)),
                'nama' => htmlspecialchars($this->input->post('nama', true)),
                'id_desa' => htmlspecialchars($this->input->post('id_desa', true)),
                'modifed' => date('d-m-Y H:i:s')
            ];
            $this->Model_user->edit_user($data);
            $this->session->set_flashdata('message1', '<div class="alert alert-warning" id="msg" role="alert">Sudah diedit !</div>');
            redirect('all-panitia');
        }
    }

    public function edit_user_peserta_desa($id_user)
    {
        $user_peserta = $this->Model_user->get_user_by_id($id_user);
        $original_value = $user_peserta->username;
        if ($this->input->post('username') != $original_value) {
            $this->form_validation->set_rules('username', 'Username', 'required|trim|is_unique[user.username]', [
                'is_unique' => 'Username sudah terdaftar !',
                'required' => 'Username tidak boleh kosong..!'
            ]);
        }
        $this->form_validation->set_rules('nama', 'Nama', 'required|trim', [
            'required' => 'Nama tidak boleh kosong..!'
        ]);
        $this->form_validation->set_rules('nik', 'Nik', 'required|trim', [
            'required' => 'Nik tidak boleh kosong..!'
        ]);
        $this->form_validation->set_rules('t_lahir', 'Nama', 'required|trim', [
            'required' => 'Tempat Lahir tidak boleh kosong..!'
        ]);
        $this->form_validation->set_rules('nama_ibu', 'Nama_ibu', 'required|trim', [
            'required' => 'Nama ibu tidak boleh kosong..!'
        ]);

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Edit Peserta';
            $data['total_user_peserta_desa'] = $this->Model_user->count_user_pesrta_desa();
            $data['total_user_panitia_desa'] = $this->Model_user->count_user_panitia_desa();
            $data['user_peserta'] = $this->Model_user->get_user_by_id($id_user);
            $data['login_session'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
            $data['desa_data_login'] = $this->Model_login->desa_session();
            $data['total_posyandu_desa'] = $this->Model_posyandu->count_data_posyandu_desa(); //balita
            $data['total_posyandu_bumil_desa'] = $this->Model_posyandu->count_data_posyandu_bumil_desa(); //bumil

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('desa/v_edit_user_peserta_desa', $data);
            $this->load->view('templates/footer_copy');
            $this->load->view('templates/footer');
        } else {
            $data = [
                'username' => htmlspecialchars($this->input->post('username', true)),
                'nama' => htmlspecialchars($this->input->post('nama', true)),
                'nik' => htmlspecialchars($this->input->post('nik', true)),
                't_lahir' => htmlspecialchars($this->input->post('t_lahir', true)),
                'TTL' => htmlspecialchars($this->input->post('TTL', true)),
                'nama_ibu' =>  htmlspecialchars($this->input->post('nama_ibu', true)),
                'kriteria' => htmlspecialchars($this->input->post('kriteria', true)),
                'kelamin' => htmlspecialchars($this->input->post('kelamin', true)),
                'id_desa' => htmlspecialchars($this->input->post('id_desa', true)),
                'modifed' => date('d-m-Y H:i:s')
            ];
            $this->Model_user->edit_user($data);
            $this->session->set_flashdata('message1', '<div class="alert alert-warning" id="msg" role="alert">Sudah diedit !</div>');
            redirect('peserta');
        }
    }

    public function edit_user_panitia_desa($id_user)
    {
        $user_panitia = $this->Model_user->get_user_by_id($id_user);
        $original_value = $user_panitia->username;
        if ($this->input->post('username') != $original_value) {
            $this->form_validation->set_rules('username', 'Username', 'required|trim|is_unique[user.username]', [
                'is_unique' => 'Username sudah terdaftar !',
                'required' => 'Username tidak boleh kosong..!'
            ]);
        }
        $this->form_validation->set_rules('nama', 'Nama', 'required|trim', [
            'required' => 'Nama tidak boleh kosong..!'
        ]);

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Edit Panitia';
            $data['total_user_peserta_desa'] = $this->Model_user->count_user_pesrta_desa();
            $data['total_user_panitia_desa'] = $this->Model_user->count_user_panitia_desa();
            $data['user_panitia'] = $this->Model_user->get_user_by_id($id_user);
            $data['login_session'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
            $data['desa_data_login'] = $this->Model_login->desa_session();
            $data['total_posyandu_desa'] = $this->Model_posyandu->count_data_posyandu_desa(); //balita
            $data['total_posyandu_bumil_desa'] = $this->Model_posyandu->count_data_posyandu_bumil_desa(); //bumil

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('desa/v_edit_user_panitia_desa', $data);
            $this->load->view('templates/footer_copy');
            $this->load->view('templates/footer');
        } else {
            $data = [
                'username' => htmlspecialchars($this->input->post('username', true)),
                'nama' => htmlspecialchars($this->input->post('nama', true)),
                'id_desa' => htmlspecialchars($this->input->post('id_desa', true)),
                'modifed' => date('d-m-Y H:i:s')
            ];
            $this->Model_user->edit_user($data);
            $this->session->set_flashdata('message1', '<div class="alert alert-warning" id="msg" role="alert">Sudah diedit !</div>');
            redirect('panitia');
        }
    }

    public function edit_profile_peserta($id_user)
    {

        $this->form_validation->set_rules('nama', 'Nama', 'required|trim', [
            'required' => 'Nama tidak boleh kosong..!'
        ]);
        $this->form_validation->set_rules('nik', 'Nik', 'required|trim', [
            'required' => 'Nik tidak boleh kosong..!'
        ]);
        $this->form_validation->set_rules('t_lahir', 'Nama', 'required|trim', [
            'required' => 'Tempat Lahir tidak boleh kosong..!'
        ]);
        $this->form_validation->set_rules('nama_ibu', 'Nama_ibu', 'required|trim', [
            'required' => 'Nama ibu tidak boleh kosong..!'
        ]);

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Edit Profil';
            $data['total_admin'] = $this->Model_user->count_admin_user();
            $data['total_admin_desa'] = $this->Model_user->count_admin_desa();
            $data['user_peserta'] = $this->Model_user->get_user_by_id($id_user);
            $data['all_desa'] = $this->Model_desa->get_all_desa();
            $data['total_user_peserta'] = $this->Model_user->count_all_user_pesrta();
            $data['total_user_panitia'] = $this->Model_user->count_all_user_panitia();
            $data['total_desa'] = $this->Model_desa->count_all_desa();
            $data['login_session'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
            $data['desa_data_login'] = $this->Model_login->desa_session();

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('v_edit_profil_peserta', $data);
            $this->load->view('templates/footer_copy');
            $this->load->view('templates/footer');
        } else {
            $data = [
                'nama' => htmlspecialchars($this->input->post('nama', true)),
                'nik' => htmlspecialchars($this->input->post('nik', true)),
                't_lahir' => htmlspecialchars($this->input->post('t_lahir', true)),
                'TTL' => htmlspecialchars($this->input->post('TTL', true)),
                'nama_ibu' =>  htmlspecialchars($this->input->post('nama_ibu', true)),
                'kriteria' => htmlspecialchars($this->input->post('kriteria', true)),
                'kelamin' => htmlspecialchars($this->input->post('kelamin', true)),
                'modifed' => date('d-m-Y H:i:s')
            ];
            $this->Model_user->edit_user($data);
            $this->session->set_flashdata('message1', '<div class="alert alert-warning" id="msg" role="alert">Sudah diedit !</div>');
            redirect('profil');
        }
    }

    public function edit_profile_adm_pntia($id_user)
    {

        $this->form_validation->set_rules('nama', 'Nama', 'required|trim', [
            'required' => 'Nama tidak boleh kosong..!'
        ]);

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Edit Pengguna';
            $data['total_admin'] = $this->Model_user->count_admin_user();
            $data['total_admin_desa'] = $this->Model_user->count_admin_desa();
            $data['user_adm_pnita'] = $this->Model_user->get_user_by_id($id_user);
            $data['all_desa'] = $this->Model_desa->get_all_desa();
            $data['total_user_peserta'] = $this->Model_user->count_all_user_pesrta();
            $data['total_user_panitia'] = $this->Model_user->count_all_user_panitia();
            $data['total_desa'] = $this->Model_desa->count_all_desa();
            $data['login_session'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
            $data['desa_data_login'] = $this->Model_login->desa_session();
            $data['total_posyandu'] = $this->Model_posyandu->count_all_data_posyandu(); //balita
            $data['total_posyandu_desa'] = $this->Model_posyandu->count_data_posyandu_desa(); //balita
            $data['total_posyandu_bumil'] = $this->Model_posyandu->count_all_data_bumil_posyandu(); //bumil
            $data['total_posyandu_bumil_desa'] = $this->Model_posyandu->count_data_posyandu_bumil_desa(); //bumil
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('v_edit_profil', $data);
            $this->load->view('templates/footer_copy');
            $this->load->view('templates/footer');
        } else {
            $data = [
                'nama' => htmlspecialchars($this->input->post('nama', true)),
                'modifed' => date('d-m-Y H:i:s')
            ];
            $this->Model_user->edit_user($data);
            $this->session->set_flashdata('message1', '<div class="alert alert-warning" id="msg" role="alert">Sudah diedit !</div>');
            redirect('profil');
        }
    }

    public function edit_profile_desa($id_desa)
    {
        $this->form_validation->set_rules('nama_desa', 'Nama_desa', 'required|trim', [
            'required' => 'Nama Desa tidak boleh kosong..!'
        ]);

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Edit Pengguna';
            $data['total_admin'] = $this->Model_user->count_admin_user();
            $data['total_admin_desa'] = $this->Model_user->count_admin_desa();
            $data['desa_by_id'] = $this->Model_desa->get_desa_by_id($id_desa);
            $data['all_desa'] = $this->Model_desa->get_all_desa();
            $data['total_user_peserta'] = $this->Model_user->count_all_user_pesrta();
            $data['total_user_panitia'] = $this->Model_user->count_all_user_panitia();
            $data['total_user_panitia_desa'] = $this->Model_user->count_user_panitia_desa();
            $data['total_user_peserta_desa'] = $this->Model_user->count_user_pesrta_desa();
            $data['total_desa'] = $this->Model_desa->count_all_desa();
            $data['login_session'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
            $data['desa_data_login'] = $this->Model_login->desa_session();
            $data['total_posyandu_desa'] = $this->Model_posyandu->count_data_posyandu_desa(); //balita
            $data['total_posyandu_bumil_desa'] = $this->Model_posyandu->count_data_posyandu_bumil_desa(); //bumil

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('v_edit_profil_desa', $data);
            $this->load->view('templates/footer_copy');
            $this->load->view('templates/footer');
        } else {
            $data = [
                'nama_desa' => htmlspecialchars($this->input->post('nama_desa', true)),
            ];
            $this->Model_desa->edit_desa($data);
            $this->session->set_flashdata('message1', '<div class="alert alert-warning" id="msg" role="alert">Sudah diedit !</div>');
            redirect('profil');
        }
    }

    public function change_password($id_user)
    {

        $this->form_validation->set_rules('nama', 'Nama', 'required|trim', [
            'required' => 'Nama tidak boleh kosong..!'
        ]);

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Edit Pengguna';
            $data['total_admin'] = $this->Model_user->count_admin_user();
            $data['total_admin_desa'] = $this->Model_user->count_admin_desa();
            $data['user'] = $this->Model_user->get_user_by_id($id_user);
            $data['all_desa'] = $this->Model_desa->get_all_desa();
            $data['total_user_peserta'] = $this->Model_user->count_all_user_pesrta();
            $data['total_user_panitia'] = $this->Model_user->count_all_user_panitia();
            $data['total_desa'] = $this->Model_desa->count_all_desa();
            $data['login_session'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
            $data['desa_data_login'] = $this->Model_login->desa_session();
            $data['total_posyandu'] = $this->Model_posyandu->count_all_data_posyandu(); //balita
            $data['total_posyandu_desa'] = $this->Model_posyandu->count_data_posyandu_desa(); //balita
            $data['total_posyandu_bumil'] = $this->Model_posyandu->count_all_data_bumil_posyandu(); //bumil
            $data['total_posyandu_bumil_desa'] = $this->Model_posyandu->count_data_posyandu_bumil_desa(); //bumil

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('v_change_password', $data);
            $this->load->view('templates/footer_copy');
            $this->load->view('templates/footer');
        } else {
            $data = [
                'nama' => htmlspecialchars($this->input->post('nama', true)),
                'modifed' => date('d-m-Y H:i:s')
            ];
            $this->Model_user->edit_user($data);
            $this->session->set_flashdata('message1', '<div class="alert alert-warning" id="msg" role="alert">Sudah diedit !</div>');
            redirect('profil');
        }
    }

    //method delete data
    public function delete_admin($id_user)
    {
        $this->Model_user->delete_user($id_user);
        $this->session->set_flashdata('message1', '<div class="alert alert-success" role="alert" id="msg">Berhasil di Hapus</div>');
        redirect('all-admin');
    }
    public function delete_admin_desa($id_user)
    {
        $this->Model_user->delete_user($id_user);
        $this->session->set_flashdata('message1', '<div class="alert alert-success" role="alert" id="msg">Berhasil di Hapus</div>');
        redirect('all-admin-desa');
    }
    public function delete_panitia($id_user)
    {
        $this->Model_user->delete_user($id_user);
        $this->session->set_flashdata('message1', '<div class="alert alert-success" role="alert" id="msg">Berhasil di Hapus</div>');
        redirect('all-panitia');
    }

    public function delete_panitia_desa($id_user)
    {
        $this->Model_user->delete_user($id_user);
        $this->session->set_flashdata('message1', '<div class="alert alert-success" role="alert" id="msg">Berhasil di Hapus</div>');
        redirect('panitia');
    }

    public function delete_peserta_desa($id_user)
    {
        $this->Model_user->delete_user($id_user);
        $this->session->set_flashdata('message1', '<div class="alert alert-success" role="alert" id="msg">Berhasil di Hapus</div>');
        redirect('peserta');
    }

    public function delete_peserta($id_user)
    {
        $this->Model_user->delete_user($id_user);
        $this->session->set_flashdata('message1', '<div class="alert alert-success" role="alert" id="msg">Berhasil di Hapus</div>');
        redirect('all-peserta');
    }
    //end for managing the user table

}

/* End of file Dashboard.php */