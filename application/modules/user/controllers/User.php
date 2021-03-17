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
        $data['total_user'] = $this->Model_user->count_all_user();
        $data['total_desa'] = $this->Model_desa->count_all_desa();
        $data['login_session'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['desa_data_login'] = $this->Model_login->desa_session();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('v_dashboard', $data);
        $this->load->view('templates/footer_copy');
        $this->load->view('templates/footer');
    }

    //below the methods for managing the user table
    public function all_user() //methode get all user
    {
        $data['title'] = 'Semua Pengguna';
        $data['total_user'] = $this->Model_user->count_all_user();
        $data['total_desa'] = $this->Model_desa->count_all_desa();
        $data['all_user'] = $this->Model_user->get_all_user();
        $data['login_session'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['desa_data_login'] = $this->Model_login->desa_session();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('v_all_users', $data);
        $this->load->view('templates/footer_copy');
        $this->load->view('templates/footer');
    }

    public function add_user()
    {
        $this->form_validation->set_rules('username', 'Username', 'required|trim|is_unique[user.username]', [
            'is_unique' => 'Username sudah terdaftar..!',
            'required' => 'Username tidak boleh kosong..!',
        ]);
        $this->form_validation->set_rules('selectLevel', 'Level', 'required|trim', [
            'required' => 'Level Harus Dipilih'
        ]);

        $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[3]|max_length[10]|matches[password2]', [
            'matches' => 'Password tidak sama..!',
            'min_length' => 'Password terlalu pendek minimal 3 karakter',
            'max_length' => 'Password terlalu panjang maksimal 10 karakter',
            'required' => 'Password tidak boleh kosong..!'
        ]);
        $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');

        if ($this->form_validation->run() == false) {
            $errors = array(
                'u_error' => form_error('username'),
                'p_error' => form_error('password1'),
                'level_error' => form_error('selectLevel'),
            );
            echo json_encode(['error' => $errors]);
        } else {
            echo json_encode(['success' => 'Record added successfully.']);
            $data = [
                'username' => htmlspecialchars($this->input->post('username', true)),
                'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
                'level' => $this->input->post('selectLevel', true),
                'kd_prodi' => $this->input->post('selectProdi', true),
            ];
            $this->Model_user->add_user($data, 'user');
            $this->session->set_flashdata('message1', '<div class="alert alert-success" role="alert" id="msg">Berhasil di Tambah</div>');
        }
    }

    public function edit_user()
    {
        $data = [
            'id_user' => $this->input->post('id_user', true),
            'level' => $this->input->post('level_U', true),
            'kd_prodi' => $this->input->post('s_e_prodi', true),
            'modifed' => date('d-m-Y H:i:s')
        ];
        $this->Model_user->edit_user($data);
        $this->session->set_flashdata('message1', '<div class="alert alert-success" role="alert" id="msg">Berhasil di Edit</div>');
        redirect('user/User/all_user');
    }

    public function delete_user($id)
    {
        $this->Model_user->delete_user($id);
        $this->session->set_flashdata('message1', '<div class="alert alert-success" role="alert" id="msg">Berhasil di Hapus</div>');
        redirect('user/User/all_user');
    }
    //end for managing the user table

}

/* End of file Dashboard.php */