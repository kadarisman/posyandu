 <?php

    defined('BASEPATH') or exit('No direct script access allowed');

    class Desa extends CI_Controller
    {

        public function __construct()
        {
            parent::__construct();
            check_login(); // this is a function in login_helper
        }
        //below the methods for managing the dosen table
        public function index()
        {
            $data['title'] = 'Semua Desa';
            $data['total_desa'] = $this->Model_desa->count_all_desa();
            $data['total_user_peserta'] = $this->Model_user->count_all_user_pesrta();
            //$data['total_user'] = $this->Model_user->count_all_user();
            $data['total_admin'] = $this->Model_user->count_admin_user();
            $data['total_admin_desa'] = $this->Model_user->count_admin_desa();
            $data['total_user_panitia'] = $this->Model_user->count_all_user_panitia();
            $data['all_desa'] = $this->Model_desa->get_all_desa();
            $data['login_session'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
            $data['desa_data_login'] = $this->Model_login->desa_session();
            $data['total_posyandu'] = $this->Model_posyandu->count_all_data_posyandu();

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('v_all_desa', $data);
            $this->load->view('templates/footer_copy');
            $this->load->view('templates/footer');
        }

        //methods add data
        public function add_desa()
        {

            $this->form_validation->set_rules('id_desa', 'Id_desa', 'required|trim|is_unique[desa.id_desa]', [
                'is_unique' => 'Id Desa sudah ada buat lain !',
                'required' => 'Id Desa tidak boleh kosong..!'
            ]);

            $this->form_validation->set_rules('nama_desa', 'Nama_desa', 'required|trim', [
                'required' => 'Nama Desa tidak boleh kosong..!'
            ]);

            if ($this->form_validation->run() == false) {
                $data['title'] = 'Tambah Desa';
                $data['total_admin'] = $this->Model_user->count_admin_user();
                $data['total_admin_desa'] = $this->Model_user->count_admin_desa();
                $data['all_desa'] = $this->Model_desa->get_all_desa();
                $data['total_user_peserta'] = $this->Model_user->count_all_user_pesrta();
                $data['total_user_panitia'] = $this->Model_user->count_all_user_panitia();
                $data['total_desa'] = $this->Model_desa->count_all_desa();
                $data['user_peserta'] = $this->Model_user->get_all_user_peserta();
                $data['login_session'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
                $data['desa_data_login'] = $this->Model_login->desa_session();
                $data['total_posyandu_desa'] = $this->Model_posyandu->count_data_posyandu_desa();
                $data['total_posyandu'] = $this->Model_posyandu->count_all_data_posyandu();

                $this->load->view('templates/header', $data);
                $this->load->view('templates/sidebar', $data);
                $this->load->view('templates/topbar', $data);
                $this->load->view('v_add_desa', $data);
                $this->load->view('templates/footer_copy');
                $this->load->view('templates/footer');
            } else {
                $data = [
                    'id_desa' => htmlspecialchars($this->input->post('id_desa', true)),
                    'nama_desa' => htmlspecialchars($this->input->post('nama_desa', true)),
                    'created' => date('d-m-Y H:i:s')
                ];
                $this->Model_desa->add_desa($data);
                $this->session->set_flashdata('message1', '<div class="alert alert-warning" id="msg" role="alert">Sudah ditamabah !</div>');
                redirect('desa');
            }
        }

        public function create_DB()
        {
            $this->form_validation->set_rules('nama_desa', 'Nama_desa', 'required|trim', [
                'required' => 'Nama Desa tidak boleh kosong..!'
            ]);

            if ($this->form_validation->run() == false) {
                $data['title'] = 'Dashboard';
                $data['login_session'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
                $data['desa_data_login'] = $this->Model_login->desa_session();
                $this->load->view('templates/header', $data);
                $this->load->view('templates/topbar', $data);
                $this->load->view('templates/sidebar', $data);
                $this->load->view('v_create_DB', $data);
                $this->load->view('templates/footer');
            } else {
                $data = [
                    'id_desa' => htmlspecialchars($this->input->post('id_desa', true)),
                    'nama_desa' => htmlspecialchars($this->input->post('nama_desa', true)),
                ];
                $this->Model_desa->create_DB($data);
                $this->session->set_flashdata('message1', '<div class="alert alert-success" role="alert">Selamat! Database selesai. desa sduah siap !</div>');
                redirect('dashboard');
            }
        }

        //method edit data
        public function edit_desa($id_desa)
        {
            $this->form_validation->set_rules('nama_desa', 'Nama_desa', 'required|trim', [
                'required' => 'Nama Desa tidak boleh kosong..!'
            ]);

            if ($this->form_validation->run() == false) {
                $data['title'] = 'Edit Desa';
                $data['total_admin'] = $this->Model_user->count_admin_user();
                $data['total_admin_desa'] = $this->Model_user->count_admin_desa();
                $data['desa'] = $this->Model_desa->get_desa_name($id_desa);
                $data['total_user_peserta'] = $this->Model_user->count_all_user_pesrta();
                $data['total_user_panitia'] = $this->Model_user->count_all_user_panitia();
                $data['total_desa'] = $this->Model_desa->count_all_desa();
                $data['login_session'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
                $data['desa_data_login'] = $this->Model_login->desa_session();
                $data['total_posyandu_desa'] = $this->Model_posyandu->count_data_posyandu_desa();
                $data['total_posyandu'] = $this->Model_posyandu->count_all_data_posyandu();

                $this->load->view('templates/header', $data);
                $this->load->view('templates/sidebar', $data);
                $this->load->view('templates/topbar', $data);
                $this->load->view('v_edit_desa', $data);
                $this->load->view('templates/footer_copy');
                $this->load->view('templates/footer');
            } else {
                $data = [
                    'nama_desa' => htmlspecialchars($this->input->post('nama_desa', true)),
                ];
                $this->Model_desa->edit_desa($data);
                $this->session->set_flashdata('message1', '<div class="alert alert-warning" id="msg" role="alert">Sudah diedit !</div>');
                redirect('desa');
            }
        }

        public function delete_desa($id_desa)
        {
            $this->Model_desa->delete_desa($id_desa);
            $this->session->set_flashdata('message1', '<div class="alert alert-success" role="alert" id="msg">Berhasil di Hapus</div>');
            redirect('desa');
        }
        //end for managing the prodi table
    }