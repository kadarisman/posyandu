<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        if ($this->session->userdata('username')) { //status user check, has been login or not
            redirect('user/Dashboard');
        }
        $this->form_validation->set_rules('username', 'Username', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Login';
            $this->load->view('v_login', $data);
        } else {
            // validation success
            $this->_doLogin();
        }
    }

    private function _doLogin()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        $user = $this->db->get_where('user', ['username' => $username])->row_array();

        // if user available
        if ($user) {
            // check password
            if (password_verify($password, $user['password'])) {
                $data = [
                    'username' => $user['username'],
                    'level' => $user['level']
                ];
                $this->session->set_userdata($data);
                if ($user['level'] == 'admin' || $user['level'] == 'desa' || $user['level'] == 'panitia' || $user['level'] == 'peserta') {
                    redirect('dashboard');
                } else {
                    redirect('dashboard');
                }
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h4><i class="icon fa fa-ban"></i> Alert!</h4>
                Password Salah !</div>');
                redirect('auth/Login');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-info alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h4><i class="icon fa fa-info"></i> Alert!</h4>Belum Terdaftar, hubungi Admin BPM <a href="https://forms.gle/HsWFiMyKfsvASuYk9" target="_blank"><strong>klik disini</strong></a> </div>');
            redirect('auth/Login');
        }
    }

    public function logout()
    {
        $this->session->unset_userdata('username');
        $this->session->unset_userdata('level');

        $this->session->set_flashdata('message1', '<div class="alert alert-danger" role="alert" id="msg">Anda sudah log out</div>');
        redirect('/');
    }

    public function registration()
    {
        if ($this->session->userdata('username')) {
            redirect('login');
        }

        $this->form_validation->set_rules('id_desa', 'Id_desa', 'required|trim|is_unique[user.username]', [
            'is_unique' => 'Id Desa sudah terdaftar, buat lain !',
            'required' => 'Id Desa tidak boleh kosong..!'
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
            $data['title'] = 'Pendaftaran Desa';
            $this->load->view('v_pendaftaran_desa', $data);
        } else {
            $data = [
                'id_desa' => htmlspecialchars($this->input->post('id_desa', true)),
                'username' => htmlspecialchars($this->input->post('username', true)),
                'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
                'level' => 'desa',
                'is_active' => 1,
                'created' => time()
            ];
            $this->Model_user->add_user($data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Selamat! Akun telah dibuat. Silakan login dan buat database !</div>');
            redirect('login');
        }
    }
}

/* End of file Login.php */